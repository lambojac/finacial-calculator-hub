<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentRefiController extends Controller
{
    public function showForm()
    {
        return view('student-refi');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'loan_balance' => 'required|numeric|min:0',
            'old_rate' => 'required|numeric|min:0',
            'new_rate' => 'required|numeric|min:0',
            'term' => 'required|integer|min:1',
        ]);

        $P = $validated['loan_balance'];
        $oldRate = $validated['old_rate'] / 100;
        $newRate = $validated['new_rate'] / 100;
        $n = $validated['term'] * 12;

        // Monthly rates
        $oldMonthlyRate = $oldRate / 12;
        $newMonthlyRate = $newRate / 12;

        // Monthly payments
        $oldMonthlyPayment = $oldMonthlyRate > 0 ? ($P * $oldMonthlyRate) / (1 - pow(1 + $oldMonthlyRate, -$n)) : $P / $n;
        $newMonthlyPayment = $newMonthlyRate > 0 ? ($P * $newMonthlyRate) / (1 - pow(1 + $newMonthlyRate, -$n)) : $P / $n;

        $oldTotal = $oldMonthlyPayment * $n;
        $newTotal = $newMonthlyPayment * $n;
        $savings = $oldTotal - $newTotal;

        return view('student-refi', [
            'loan_balance' => $P,
            'old_rate' => $validated['old_rate'],
            'new_rate' => $validated['new_rate'],
            'term' => $validated['term'],
            'oldMonthlyPayment' => round($oldMonthlyPayment, 2),
            'newMonthlyPayment' => round($newMonthlyPayment, 2),
            'savings' => round($savings, 2),
        ]);
    }
}
