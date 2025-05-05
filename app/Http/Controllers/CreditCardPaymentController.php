<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class CreditCardPaymentController extends Controller
{
    public function index() {
        return view('tools.credit-card-payment');
    }

    public function calculate(Request $request) {
        $request->validate([
            'balance' => 'required|numeric',
            'rate' => 'required|numeric',
            'monthly_payment' => 'required|numeric',
        ]);

        $rate = $request->rate / 100 / 12;
        $months = log(1 - ($rate * $request->balance / $request->monthly_payment)) / log(1 + $rate) * -1;

        return response()->json([
            'months_to_payoff' => ceil($months),
        ]);
    }
}
