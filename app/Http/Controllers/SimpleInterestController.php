<?php
namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;
class SimpleInterestController extends Controller
{
    public function index() {
        return view('tools.simple-interest');
    }

    public function calculate(Request $request) {
        $request->validate([
            'principal' => 'required|numeric',
            'rate' => 'required|numeric',
            'time' => 'required|numeric',
        ]);

        $interest = ($request->principal * $request->rate * $request->time) / 100;

        return response()->json([
            'interest' => round($interest, 2),
        ]);
    }
}
