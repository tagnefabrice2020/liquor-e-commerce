<?php

namespace App\Listeners;

use App\Events\NewUser;
use App\Mail\MailNewUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNewUser implements ShouldQueue
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {      
        try {
            Mail::to($event->user->email)->send(new MailNewUser($event->user));
        } catch(\Exception $e) {
            Session::flash('error', 'Please check your internet connection');
            return redirect()->back();
        }
        
    }
}
