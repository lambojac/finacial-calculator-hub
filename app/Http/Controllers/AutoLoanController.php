<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoLoanController extends Controller
{
    public function index()
    {
        return view('auto-loan');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'car_price' => 'required|numeric|min:0',
            'down_payment' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'term' => 'required|integer|min:1',
            'state_tax' => 'required|numeric|min:0',
        ]);

        $loan_amount = $validated['car_price'] - $validated['down_payment'];
        $loan_amount += $validated['car_price'] * ($validated['state_tax'] / 100); // add tax

        $monthly_rate = $validated['interest_rate'] / 100 / 12;
        $months = $validated['term'];

        $monthly_payment = ($monthly_rate > 0)
            ? ($loan_amount * $monthly_rate) / (1 - pow(1 + $monthly_rate, -$months))
            : $loan_amount / $months;

        $total_payment = $monthly_payment * $months;
        $total_interest = $total_payment - $loan_amount;

        return view('auto-loan', [
            'monthly_payment' => round($monthly_payment, 2),
            'total_interest' => round($total_interest, 2),
            'inputs' => $validated
        ]);
    }
}
