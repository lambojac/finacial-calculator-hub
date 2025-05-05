<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoInsurancePremiumController extends Controller
{
    public function showForm()
    {
        return view('auto-insurance-premium');
    }

    public function estimate(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required|integer|min:16|max:100',
            'state' => 'required|string',
            'vehicle_value' => 'required|numeric|min:1000',
            'coverage_level' => 'required|string|in:basic,standard,full'
        ]);

        $age = $validated['age'];
        $state = strtolower($validated['state']);
        $vehicleValue = $validated['vehicle_value'];
        $coverageLevel = $validated['coverage_level'];

        // Estimate logic
        $baseRate = 500;
        $ageFactor = ($age < 25) ? 1.5 : 1.1;
        $coverageMultiplier = match($coverageLevel) {
            'basic' => 1,
            'standard' => 1.3,
            'full' => 1.6,
        };
        $stateAdjustment = in_array($state, ['ca', 'ny', 'fl']) ? 1.2 : 1;

        $estimatedLow = $baseRate * $ageFactor * $coverageMultiplier * $stateAdjustment;
        $estimatedHigh = $estimatedLow + 300;

        return view('auto-insurance-premium', compact(
            'estimatedLow', 'estimatedHigh', 'age', 'state', 'vehicleValue', 'coverageLevel'
        ));
    }
}
