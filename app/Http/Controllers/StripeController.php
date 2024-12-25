<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function createPaymentIntent(Request $request)
{
    // dd($request->all());
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $paymentIntent = PaymentIntent::create([
        'amount' => $request->price * 100, // Replace with dynamic amount in cents
        'currency' => 'usd',
        'payment_method_types' => ['card'],
    ]);

    return response()->json([
        'clientSecret' => $paymentIntent->client_secret,
    ]);
}
}
