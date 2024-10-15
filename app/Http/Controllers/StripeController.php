<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StripeController extends Controller
{
    public function createSubscription(Request $request)
    {
        $user = Auth::user();
        $price_basic_monthly = 'price_1QA2CtIBJvEHWL295g2nqcZW';
        $type = 'basic';

        $checkout =  $user->newSubscription($type, $price_basic_monthly)
        ->checkout([
            'success_url' => route('checkout-success'),
            'cancel_url' => route('checkout-cancel'),
        ])->toArray();

        return [
            "status" => 1,
            "url" => $checkout['url']
        ];
    }

    public function showSubscription(Request $request)
    {
        $user = Auth::user();

        return [
            "status" => 1,
            "subscriptions" => [
                "is_subscribed" => $user->subscribed(),
                "is_ToPrice" => $user->subscribedToPrice('price_1QA2CtIBJvEHWL295g2nqcZW')
            ]
        ];
    }

    public function billingPortal(Request $request)
    {
        $user = Auth::user();

        return [
            "status" => 1,
            "url" => $user->billingPortalUrl(route('top'))
        ];
    }
}
