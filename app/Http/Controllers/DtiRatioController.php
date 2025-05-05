<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DtiRatioController extends Controller
{
    public function showForm()
    {
        return view('dti-ratio');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'monthly_debt' => 'required|numeric|min:0',
            'gross_income' => 'required|numeric|min:1',
        ]);

        $monthlyDebt = $validated['monthly_debt'];
        $grossIncome = $validated['gross_income'];

        $dti = round(($monthlyDebt / $grossIncome) * 100, 1);
        $status = $dti <= 43 ? 'Pass' : 'Fail'; // 43% is a common threshold

        return view('dti-ratio', compact(
            'monthlyDebt', 'grossIncome', 'dti', 'status'
        ));
    }
}
