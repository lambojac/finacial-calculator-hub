<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class DailyCompoundInterestController extends Controller
{
    public function index() {
        return view('tools.daily-compound-interest');
    }

    public function calculate(Request $request) {
        $request->validate([
            'principal' => 'required|numeric',
            'rate' => 'required|numeric',
            'time' => 'required|numeric',
        ]);

        $daily_rate = $request->rate / 100 / 365;
        $compound_value = $request->principal * pow(1 + $daily_rate, 365 * $request->time);

        return response()->json([
            'compound_value' => round($compound_value, 2),
        ]);
    }
}
