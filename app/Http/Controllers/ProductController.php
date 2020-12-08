<?php

namespace App\Http\Controllers;

use Cart;
use App\Volume;
// use App\Session;
use App\Product;
use App\Category;
use App\Sh_location;
use App\Productvolume;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('manage.products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', '1')->get();
        $volumes = Volume::where('status', '1')->get();
        $locations = Sh_location::all();
        return view('manage.products.create')
            ->withCategories($categories)
            ->withVolumes($volumes)
            ->withLocations($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            // 'brand_id' => 'required',
            // 'slug' => 'required|unique:products',
            'volume_id' => 'required',
            'brand_id' => 'required'
        ],[
            'brand_id.required' => 'The brand field is required.',
            'category_id.required' => 'The category field is required.',
            'volume_id.required' => 'The volume field is required.',
            'stock_status.required' => 'The stock status field is required.',
            'sh_location_id.required' => 'The location field is required.'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->slug = str_replace(' ', '-', $request->name).'-'.time();
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->volume_id = $request->volume_id;      
        $product->description = $request->description;
        $product->status = $request->status;

        // if($request->hasFile('image_url')) {
        $liquor_directory = Category::select('name')->where('id', $request->category_id)->first();
            $image = $request->file('image_url');
            $filename = time().'.'.$image->getClientOriginalExtension();
            if (!file_exists(public_path('images/products/'.$liquor_directory->name))) {
                mkdir('images/products/'.$liquor_directory->name, 666, true);
            }
            $location = 'images/products/'.$liquor_directory->name.'/'.$filename;
            Image::make($image)->resize('320', '480')->save($location);
            $product->image_url = $location;
        // }
        $save = $product->save();
        if ($save) {
            $pv = new Productvolume;
            $pv->product_id = $product->id;
            $pv->volume_id = $request->volume_id;
            $pv->sh_location_id = $request->sh_location_id;
            // $pv->units = $request->units;
            $pv->price = $request->price;
            // $pv->quantity = $request->quantity;
            // $pv->stock_status = $request->stock_status;
            $pv->save();
            Session::flash('success', 'product added');
            return redirect()->route('products.index');
        }   
    }

    public function add_product_volumes (Request $request) {
        // $product = Product::findOrFail($id);
        $this->validate($request, [
            'product_id' => 'required',
            'volume_id' => 'required',
            'sh_location_id' => 'required',
            'units' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'stock_status' => 'required',
            // 'status' => 'required'
        ]);

        $pv = new Productvolume;
        $pv->product_id = $request->product_id;
        $pv->volume_id = $request->volume_id;
        $pv->sh_location_id = $request->sh_location_id;
        $pv->units = $request->units;
        $pv->price = $request->price;
        $pv->quantity = $request->quantity;
        if($pv->quantity > 0) {
            $pv->stock_status = 'in stock';
        } else {
            $pv->stock_status = 'out of stock';
        }
       
        // $pv->status = $request->status;
        $pv->save();
        Session::flash('success', 'Product volume added');
        return redirect()->back();
    }

    public function update_product_volume (Request $request, $id) {
        $pv = Productvolume::findOrFail($id); 
        $this->validate($request, [
            'product_id' => 'required',
            'volume_id' => 'required',
            'sh_location_id' => 'required',
            'units' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'stock_status' => 'required',
            // 'status' => 'required'
        ]);
        $pv->product_id = $request->product_id;
        $pv->volume_id = $request->volume_id;
        $pv->sh_location_id = $request->sh_location_id;
        $pv->units = $request->units;
        $pv->price = $request->price;
        $pv->quantity = $request->quantity;
        if($pv->quantity > 0) {
            $pv->stock_status = 'in stock';
        } else {
            $pv->stock_status = 'out of stock';
        }

        // $pv->status = $request->status;
        $pv->save();
        Session::flash('success', 'Product volume updated');
        return redirect()->back();
    }

    public function product_volume_index ($id) {

        $product = Product::findOrFail($id);
        $product_volumes = $product->productVolumes;
        return view('manage.product_volumes.index')->with(['product_volumes' => $product_volumes, 'product'=>$product]); 
    }

    public function product_volume_edit ($id) {
        $product_volume = Productvolume::findOrFail($id);
        $volumes =  $volumes = Volume::all();
        $locations = Sh_location::all();
        return view('manage.product_volumes.edit')->with(['volumes' => $volumes, 'locations' => $locations, 'product_volume' => $product_volume]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $volumes = Volume::all();
        $locations = Sh_location::all();
        return view('manage.products.edit')
            ->withProduct($product)
            ->withLocations($locations)
            ->withVolumes($volumes)
            ->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            // 'brand_id' => 'required',
            // 'slug' => 'required',
            'volume_id' => 'required',
            'brand_id' => 'required'
        ],[
            'brand_id.required' => 'The brand field is required.',
            'category_id.required' => 'The category field is required.',
            'volume_id.required' => 'The volume field is required',
            'stock_status.required' => 'The stock status field is required',
            'sh_location_id.required' => 'The location field is required'
        ]);
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->slug = $product->slug = str_replace(' ', '-', $request->name).'-'.time();
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->volume_id = $request->volume_id;      
        $product->description = $request->description;
        $product->status = $request->status;

        $liquor_directory = Category::select('name')->where('id', $request->category_id)->first();
        $image = $request->file('image_url');
        $filename = time().'.'.$image->getClientOriginalExtension();
        if (!file_exists(public_path('images/products/'.$liquor_directory->name))) {
            mkdir('images/products/'.$liquor_directory->name, 666, true);
        }
        if(file_exists($product->image_url)) {
            unlink($product->image_url);
        }
        $location = 'images/products/'.$liquor_directory->name.'/'.$filename;
        Image::make($image)->resize('320', '480')->save($location);
        $product->image_url = $location;
        $product->save();
        Session::flash('success', 'product updated');
        return redirect()->back();

    }

    public function add_products_volume ($id) {
        $product = Product::select('id', 'name')->where('id', $id)->first();
        $volumes =  $volumes = Volume::all();
        $locations = Sh_location::all();
        return view('manage.product_volumes.create')->with(['product'=>$product, 'volumes' => $volumes, 'locations' => $locations]);
    }

    public function add_to_cart (Request $request) {
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
        return redirect()->back();
    }

    public function updateCart (Request $request, $key) {
        $rowID = $key;
        foreach (Cart::content() as $key => $value) {
            if ($rowID == $key) {
                Cart::update($rowId, $request->qty); 
            }
        }
    }

    public function removeItemFromCart ($id) {
         $rowId = $id;
        foreach (Cart::content() as $key => $value) {
            if ($rowId == $key) {
                Cart::remove($rowId); 
                return redirect()->route('cartPage', app()->getLocale());
            }
        }
    }

    public function cartPage () {
        // dd(Cart::content());
        return view('pages.cart')->with(['cart'=>Cart::content()]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
