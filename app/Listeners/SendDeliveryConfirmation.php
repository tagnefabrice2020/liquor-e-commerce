<?php

namespace App\Listeners;

use Session;
use App\Events\DeliveryConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ConfirmDelivery;

class SendDeliveryConfirmation implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public $email = 'tnf00237@gmail.com';

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeliveryConfirmation  $event
     * @return void
     */
    public function handle(DeliveryConfirmation $event)
    {
        // try {
            Mail::to($this->email)->send(new ConfirmDelivery($event->order));
        // } catch(\Exception $e) {
            // Session::flash('error', 'Please check your internet connection');
            // return redirect()->back();
        // }
    }
}
