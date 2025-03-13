<?php

namespace App\Jobs;

use App\Models\Subscription;
use App\Services\PriceCheckService;
use App\Services\NotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckPriceJob implements ShouldQueue
{
    /**
     * @return void
     */
    public function handle()
    {
        $subscriptions = Subscription::all();

        foreach ($subscriptions as $subscription) {
            $newPrice = PriceCheckService::getPrice($subscription->url);

            if ($subscription->price != $newPrice) {
                NotificationService::sendPriceChange($subscription->email, $newPrice);
                $subscription->update(['price' => $newPrice]);
            }
        }
    }
}
