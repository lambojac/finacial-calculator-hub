<?php
namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;
class SavingsGoalController extends Controller
{
    public function index() {
        return view('tools.savings-goal');
    }

    public function calculate(Request $request) {
        $request->validate([
            'goal_amount' => 'required|numeric',
            'current_savings' => 'required|numeric',
            'monthly_contrib' => 'required|numeric',
            'interest_rate' => 'required|numeric',
        ]);

        $rate = $request->interest_rate / 100 / 12;
        $months = ceil(log(($request->goal_amount - $request->current_savings * (1 + $rate)) / $request->monthly_contrib) / log(1 + $rate));

        return response()->json([
            'months_to_goal' => $months,
        ]);
    }
}
