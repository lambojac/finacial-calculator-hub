<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class BudgetingController extends Controller
{
    public function index() {
        return view('tools.budgeting');
    }

    public function calculate(Request $request) {
        $request->validate([
            'income' => 'required|numeric',
            'expenses' => 'required|numeric',
        ]);

        $savings = $request->income - $request->expenses;
        $savings_percentage = ($savings / $request->income) * 100;

        return response()->json([
            'savings_percentage' => round($savings_percentage, 2),
            'savings' => round($savings, 2),
        ]);
    }
}
