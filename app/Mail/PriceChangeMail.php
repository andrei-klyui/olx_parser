<?php

use Illuminate\Mail\Mailable;

class PriceChangeMail extends Mailable
{
    /**
     * @var
     */
    public $price;

    /**
     * @param $price
     */
    public function __construct($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function build()
    {
        return $this->subject('The price has changed!')
            ->view('emails.price_change')
            ->with(['price' => $this->price]);
    }
}
