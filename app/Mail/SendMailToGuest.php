<?php

namespace App\Mail;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToGuest extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $reducedCart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order, $_reducedCart)
    {
        $this->order = $_order;
        $this->reducedCart = $_reducedCart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $new_order = $this->order;
        $reducedCart = $this->reducedCart;
        $products = [];
        foreach($reducedCart as $key => $quantity) {
            $currentProduct = Product::findOrFail($key);
            $currentProduct->quantity = $quantity['product_quantity'];
            $products[] = $currentProduct;
        }
        return $this->view('mails.send_mail_to_guest', compact('new_order', 'products'));
    }
}
