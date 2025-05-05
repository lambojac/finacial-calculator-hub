<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAffordabilityController extends Controller
{
    public function showForm()
    {
        return view('home-affordability');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'income' => 'required|numeric|min:0',
            'down_payment' => 'required|numeric|min:0',
            'debts' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
        ]);

        $annualIncome = $validated['income'];
        $monthlyIncome = $annualIncome / 12;
        $monthlyDebts = $validated['debts'];
        $rate = $validated['rate'] / 100 / 12; // Monthly interest rate
        $downPayment = $validated['down_payment'];
        $termMonths = 30 * 12; // 30-year mortgage

        // Max monthly mortgage payment (e.g., 28% front-end ratio)
        $maxMortgagePayment = ($monthlyIncome * 0.28) - $monthlyDebts;

        // Calculate maximum loan amount using reverse mortgage formula
        $maxLoanAmount = ($rate > 0) 
            ? $maxMortgagePayment * (1 - pow(1 + $rate, -$termMonths)) / $rate 
            : $maxMortgagePayment * $termMonths;

        $maxHomePrice = $maxLoanAmount + $downPayment;

        return view('home-affordability', [
            'income' => $annualIncome,
            'down_payment' => $downPayment,
            'debts' => $monthlyDebts,
            'rate' => $validated['rate'],
            'maxHomePrice' => round($maxHomePrice, 2),
        ]);
    }
}
