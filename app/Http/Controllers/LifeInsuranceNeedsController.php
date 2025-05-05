<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeInsuranceNeedsController extends Controller
{
    public function showForm()
    {
        return view('life-insurance-needs');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'annual_income' => 'required|numeric|min:0',
            'debts' => 'required|numeric|min:0',
            'college_fund' => 'required|numeric|min:0',
        ]);

        $annualIncome = $validated['annual_income'];
        $debts = $validated['debts'];
        $collegeFund = $validated['college_fund'];

        // Common rule of thumb: 10x annual income + debts + future expenses (college, etc.)
        $recommendedCoverage = ($annualIncome * 10) + $debts + $collegeFund;

        return view('life-insurance-needs', compact(
            'annualIncome', 'debts', 'collegeFund', 'recommendedCoverage'
        ));
    }
}
