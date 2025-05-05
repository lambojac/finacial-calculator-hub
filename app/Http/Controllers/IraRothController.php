<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IraRothController extends Controller
{
    public function showForm()
    {
        return view('ira-roth');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required|integer|min:0|max:100',
            'contribution' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0|max:100',
            'tax_type' => 'required|in:now,future',
        ]);

        $years = 65 - $validated['age']; // assume retirement age 65
        $rateDecimal = $validated['rate'] / 100;

        $futureValue = $validated['contribution'] * pow(1 + $rateDecimal, $years);

        // Assume current tax = 22%, future = 25%
        $taxNow = 0.22;
        $taxFuture = 0.25;

        if ($validated['tax_type'] === 'now') {
            $afterTaxValue = $futureValue;
            $method = 'Roth IRA (pay taxes now)';
        } else {
            $afterTaxValue = $futureValue * (1 - $taxFuture);
            $method = 'Traditional IRA (pay taxes later)';
        }

        return view('ira-roth', array_merge($validated, [
            'futureValue' => number_format($futureValue, 2),
            'afterTaxValue' => number_format($afterTaxValue, 2),
            'method' => $method,
        ]));
    }
}
