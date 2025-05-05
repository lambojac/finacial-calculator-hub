<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalLoanAprController extends Controller
{
    public function index()
    {
        return view('personal-loan-apr');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'principal' => 'required|numeric|min:0',
            'fees' => 'required|numeric|min:0',
            'term' => 'required|integer|min:1',
            'nominal_rate' => 'required|numeric|min:0',
        ]);

        $loan_amount = $validated['principal'] + $validated['fees'];
        $monthly_rate = $validated['nominal_rate'] / 100 / 12;
        $months = $validated['term'];

        $monthly_payment = ($monthly_rate > 0)
            ? ($validated['principal'] * $monthly_rate) / (1 - pow(1 + $monthly_rate, -$months))
            : $validated['principal'] / $months;

        $total_cost = $monthly_payment * $months;

        // Effective APR (simplified approximation)
        $apr = ($total_cost - $validated['principal']) / $validated['principal'] / ($months / 12) * 100;

        return view('personal-loan-apr', [
            'true_apr' => round($apr, 2),
            'total_cost' => round($total_cost, 2),
            'inputs' => $validated
        ]);
    }
}
