<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Student Loan Refinance Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #0ea5e9;
            --accent-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-color: #f3f4f6;
            --dark-color: #1f2937;
            --text-color: #374151;
            --border-radius: 10px;
            --box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .header-subtitle {
            opacity: 0.9;
            font-weight: 300;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .calculator-container {
            max-width: 1000px;
            margin: 0 auto 3rem auto;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .calculator-header {
            background-color: var(--light-color);
            padding: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .calculator-header h2 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .calculator-header p {
            color: #6b7280;
            margin-bottom: 0;
        }
        
        .calculator-body {
            padding: 2rem;
        }
        
        .calculator-section {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .calculator-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .section-title {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .section-title i {
            color: var(--secondary-color);
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-outline-secondary {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
            transition: all 0.3s ease;
        }
        
        .btn-outline-secondary:hover {
            background-color: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .form-floating > .form-control-plaintext ~ label::after,
        .form-floating > .form-control:focus ~ label::after,
        .form-floating > .form-control:not(:placeholder-shown) ~ label::after,
        .form-floating > .form-select ~ label::after {
            background-color: transparent;
        }
        
        .form-floating > .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon .form-control {
            padding-left: 2.5rem;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            z-index: 10;
        }
        
        .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25);
        }
        
        .results-container {
            background: #f9fafb;
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: var(--box-shadow);
        }
        
        .results-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .results-header h3 {
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        
        .card-header {
            font-weight: 600;
            padding: 1rem 1.5rem;
        }
        
        .results-highlight {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-color);
        }
        
        .savings-positive {
            color: var(--accent-color);
        }
        
        .savings-negative {
            color: var(--danger-color);
        }
        
        .payment-change {
            padding: 0.75rem;
            border-radius: var(--border-radius);
            font-weight: 500;
        }
        
        .payment-decrease {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--accent-color);
        }
        
        .payment-increase {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }
        
        .recommendation-card {
            border-left: 4px solid;
            padding: 1.5rem;
            margin-top: 2rem;
            border-radius: var(--border-radius);
        }
        
        .recommendation-card.positive {
            border-left-color: var(--accent-color);
            background-color: rgba(16, 185, 129, 0.05);
        }
        
        .recommendation-card.negative {
            border-left-color: var(--danger-color);
            background-color: rgba(239, 68, 68, 0.05);
        }
        
        .recommendation-card.neutral {
            border-left-color: var(--warning-color);
            background-color: rgba(245, 158, 11, 0.05);
        }
        
        .tooltip-icon {
            color: var(--secondary-color);
            margin-left: 0.5rem;
            cursor: help;
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 3rem 0;
            margin-top: 3rem;
        }
        
        .footer-logo {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .footer-links {
            margin-bottom: 1rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            margin-right: 1.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-links {
            font-size: 1.25rem;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-right: 0.75rem;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
        }
        
        .copyright {
            color: rgba(255, 255, 255, 0.6);
            margin-top: 2rem;
            font-size: 0.875rem;
        }
        
        /* Features section */
        .features-section {
            padding: 4rem 0;
            background-color: #f3f4f6;
        }
        
        .feature-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .feature-card h3 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        /* FAQ section */
        .faq-section {
            padding: 4rem 0;
        }
        
        .accordion-item {
            border: none;
            margin-bottom: 1rem;
        }
        
        .accordion-button {
            font-weight: 600;
            color: var(--dark-color);
            background-color: #f9fafb;
            border-radius: var(--border-radius) !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .accordion-button:not(.collapsed) {
            color: var(--primary-color);
            background-color: rgba(37, 99, 235, 0.05);
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(37, 99, 235, 0.3);
        }
        
        /* Call to action section */
        .cta-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .cta-content {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        
        .cta-content h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .cta-btn {
            background-color: white;
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .cta-btn:hover {
            background-color: var(--accent-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .calculator-body {
                padding: 1.5rem;
            }
            
            .results-container {
                padding: 1.5rem;
            }
            
            .header {
                padding: 1.5rem 0;
            }
            
            h1 {
                font-size: 1.75rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .calculator-section {
                margin-bottom: 1.5rem;
                padding-bottom: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container text-center">
            <h1>Student Loan Refinance Calculator</h1>
            <p class="header-subtitle">Make an informed decision about refinancing your student loans and discover how much you could save</p>
        </div>
    </header>

    <div class="container">
        <!-- Main Calculator Section -->
        <div class="calculator-container">
            <div class="calculator-header">
                <h2>Calculate Your Potential Savings</h2>
                <p>Enter your current loan details and potential refinancing options to see if refinancing makes financial sense for you.</p>
            </div>
            
            <div class="calculator-body">
                <!-- Calculator Form -->
                <form method="POST" action="{{ route('student.refi.calculate') }}" id="calculatorForm" class="needs-validation" novalidate>
                    @csrf
                    
                    <div class="calculator-section">
                        <h3 class="section-title">
                            <i class="fas fa-dollar-sign"></i>Current Loan Information
                        </h3>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating input-with-icon mb-3">
                                    <i class="fas fa-dollar-sign input-icon"></i>
                                    <input type="number" step="0.01" min="1" name="loan_balance" id="loan_balance" class="form-control" placeholder="Loan Balance" required value="{{ old('loan_balance', $loan_balance ?? '') }}">
                                    <label for="loan_balance">Current Loan Balance</label>
                                    <div class="invalid-feedback">Please enter your current loan balance.</div>
                                    <div class="form-text">The remaining principal on your student loan.</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating input-with-icon mb-3">
                                    <i class="fas fa-percent input-icon"></i>
                                    <input type="number" step="0.01" min="0.01" max="25" name="old_rate" id="old_rate" class="form-control" placeholder="Current Interest Rate" required value="{{ old('old_rate', $old_rate ?? '') }}">
                                    <label for="old_rate">Current Interest Rate (%)</label>
                                    <div class="invalid-feedback">Please enter a valid interest rate (0.01-25%).</div>
                                    <div class="form-text">The annual interest rate on your existing loan.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="calculator-section">
                        <h3 class="section-title">
                            <i class="fas fa-sync-alt"></i>Refinance Options
                        </h3>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating input-with-icon mb-3">
                                    <i class="fas fa-percent input-icon"></i>
                                    <input type="number" step="0.01" min="0.01" max="25" name="new_rate" id="new_rate" class="form-control" placeholder="New Interest Rate" required value="{{ old('new_rate', $new_rate ?? '') }}">
                                    <label for="new_rate">New Interest Rate (%)</label>
                                    <div class="invalid-feedback">Please enter a valid interest rate (0.01-25%).</div>
                                    <div class="form-text">The annual interest rate offered by the refinancing lender.</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="term" id="term" class="form-select" required>
                                        <option value="" disabled selected>Select loan term</option>
                                        <option value="5" {{ old('term', $term ?? '') == '5' ? 'selected' : '' }}>5 years</option>
                                        <option value="7" {{ old('term', $term ?? '') == '7' ? 'selected' : '' }}>7 years</option>
                                        <option value="10" {{ old('term', $term ?? '') == '10' ? 'selected' : '' }}>10 years</option>
                                        <option value="15" {{ old('term', $term ?? '') == '15' ? 'selected' : '' }}>15 years</option>
                                        <option value="20" {{ old('term', $term ?? '') == '20' ? 'selected' : '' }}>20 years</option>
                                        <option value="25" {{ old('term', $term ?? '') == '25' ? 'selected' : '' }}>25 years</option>
                                        <option value="30" {{ old('term', $term ?? '') == '30' ? 'selected' : '' }}>30 years</option>
                                    </select>
                                    <label for="term">Loan Term (Years)</label>
                                    <div class="invalid-feedback">Please select a loan term.</div>
                                    <div class="form-text">The number of years you'll take to repay the refinanced loan.</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info mt-3">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-info-circle fa-lg"></i>
                                </div>
                                <div>
                                    <strong>Pro Tip:</strong> A shorter loan term typically means higher monthly payments but less interest paid overall. A longer term reduces monthly payments but increases total interest paid.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 col-lg-6 mx-auto mt-4">
                        <button type="submit" id="calculateBtn" class="btn btn-primary">
                            <i class="fas fa-calculator me-2"></i>Calculate My Savings
                        </button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#infoModal">
                            <i class="fas fa-question-circle me-2"></i>How This Calculator Works
                        </button>
                    </div>
                </form>
                
                <!-- Results Section (conditionally rendered) -->
                @isset($savings)
                <div class="results-container">
                    <div class="results-header">
                        <h3>Your Refinance Analysis</h3>
                        <p class="text-muted">Based on the information you provided</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <i class="fas fa-money-bill-wave me-2"></i>Monthly Payment Comparison
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-1">Current Payment</p>
                                            <h4>${{ number_format($oldMonthlyPayment, 2) }}</h4>
                                        </div>
                                        <div class="col-6 text-center">
                                            <p class="text-muted mb-1">New Payment</p>
                                            <h4>${{ number_format($newMonthlyPayment, 2) }}</h4>
                                        </div>
                                    </div>
                                    
                                    @php
                                        $paymentDiff = $oldMonthlyPayment - $newMonthlyPayment;
                                        $isDecrease = $paymentDiff > 0;
                                        $monthlyChangePercent = ($paymentDiff / $oldMonthlyPayment) * 100;
                                    @endphp
                                    
                                    <div class="text-center mt-3">
                                        <div class="payment-change {{ $isDecrease ? 'payment-decrease' : 'payment-increase' }}">
                                            @if($isDecrease)
                                                <i class="fas fa-arrow-down me-2"></i>
                                                Your payment decreases by ${{ number_format(abs($paymentDiff), 2) }}/month
                                                <div class="mt-1"><small>({{ number_format(abs($monthlyChangePercent), 1) }}% reduction)</small></div>
                                            @else
                                                <i class="fas fa-arrow-up me-2"></i>
                                                Your payment increases by ${{ number_format(abs($paymentDiff), 2) }}/month
                                                <div class="mt-1"><small>({{ number_format(abs($monthlyChangePercent), 1) }}% increase)</small></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <i class="fas fa-piggy-bank me-2"></i>Lifetime Savings Analysis
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h3 class="{{ $savings > 0 ? 'savings-positive' : 'savings-negative' }}">
                                            {{ $savings > 0 ? '+' : '' }}${{ number_format($savings, 2) }}
                                        </h3>
                                        <p class="text-muted">Total interest {{ $savings > 0 ? 'saved' : 'added' }} over {{ $term }} years</p>
                                    </div>
                                    
                                    @php
                                        $monthlyImpact = $savings / ($term * 12);
                                        $totalRepaymentOld = $oldMonthlyPayment * $term * 12;
                                        $totalRepaymentNew = $newMonthlyPayment * $term * 12;
                                    @endphp
                                    
                                    <div class="mt-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Total Cost (Current):</span>
                                            <span>${{ number_format($totalRepaymentOld, 2) }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Total Cost (Refinanced):</span>
                                            <span>${{ number_format($totalRepaymentNew, 2) }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Effective Monthly Savings:</span>
                                            <span class="{{ $monthlyImpact > 0 ? 'savings-positive' : 'savings-negative' }}">
                                                {{ $monthlyImpact > 0 ? '+' : '' }}${{ number_format($monthlyImpact, 2) }}/month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recommendation Section -->
                    @php
                        $recommendationType = $savings > 0 ? 'positive' : ($savings < -1000 ? 'negative' : 'neutral');
                    @endphp
                    
                    <div class="recommendation-card {{ $recommendationType }}">
                        <div class="d-flex">
                            <div class="me-3">
                                @if($recommendationType == 'positive')
                                    <i class="fas fa-check-circle fa-2x text-success"></i>
                                @elseif($recommendationType == 'negative')
                                    <i class="fas fa-times-circle fa-2x text-danger"></i>
                                @else
                                    <i class="fas fa-exclamation-circle fa-2x text-warning"></i>
                                @endif
                            </div>
                            <div>
                                <h4>
                                    @if($recommendationType == 'positive')
                                        Refinancing Is Recommended
                                    @elseif($recommendationType == 'negative')
                                        Refinancing May Not Be Beneficial
                                    @else
                                        Consider Additional Factors
                                    @endif
                                </h4>
                                
                                @if($recommendationType == 'positive')
                                    <p>Based on your inputs, refinancing appears to be financially beneficial. You'll save approximately ${{ number_format($savings, 2) }} over the life of your loan.</p>
                                    <p class="mb-0">Consider applying soon to lock in this rate, as interest rates can change over time.</p>
                                @elseif($recommendationType == 'negative')
                                    <p>Based on your inputs, refinancing may actually cost you more in the long run. You would pay approximately ${{ number_format(abs($savings), 2) }} more in interest over the life of the loan.</p>
                                    <p class="mb-0">Consider negotiating a better rate or exploring other repayment options.</p>
                                @else
                                    <p>The financial difference between your current loan and refinancing is minimal. Consider other factors like customer service, repayment flexibility, and loan forgiveness options.</p>
                                    <p class="mb-0">If the primary goal is to lower monthly payments, refinancing could still be an option, but be aware of the total cost implications.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
    
    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Why Refinance Your Student Loans?</h2>
                <p class="text-muted">Refinancing could offer several benefits depending on your financial situation</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Lower Interest Rate</h3>
                        <p>If your credit score has improved or market rates have dropped since you took out your loan, you might qualify for a lower interest rate, potentially saving thousands over the life of your loan.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3>Reduced Monthly Payment</h3>
                        <p>Extending your loan term or securing a lower interest rate can decrease your monthly payments, freeing up cash for other financial goals or necessities.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>Simplify Repayment</h3>
                        <p>Consolidate multiple loans into a single loan with one monthly payment, one due date, and one lender to deal with, making it easier to manage your debt.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Frequently Asked Questions</h2>
                <p class="text-muted">Common questions about student loan refinancing</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg