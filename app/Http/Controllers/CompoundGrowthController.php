<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompoundGrowthController extends Controller
{
    public function index()
    {
        return view('compound-growth');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'initial_deposit' => 'required|numeric|min:0',
            'monthly_addition' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
            'years' => 'required|integer|min:1',
        ]);

        $initial_deposit = $validated['initial_deposit'];
        $monthly_addition = $validated['monthly_addition'];
        $annual_rate = $validated['rate'] / 100;
        $years = $validated['years'];

        // Compound interest formula
        $months = $years * 12;
        $monthly_rate = $annual_rate / 12;
        $future_value = $initial_deposit;

        $values = [];
        $time_periods = [];

        for ($i = 1; $i <= $months; $i++) {
            // Compound the value for the month
            $future_value = $future_value * (1 + $monthly_rate) + $monthly_addition;
            $values[] = round($future_value, 2);
            $time_periods[] = $i;
        }

        // Return results with chart data
        return view('compound-growth', [
            'future_value' => round($future_value, 2),
            'values' => $values,
            'time_periods' => $time_periods,
            'inputs' => $validated
        ]);
    }
}
