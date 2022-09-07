<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $order_content)
    {
        $this->order = $order;
        $this->order_content = $order_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Il tuo ordine #{$this->order->id} è confermato")
                    ->markdown('emails.order-placed')
                    ->with('order',$this->order)
                    ->with('order_content', $this->order_content);
    }
}
