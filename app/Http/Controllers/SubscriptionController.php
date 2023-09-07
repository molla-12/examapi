<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(StoreSubscriberRequest $storeSubscriberRequest)
    {
        $subscription = Subscription::create($storeSubscriberRequest->validated());

        return response()->json($subscription, 201);
    }
}
