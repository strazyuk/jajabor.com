<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Flight;
class PaymentController extends Controller
{
    /**
     * Show the payment page (using Stripe Checkout).
     */
    public function showPaymentPage($flightId)
    {
        $flight = Flight::findOrFail($flightId);
        return view('payment.checkout', compact('flight'));
    }

    /**
     * Create a Stripe Checkout session.
     */
    public function createCheckoutSession($flightId)
    {
        $flight = Flight::findOrFail($flightId);

        // Set your secret key. Remember to switch to your live secret key in production.
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a new checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => "Flight to " . $flight->destination,
                        ],
                        'unit_amount' => $flight->price * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', $flight->id),
            'cancel_url' => route('payment.cancel', $flight->id),
        ]);

        // Redirect to Stripe Checkout page
        return redirect()->away($session->url);
    }

    /**
     * Handle successful payment.
     */
    public function success($flightId)
    {
        // Update flight status or perform any necessary logic (e.g., reducing seats)
        $flight = Flight::findOrFail($flightId);
        $flight->available_seats -= 1;
        $flight->save();

        return view('payment.success', compact('flight'));
    }

    /**
     * Handle canceled payment.
     */
    public function cancel($flightId)
    {
        return view('payment.cancel', compact('flightId'));
    }
}
