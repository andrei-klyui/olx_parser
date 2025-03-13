<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscription;
use App\Services\PriceCheckService;
use App\Http\Requests\SubscribeRequest;

/**
 * Class SubscriptionController
 *
 * @package App\Http\Controllers\Api
 */
class SubscriptionController extends Controller
{
    /**
     * @param SubscribeRequest $request
     * @return mixed
     */
    public function subscribe(SubscribeRequest $request)
    {
        $data = $request->validated();
        $price = PriceCheckService::getPrice($data['url']);

        Subscription::updateOrCreate(
            ['url' => $data['url'], 'email' => $data['email']],
            ['price' => $price]
        );

        return response()->json(['message' => 'Subscription completed']);
    }
}
