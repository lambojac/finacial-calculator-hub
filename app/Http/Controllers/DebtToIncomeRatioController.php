<?php
namespace App\Http\Controllers;
use App\Models\Calculator;
use Illuminate\Http\Request;
class DebtToIncomeRatioController extends Controller
{
    public function index() {
        return view('tools.debt-to-income-ratio');
    }

    public function calculate(Request $request) {
        $request->validate([
            'monthly_debt' => 'required|numeric',
            'monthly_income' => 'required|numeric',
        ]);

        $dti = ($request->monthly_debt / $request->monthly_income) * 100;

        return response()->json([
            'debt_to_income_ratio' => round($dti, 2),
        ]);
    }
}
