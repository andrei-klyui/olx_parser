<?php

namespace App\Services;

use App\Mail\PriceChangeMail;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    /**
     * @param $email
     * @param $newPrice
     * @return void
     */
    public static function sendPriceChange($email, $newPrice)
    {
        Mail::to($email)->send(new PriceChangeMail($newPrice));
    }
}
