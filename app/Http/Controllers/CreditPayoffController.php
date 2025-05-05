<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditPayoffController extends Controller
{
    public function index()
    {
        return view('credit-payoff');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'balance' => 'required|numeric|min:0',
            'apr' => 'required|numeric|min:0',
            'monthly_pay' => 'required|numeric|min:1',
        ]);

        $balance = $validated['balance'];
        $monthly_rate = $validated['apr'] / 100 / 12;
        $monthly_payment = $validated['monthly_pay'];

        $months = 0;
        $total_interest = 0;

        // If payment isn't enough to cover interest, loop forever - we stop that
        if ($monthly_payment <= $balance * $monthly_rate) {
            return back()->withErrors(['monthly_pay' => 'Monthly payment too low to cover interest. Increase it.']);
        }

        while ($balance > 0) {
            $interest = $balance * $monthly_rate;
            $principal = $monthly_payment - $interest;
            $balance -= $principal;
            $total_interest += $interest;
            $months++;

            if ($months > 1000) break; // failsafe for infinite loop
        }

        return view('credit-payoff', [
            'months_to_zero' => $months,
            'total_interest' => round($total_interest, 2),
            'inputs' => $validated
        ]);
    }
}
