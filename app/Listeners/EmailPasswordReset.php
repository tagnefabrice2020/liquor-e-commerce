<?php

namespace App\Listeners;

use Session;
use App\Events\SendEmailReset;
use App\Mail\SendPasswordResetEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailPasswordReset implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendEmailReset  $event
     * @return void
     */
    public function handle(SendEmailReset $event)
    {
        try {
            Mail::to($event->user->email)->send(new SendPasswordResetEmail($event->user));
        } catch(\Exception $e) {
            Session::flash('error', 'Please check your internet connection');
            return redirect()->back();
        }
    }
}
