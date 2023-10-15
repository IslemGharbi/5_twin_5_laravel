<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout($id,$amount)
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51K9lFqEPn9eHRClTBxsXnVSrOKKjsKO95KUBn3nkSWi6XBx9sWjrG3Nw3s09H6glBnPFN7urnHJK072hpAHP35oj00IJXt4ajk');
        		
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'USD',
			'description' => 'Payment From Opportunity-Freelance',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent','id'));

    }

    public function afterPayment(Request $request)
    {
        return redirect()->route('order.create', ['id' => $request->id]);
    }
}
