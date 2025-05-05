<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class InflationEffectController extends Controller
{
    public function index() {
        return view('tools.inflation-effect');
    }

    public function calculate(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'inflation_rate' => 'required|numeric',
            'years' => 'required|numeric',
        ]);

        $adjusted_value = $request->amount / pow(1 + $request->inflation_rate / 100, $request->years);

        return response()->json([
            'adjusted_value' => round($adjusted_value, 2),
        ]);
    }
}
