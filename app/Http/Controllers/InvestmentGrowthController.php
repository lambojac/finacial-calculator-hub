<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class InvestmentGrowthController extends Controller
{
    public function index() {
        return view('tools.investment-growth');
    }

    public function calculate(Request $request) {
        $request->validate([
            'principal' => 'required|numeric',
            'rate' => 'required|numeric',
            'time' => 'required|numeric',
        ]);

        $future_value = $request->principal * pow(1 + ($request->rate / 100), $request->time);

        return response()->json([
            'future_value' => round($future_value, 2),
        ]);
    }
}
