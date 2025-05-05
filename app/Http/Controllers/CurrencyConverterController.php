<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyConverterController extends Controller
{
    public function showForm()
    {
        return view('currency-converter');
    }

    public function convert(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'from_currency' => 'required|string|size:3',
            'to_currency' => 'required|string|size:3',
        ]);

        $amount = $validated['amount'];
        $from = strtoupper($validated['from_currency']);
        $to = strtoupper($validated['to_currency']);

        // Replace with your own API key if needed
        $apiKey = 'YOUR_API_KEY';
        $url = "https://open.er-api.com/v6/latest/$from";

        $response = Http::get($url);

        if ($response->successful()) {
            $rate = $response['rates'][$to] ?? null;
            if ($rate) {
                $converted = $amount * $rate;

                return view('currency-converter', compact('amount', 'from', 'to', 'converted', 'rate'));
            } else {
                return back()->withErrors(['to_currency' => 'Invalid target currency']);
            }
        }

        return back()->withErrors(['error' => 'Failed to fetch exchange rates']);
    }
}
