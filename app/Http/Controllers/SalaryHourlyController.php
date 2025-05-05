<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryHourlyController extends Controller
{
    public function showForm()
    {
        return view('salary-hourly');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'annual_salary' => 'nullable|numeric|min:0',
            'hourly_rate' => 'nullable|numeric|min:0',
            'hours_per_week' => 'required|numeric|min:1|max:80',
        ]);

        $annual_salary = $validated['annual_salary'];
        $hourly_rate = $validated['hourly_rate'];
        $hours_per_week = $validated['hours_per_week'];

        $result = [];

        if ($annual_salary && !$hourly_rate) {
            $result['hourly'] = $annual_salary / (52 * $hours_per_week);
        } elseif ($hourly_rate && !$annual_salary) {
            $result['annual'] = $hourly_rate * $hours_per_week * 52;
        } else {
            $result['error'] = 'Please fill only one of: Annual Salary or Hourly Rate.';
        }

        return view('salary-hourly', compact('result', 'annual_salary', 'hourly_rate', 'hours_per_week'));
    }
}
