<?php

namespace App\Http\Controllers;

use Cart;
use Carbon;
use Session;
use App\User;
use App\Order;
use App\Productvolume;
use App\Events\Invoice;
use App\Events\NewOrder;
use Illuminate\Http\Request;
use App\Events\DeliveryConfirmed;
use App\Events\DeliveryConfirmation;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index () {
        return view('manage.orders.index')->with(['orders'=>Order::orderBy('created_at', 'desc')->paginate(20)]);
    }
    
    public function getOrders () {
        return Order::where('seen_at', null)->limit(10)->latest()->get()->toJson();
    }

    public function viewOrder ($id, $notification_id=null) {
        if($notification_id!=null) {
            $notification = DB::table('notifications')->where('id', $notification_id)->first();
            $notification->seen_at = Carbon::now();
            $notification->update();
        }
        $order = Order::findOrFail($id);
        // dd(unserialize($order->cart));
        $cart = unserialize($order->cart);
        
        return view('manage.orders.view')->withOrder($order)->withCart($cart);
    }

    public function checkOut () {
    	return view('pages.checkOut');
    }

    public function buyDirectly (Request $request) {
       
    	$product = Productvolume::findOrFail($request->pv_id);
        foreach (Cart::content() as $key => $content) {
            if ($content->id == $request->pv_id) {
                unset(Cart::content()[$key]);
            }
        }

        Cart::add([
            'id'=>$product->id,
            'name' => $product->product,
            'options'=>['image_url'=>$product->product->image_url],
            'qty' => $request->qty,
            'price' => $product->price,
        ]);
        return redirect()->route('checkOut', app()->getLocale());
    }

    public function orderProduct (Request $request) {
        // dd($request);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'address' => 'required',
        ]);
        
        $order = new Order; 
        
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phonenumber = $request->phonenumber;
        $order->address = $request->address;
        $order->delivery_code = time().''.substr($request->phonenumber, 3, 6); //this attribute is nullable
        $order->total = $request->total;
        $order->cart = serialize(Cart::content());
        $order->amount = Cart::subtotal();
        $order->seen_at = null;
   
        $save = $order->save();
        Cart::destroy();
        $event = event(new NewOrder($order));
        $users = User::whereRoleIs('superadministrator')->get();
        foreach ($users as $key => $user) {
            $user->notify(new UserNotification($order));
        }
       
        // return $order->toJson();
        Session::flash('success', 'Success! Visitez votre e-mail');
        return redirect()->back();
    }

    public function confirmDeliveryCode ($deliveryCode) {
        $order = Order::where('delivery_code', $deliveryCode)->first();
        if(!empty($order)) {
            $event = event(new DeliveryConfirmation($order));
            if ($event) {
                // dd($order);
                $order->delivery_code = null;
                $order->delivered = true;
                $order->update(); 
                event(new DeliveryConfirmed($order));
                Cart::destroy();
                // Session::flash('success', 'Order placed sucessfully!');
                return 'I have recieved my product(s)';
            }
            return 'Something went wrong';
        }
        
    }

    public function confirmPayment ($id) {
        $order = Order::where('id',$id)->first();
        $order->status = true;
        $cartItems = unserialize($order->cart);
        //invoice mail
        event(new Invoice($order));
        foreach ($cartItems as $key => $product) {
            $item = Productvolume::findOrFail($product->id);
            $item->quantity = $item->quantity - $product->qty;
            if($item->quantity == 0) {
                $item->stock_status = 'out of stock';
            } else {
                $item->stock_status = 'in stock';
            }
            $item->save();
        }        
        $order->save();
        Session::flash('success', 'paiement reussir');
        return redirect()->back();
        // return "payment successfully comfirmed!";
    }
}
