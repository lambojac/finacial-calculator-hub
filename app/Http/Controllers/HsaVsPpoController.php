<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HsaVsPpoController extends Controller
{
    public function showForm()
    {
        return view('hsa-vs-ppo');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'deductible' => 'required|numeric|min:0',
            'premium' => 'required|numeric|min:0',
            'oop_max' => 'required|numeric|min:0',
        ]);

        $deductible = $validated['deductible'];
        $premium = $validated['premium'];
        $oopMax = $validated['oop_max'];

        // Simplified estimate: total annual cost = premium + potential max out-of-pocket
        $estimatedAnnualCost = $premium * 12 + $oopMax;

        return view('hsa-vs-ppo', compact('deductible', 'premium', 'oopMax', 'estimatedAnnualCost'));
    }
}
