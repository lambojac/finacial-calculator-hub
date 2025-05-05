<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RefinanceSavings;

class RefinanceSavingsController extends Controller
{
    public function index()
    {
        return view('refinance-savings');
    }

    public function calculate(Request $request)
    {
        $data = $request->validate([
            'current_balance' => 'required|numeric|min:0',
            'old_rate' => 'required|numeric|min:0',
            'new_rate' => 'required|numeric|min:0',
            'term_left' => 'required|numeric|min:1',
        ]);

        $monthly_old = self::calculateMonthlyPayment($data['current_balance'], $data['old_rate'], $data['term_left']);
        $monthly_new = self::calculateMonthlyPayment($data['current_balance'], $data['new_rate'], $data['term_left']);

        $monthly_savings = $monthly_old - $monthly_new;
        $lifetime_savings = $monthly_savings * $data['term_left'] * 12;

        // Save to database
        $refinance = RefinanceSavings::create([
            'current_balance' => $data['current_balance'],
            'old_rate' => $data['old_rate'],
            'new_rate' => $data['new_rate'],
            'term_left' => $data['term_left'],
        ]);

        return view('refinance-savings', [
            'result' => [
                'monthly_savings' => round($monthly_savings, 2),
                'lifetime_savings' => round($lifetime_savings, 2)
            ],
            'inputs' => $data,
            'saved_id' => $refinance->id
        ]);
    }

    private static function calculateMonthlyPayment($principal, $rate, $termYears)
    {
        $monthlyRate = $rate / 100 / 12;
        $n = $termYears * 12;

        return ($monthlyRate == 0)
            ? $principal / $n
            : $principal * $monthlyRate / (1 - pow(1 + $monthlyRate, -$n));
    }
}
