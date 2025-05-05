<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class LoanAmortizationController extends Controller
{
    public function index() {
        return view('tools.loan-amortization');
    }

    public function calculate(Request $request) {
        $request->validate([
            'loan_amount' => 'required|numeric',
            'rate' => 'required|numeric',
            'term' => 'required|numeric',
        ]);

        $monthly_rate = $request->rate / 100 / 12;
        $months = $request->term * 12;
        $payment = ($request->loan_amount * $monthly_rate) / (1 - pow(1 + $monthly_rate, -$months));

        return response()->json([
            'monthly_payment' => round($payment, 2),
        ]);
    }
}
