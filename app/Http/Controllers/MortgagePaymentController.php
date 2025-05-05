<?php

namespace App\Http\Controllers;

use App\Models\MortgagePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MortgagePaymentController extends Controller
{
    /**
     * Display mortgage payment calculator
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('mortgage-payment');
    }

    /**
     * Calculate mortgage payment and return results
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'loan_amount' => 'required|numeric|min:1',
            'rate' => 'required|numeric|min:0.01|max:100',
            'years' => 'required|integer|min:1|max:50',
            'start_date' => 'required|date',
        ]);

        // Convert annual interest rate to monthly rate (decimal)
        $monthlyRate = $validated['rate'] / 100 / 12;
        
        // Total number of payments (months)
        $totalPayments = $validated['years'] * 12;
        
        // Calculate monthly payment using formula: P = L[i(1+i)^n]/[(1+i)^n-1]
        // Where:
        // P = Monthly payment
        // L = Loan amount
        // i = Monthly interest rate (decimal)
        // n = Total number of payments
        
        $monthlyPayment = $validated['loan_amount'] * 
                          ($monthlyRate * pow(1 + $monthlyRate, $totalPayments)) / 
                          (pow(1 + $monthlyRate, $totalPayments) - 1);
        
        // Generate amortization schedule
        $schedule = $this->generateAmortizationSchedule(
            $validated['loan_amount'],
            $monthlyRate,
            $totalPayments,
            Carbon::parse($validated['start_date'])
        );
        
        // Store calculation in database (optional)
        MortgagePayment::create($validated);
        
        return response()->json([
            'monthlyPayment' => round($monthlyPayment, 2),
            'totalPayments' => $totalPayments,
            'totalInterest' => round(($monthlyPayment * $totalPayments) - $validated['loan_amount'], 2),
            'totalCost' => round($monthlyPayment * $totalPayments, 2),
            'schedule' => $schedule
        ]);
    }
    
    /**
     * Generate amortization schedule
     *
     * @param float $loanAmount
     * @param float $monthlyRate
     * @param int $totalPayments
     * @param Carbon $startDate
     * @return array
     */
    private function generateAmortizationSchedule($loanAmount, $monthlyRate, $totalPayments, $startDate)
    {
        $schedule = [];
        $balance = $loanAmount;
        
        for ($month = 1; $month <= $totalPayments; $month++) {
            // Calculate interest for this period
            $interestPayment = $balance * $monthlyRate;
            
            // Calculate principal for this period
            $principalPayment = $monthlyPayment = $loanAmount * 
                          ($monthlyRate * pow(1 + $monthlyRate, $totalPayments)) / 
                          (pow(1 + $monthlyRate, $totalPayments) - 1) - $interestPayment;
            
            // Update remaining balance
            $balance = $balance - $principalPayment;
            
            // Ensure final payment is exactly correct (avoid floating point errors)
            if ($month == $totalPayments) {
                $principalPayment += $balance;
                $balance = 0;
            }
            
            // Get payment date
            $paymentDate = (clone $startDate)->addMonths($month)->format('M Y');
            
            // Add to schedule
            $schedule[] = [
                'month' => $month,
                'date' => $paymentDate,
                'payment' => round($principalPayment + $interestPayment, 2),
                'principal' => round($principalPayment, 2),
                'interest' => round($interestPayment, 2),
                'balance' => round($balance, 2)
            ];
        }
        
        // Return first 12 months and then every 12th month for display purposes
        return array_filter($schedule, function($item, $index) {
            return $index < 12 || $index % 12 == 0;
        }, ARRAY_FILTER_USE_BOTH);
    }
}