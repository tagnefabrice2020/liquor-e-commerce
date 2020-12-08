<?php

namespace App\Listeners;

use App\Events\Invoice;
use App\Mail\MailInvoice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceListener implements ShouldQueue
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
     * @param  Invoice  $event
     * @return void
     */
    public function handle(Invoice $event)
    {
        try {
            Mail::to($event->order->email)->send(new MailInvoice($event->order));
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
}
