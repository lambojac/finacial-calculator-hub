<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolarRoiController extends Controller
{
    public function showForm()
    {
        return view('solar-roi');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'system_cost'   => 'required|numeric|min:0',
            'kwh_per_year'  => 'required|numeric|min:0',
            'rate_per_kwh'  => 'required|numeric|min:0',
            'rebate'        => 'required|numeric|min:0|max:100',
        ]);

        $systemCost   = $validated['system_cost'];
        $kwhPerYear   = $validated['kwh_per_year'];
        $ratePerKwh   = $validated['rate_per_kwh'];
        $rebate       = $validated['rebate'];

        $rebatedCost  = $systemCost * (1 - ($rebate / 100));
        $annualSavings = $kwhPerYear * $ratePerKwh;

        $paybackYears = $annualSavings > 0 ? round($rebatedCost / $annualSavings, 1) : null;
        $profit25Years = round(($annualSavings * 25) - $rebatedCost, 2);

        return view('solar-roi', compact(
            'systemCost', 'kwhPerYear', 'ratePerKwh', 'rebate',
            'rebatedCost', 'annualSavings', 'paybackYears', 'profit25Years'
        ));
    }
}
