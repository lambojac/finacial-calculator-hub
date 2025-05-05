<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxEstimatorController extends Controller
{
    public function showForm()
    {
        return view('tax-estimator');
    }

    public function estimate(Request $request)
    {
        $validated = $request->validate([
            'filing_status' => 'required|string|in:single,married',
            'income' => 'required|numeric|min:0',
            'region' => 'required|string',
        ]);

        $filingStatus = $validated['filing_status'];
        $income = $validated['income'];
        $region = strtolower($validated['region']);

        $estimatedFederal = 0;
        $estimatedState = 0;

        // Basic placeholder logic — replace with real tax brackets
        if ($filingStatus === 'single') {
            $estimatedFederal = $income * 0.20;
        } elseif ($filingStatus === 'married') {
            $estimatedFederal = $income * 0.15;
        }

        // Placeholder state/province logic
        if (in_array($region, ['ca', 'california', 'on', 'ontario'])) {
            $estimatedState = $income * 0.10;
        } else {
            $estimatedState = $income * 0.05;
        }

        $totalTax = $estimatedFederal + $estimatedState;

        return view('tax-estimator', compact('totalTax', 'estimatedFederal', 'estimatedState', 'filingStatus', 'income', 'region'));
    }
}
