<?php

namespace App\Services;

use App\Models\Calculator;

class CalculatorService
{
    /**
     * Calculate results based on calculator type and inputs
     *
     * @param string $slug
     * @param array $inputs
     * @return array
     */
    public function calculate($slug, array $inputs)
    {
        // Get calculator from database
        $calculator = Calculator::where('slug', $slug)->firstOrFail();
        
        // Call specific calculator method
        $method = 'calculate' . $this->slugToMethodName($slug);
        
        if (method_exists($this, $method)) {
            return $this->$method($inputs, $calculator->constants ?? []);
        }
        
        throw new \Exception("Calculator method not found for: $slug");
    }
    
    /**
     * Convert slug to method name
     *
     * @param string $slug
     * @return string
     */
    protected function slugToMethodName($slug)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $slug)));
    }
    
    /**
     * Calculate mortgage payment
     *
     * @param array $inputs
     * @param array $constants
     * @return array
     */
    protected function calculateMortgagePayment(array $inputs, array $constants = [])
    {
        $principal = floatval($inputs['loan_amount']);
        $rate = floatval($inputs['interest_rate']) / 100 / 12; // Monthly interest rate
        $years = intval($inputs['years']);
        $months = $years * 12;
        $startDate = $inputs['start_date'];
        
        // Calculate monthly payment - M = P[r(1+r)^n]/[(1+r)^n-1]
        if ($rate > 0) {
            $monthlyPayment = $principal * ($rate * pow(1 + $rate, $months)) / (pow(1 + $rate, $months) - 1);
        } else {
            $monthlyPayment = $principal / $months;
        }
        
        // Generate amortization table
        $amortizationTable = [];
        $balance = $principal;
        $totalInterest = 0;
        $date = date('Y-m-d', strtotime($startDate));
        
        for ($month = 1; $month <= $months; $month++) {
            $interest = $balance * $rate;
            $principal_part = $monthlyPayment - $interest;
            $balance -= $principal_part;
            $totalInterest += $interest;
            
            $amortizationTable[] = [
                'month' => $month,
                'date' => $date,
                'payment' => round($monthlyPayment, 2),
                'principal' => round($principal_part, 2),
                'interest' => round($interest, 2),
                'balance' => round($balance, 2),
                'total_interest' => round($totalInterest, 2),
            ];
            
            $date = date('Y-m-d', strtotime('+1 month', strtotime($date)));
        }
        
        return [
            'monthly_payment' => round($monthlyPayment, 2),
            'total_payments' => round($monthlyPayment * $months, 2),
            'total_interest' => round($totalInterest, 2),
            'amortization_table' => $amortizationTable,
        ];
    }
    
    /**
     * Calculate mortgage refinance savings
     *
     * @param array $inputs
     * @param array $constants
     * @return array
     */
    protected function calculateRefinanceSavings(array $inputs, array $constants = [])
    {
        $currentBalance = floatval($inputs['current_balance']);
        $oldRate = floatval($inputs['old_rate']) / 100 / 12; // Monthly interest rate
        $newRate = floatval($inputs['new_rate']) / 100 / 12; // Monthly interest rate
        $termLeft = intval($inputs['term_left']) * 12; // Months left
        
        // Calculate current monthly payment
        if ($oldRate > 0) {
            $oldMonthlyPayment = $currentBalance * ($oldRate * pow(1 + $oldRate, $termLeft)) 
                / (pow(1 + $oldRate, $termLeft) - 1);
        } else {
            $oldMonthlyPayment = $currentBalance / $termLeft;
        }
        
        // Calculate new monthly payment
        if ($newRate > 0) {
            $newMonthlyPayment = $currentBalance * ($newRate * pow(1 + $newRate, $termLeft)) 
                / (pow(1 + $newRate, $termLeft) - 1);
        } else {
            $newMonthlyPayment = $currentBalance / $termLeft;
        }
        
        $monthlySavings = $oldMonthlyPayment - $newMonthlyPayment;
        $lifetimeSavings = $monthlySavings * $termLeft;
        
        // Calculate total interest with old rate
        $oldTotalInterest = ($oldMonthlyPayment * $termLeft) - $currentBalance;
        
        // Calculate total interest with new rate
        $newTotalInterest = ($newMonthlyPayment * $termLeft) - $currentBalance;
        
        // Interest savings
        $interestSavings = $oldTotalInterest - $newTotalInterest;
        
        return [
            'old_monthly_payment' => round($oldMonthlyPayment, 2),
            'new_monthly_payment' => round($newMonthlyPayment, 2),
            'monthly_savings' => round($monthlySavings, 2),
            'lifetime_savings' => round($lifetimeSavings, 2),
            'old_total_interest' => round($oldTotalInterest, 2),
            'new_total_interest' => round($newTotalInterest, 2),
            'interest_savings' => round($interestSavings, 2),
        ];
    }
    
    /**
     * Calculate auto loan payment
     *
     * @param array $inputs
     * @param array $constants
     * @return array
     */
    protected function calculateAutoLoan(array $inputs, array $constants = [])
    {
        $carPrice = floatval($inputs['car_price']);
        $downPayment = floatval($inputs['down_payment']);
        $rate = floatval($inputs['interest_rate']) / 100 / 12; // Monthly interest rate
        $term = intval($inputs['term']); // Months
        $taxRate = floatval($inputs['tax_rate']) / 100;
        
        // Calculate loan amount including tax
        $taxAmount = $carPrice * $taxRate;
        $loanAmount = $carPrice + $taxAmount - $downPayment;
        
        // Calculate monthly payment
        if ($rate > 0) {
            $monthlyPayment = $loanAmount * ($rate * pow(1 + $rate, $term)) / (pow(1 + $rate, $term) - 1);
        } else {
            $monthlyPayment = $loanAmount / $term;
        }
        
        // Calculate total interest
        $totalInterest = ($monthlyPayment * $term) - $loanAmount;
        $totalCost = $carPrice + $taxAmount + $totalInterest;
        
        return [
            'tax_amount' => round($taxAmount, 2),
            'loan_amount' => round($loanAmount, 2),
            'monthly_payment' => round($monthlyPayment, 2),
            'total_interest' => round($totalInterest, 2),
            'total_cost' => round($totalCost, 2),
        ];
    }
    
    /**
     * Calculate personal loan APR
     *
     * @param array $inputs
     * @param array $constants
     * @return array
     */
    protected function calculatePersonalLoanApr(array $inputs, array $constants = [])
    {
        $principal = floatval($inputs['principal']);
        $fees = floatval($inputs['fees']);
        $term = intval($inputs['term']); // Months
        $nominalRate = floatval($inputs['nominal_rate']) / 100;
        
        // Calculate loan amount with fees
        $loanAmount = $principal + $fees;
        
        // Calculate monthly payment using nominal rate
        $monthlyRate = $nominalRate / 12;
        $monthlyPayment = $principal * ($monthlyRate * pow(1 + $monthlyRate, $term)) 
            / (pow(1 + $monthlyRate, $term) - 1);
            
        // Calculate total cost
        $totalPayment = $monthlyPayment * $term;
        $totalInterest = $totalPayment - $principal;
        $totalCost = $totalInterest + $fees;
        
        // Calculate APR - this is an approximation using Newton-Raphson method
        $apr = $this->calculateApr($principal, $fees, $monthlyPayment, $term);
        
        return [
            'monthly_payment' => round($monthlyPayment, 2),
            'total_payments' => round($totalPayment, 2),
            'total_interest' => round($totalInterest, 2),
            'total_cost' => round($totalCost, 2),
            'nominal_rate' => round($nominalRate * 100, 2),
            'apr' => round($apr * 100, 2),
        ];
    }
    
    /**
     * Calculate APR using Newton-Raphson method
     * 
     * @param float $principal
     * @param float $fees
     * @param float $monthlyPayment
     * @param int $term
     * @return float
     */
    private function calculateApr($principal, $fees, $monthlyPayment, $term)
    {
        $loanAmount = $principal - $fees;
        $guess = 0.1; // Initial guess of 10%
        $tolerance = 0.0000001;
        $maxIterations = 100;
        
        for ($i = 0; $i < $maxIterations; $i++) {
            $monthlyGuess = $guess / 12;
            
            // Present value with current guess
            $pv = 0;
            for ($t = 1; $t <= $term; $t++) {
                $pv += $monthlyPayment / pow(1 + $monthlyGuess, $t);
            }
            
            // Check if we're close enough
            if (abs($pv - $loanAmount) < $tolerance) {
                return $guess;
            }
            
            // Calculate derivative of present value formula
            $dpv = 0;
            for ($t = 1; $t <= $term; $t++) {
                $dpv -= $t * $monthlyPayment / pow(1 + $monthlyGuess, $t + 1);
            }
            
            // Newton's method update
            $guess = $guess - ($pv - $loanAmount) / $dpv;
            
            // Ensure rate doesn't go negative
            if ($guess < 0) {
                $guess = 0.01;
            }
        }
        
        return $guess;
    }
}