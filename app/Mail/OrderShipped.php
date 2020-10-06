<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    protected $order;
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order->get($order->id);
        $this->title = $order->title_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('desafio@multiplier.com.br')->subject($this->title)
            ->markdown('emails.orders.shipped')
            ->with([
                'order' => $this->order,
            ]);
    }
}
