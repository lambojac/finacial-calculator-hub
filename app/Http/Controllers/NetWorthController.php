<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetWorthController extends Controller
{
    public function showForm()
    {
        return view('net-worth');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'assets_list' => 'required|string',
            'liabilities' => 'required|numeric|min:0',
        ]);

        $assetsInput = $validated['assets_list'];
        $liabilities = $validated['liabilities'];

        $assets = array_filter(array_map('floatval', explode(',', $assetsInput)));
        $totalAssets = array_sum($assets);
        $netWorth = $totalAssets - $liabilities;

        return view('net-worth', compact('assetsInput', 'liabilities', 'totalAssets', 'netWorth'));
    }
}
