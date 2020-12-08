<?php

namespace App\Mail;

use App\User;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $address;
    public $id;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->order->user_id == null) {
            $first_name = $this->order->first_name;
            $last_name = $this->order->last_name;
            $email = $this->order->email;
            $invoiceNum = $this->order->id;
        } else {
            $user = User::findOrFail($this->order->user_id);
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $email = $user->email;
            $invoiceNum = $this->order->id;
        }
        $this->address ?? $this->order->address;
        $this->id = $this->order->id;
        return $this->view('pages.invoice')->with([
            'cart' => unserialize($this->order->cart), 
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'address' => $this->address,
            'total' => $this->order->total,
            'invoiceNum' => $invoiceNum,
        ]);
    }
}
