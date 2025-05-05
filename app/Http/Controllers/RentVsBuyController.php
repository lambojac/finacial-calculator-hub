<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentVsBuyController extends Controller
{
    public function showForm()
    {
        return view('rent-vs-buy');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'monthly_rent' => 'required|numeric|min:0',
            'home_price' => 'required|numeric|min:0',
            'rate' => 'required|numeric|min:0',
            'years' => 'required|numeric|min:1',
        ]);

        $monthlyRent = $validated['monthly_rent'];
        $homePrice = $validated['home_price'];
        $rate = $validated['rate'] / 100;
        $years = $validated['years'];

        // Rent cost over time
        $totalRent = $monthlyRent * 12 * $years;

        // Approximate buying cost:
        $interestPaid = $homePrice * $rate * $years;
        $maintenance = $homePrice * 0.01 * $years; // 1% maintenance annually
        $propertyTaxes = $homePrice * 0.0125 * $years; // 1.25% tax annually

        $totalBuy = $interestPaid + $maintenance + $propertyTaxes;

        $difference = $totalBuy - $totalRent;

        return view('rent-vs-buy', [
            'monthly_rent' => $monthlyRent,
            'home_price' => $homePrice,
            'rate' => $validated['rate'],
            'years' => $years,
            'totalRent' => round($totalRent, 2),
            'totalBuy' => round($totalBuy, 2),
            'difference' => round($difference, 2),
        ]);
    }
}
