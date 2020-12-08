<?php

namespace App\Listeners;

use Auth;
use Session;
use App\Events\NewOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\EmailDelivery;

class EmailOrder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public $email;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewOrder  $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        // dd($event);
        if (Auth::check()) { 
            $this->email = Auth::user()->email;
        } else { 
            $this->email = $event->order->email; 
        }
        try {
            Mail::to($this->email)->send(new EmailDelivery($event->order));
        } catch(\Exception $e) {
            Session::flash('error', 'Please check your internet connection');
            return redirect()->back();
        }
    }
}
