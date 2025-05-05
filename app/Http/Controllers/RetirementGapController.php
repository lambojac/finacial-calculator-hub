<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetirementGapController extends Controller
{
    public function showForm()
    {
        return view('retirement-gap');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required|integer|min:18|max:70',
            'salary' => 'required|numeric|min:0',
            'current_401k' => 'required|numeric|min:0',
            'contrib_percent' => 'required|numeric|min:0|max:100',
            'employer_match' => 'required|numeric|min:0|max:100',
        ]);

        
        $retirement_age = 65;
        $years_left = $retirement_age - $validated['age'];
        $annual_contrib = ($validated['contrib_percent'] + $validated['employer_match']) / 100 * $validated['salary'];
        $growth_rate = 0.07; 
        $future_value = $validated['current_401k'];

        for ($i = 0; $i < $years_left; $i++) {
            $future_value += $annual_contrib;
            $future_value *= (1 + $growth_rate);
        }

        $target_balance = $validated['salary'] * 25; 
        $gap = $target_balance - $future_value;

        return view('retirement-gap', [
            'result' => [
                'future_value' => round($future_value, 2),
                'target' => round($target_balance, 2),
                'gap' => round($gap, 2),
                'years_left' => $years_left
            ]
        ]);
    }
}
