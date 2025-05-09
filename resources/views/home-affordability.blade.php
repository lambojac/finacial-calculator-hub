<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Affordability Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #8338ec;
            --accent-color: #ff006e;
            --success-color: #38b000;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            color: var(--dark-color);
        }
        
        .app-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .header-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #2b75e0;
            border-color: #2b75e0;
        }
        
        .btn-info {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }
        
        .btn-info:hover {
            background-color: #7029d8;
            border-color: #7029d8;
            color: white;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .input-group-text {
            background-color: var(--primary-color);
            color: white;
            border: 1px solid var(--primary-color);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(58, 134, 255, 0.25);
        }
        
        .result-card {
            border-top: 4px solid var(--success-color);
        }
        
        .result-highlight {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--success-color);
        }
        
        .info-tooltip {
            color: var(--secondary-color);
            cursor: pointer;
        }
        
        .feature-icon {
            background-color: rgba(58, 134, 255, 0.1);
            color: var(--primary-color);
            padding: 1rem;
            border-radius: 50%;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .slider-container {
            padding: 0 10px;
        }
        
        .range-slider {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 4px;  
            background: #d7dcdf;
            outline: none;
        }
        
        .range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary-color);
            cursor: pointer;
            transition: background .3s;
        }
        
        .range-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary-color);
            cursor: pointer;
            transition: background .3s;
            border: none;
        }
        
        .range-slider::-webkit-slider-thumb:hover {
            background: var(--secondary-color);
        }
        
        .info-card {
            border-left: 4px solid var(--primary-color);
        }
        
        .progress {
            height: 10px;
            border-radius: 5px;
        }
        
        .progress-bar {
            background-color: var(--success-color);
        }
        
        .footer {
            margin-top: 3rem;
            padding: 2rem 0;
            background-color: var(--dark-color);
            color: var(--light-color);
        }
        
        .gauge-container {
            position: relative;
            width: 200px;
            height: 100px;
            margin: 0 auto;
            overflow: hidden;
        }
        
        .gauge {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 15px solid #e9ecef;
            border-top-color: var(--success-color);
            transform-origin: center;
            transform: rotate(0deg);
            transition: transform 1s ease-out;
        }
        
        .gauge-center {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            border-radius: 50%;
            clip-path: polygon(0 100%, 100% 100%, 100% 50%, 0 50%);
        }
        
        .gauge-value {
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--success-color);
        }
        
        .house-size-indicator {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
        }
        
        .house-icon {
            font-size: 1.2rem;
            color: var(--dark-color);
        }
        
        .house-icon.large {
            font-size: 2.5rem;
            color: var(--success-color);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 1.5rem;
            }
            
            .result-highlight {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="page-header">
        <div class="header-content">
            <h1 class="fw-bold">Home Affordability Calculator</h1>
            <p class="lead mb-0">Find out how much house you can afford based on your financial situation</p>
        </div>
    </header>

    <div class="container app-container py-4">
        <!-- Introduction Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="mb-3">What Can You Afford?</h4>
                        <p class="mb-0">Our calculator helps you determine a realistic home budget based on your income, existing debts, down payment, and current mortgage rates. Enter your details below to find your personalized affordability estimate.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-info mt-3 mt-md-0" data-bs-toggle="modal" data-bs-target="#explainerModal">
                            <i class="fas fa-info-circle me-2"></i>How This Calculator Works
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Form Card -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Financial Information</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('home.affordability.calculate') }}" id="calculatorForm">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label d-flex justify-content-between">
                                    Annual Income
                                    <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Your total yearly income before taxes"></i>
                                </label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="1000" name="income" id="income" class="form-control" required value="{{ old('income', $income ?? 75000) }}">
                                </div>
                                <div class="slider-container">
                                    <input type="range" class="range-slider" min="20000" max="500000" step="5000" id="income_slider">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label d-flex justify-content-between">
                                    Monthly Debts
                                    <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Total monthly payments for credit cards, car loans, student loans, etc."></i>
                                </label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="50" name="debts" id="debts" class="form-control" required value="{{ old('debts', $debts ?? 1000) }}">
                                </div>
                                <div class="slider-container">
                                    <input type="range" class="range-slider" min="0" max="10000" step="100" id="debts_slider">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label d-flex justify-content-between">
                                    Down Payment
                                    <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="The amount you plan to pay upfront"></i>
                                </label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="1000" name="down_payment" id="down_payment" class="form-control" required value="{{ old('down_payment', $down_payment ?? 50000) }}">
                                </div>
                                <div class="slider-container">
                                    <input type="range" class="range-slider" min="0" max="300000" step="5000" id="down_payment_slider">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label d-flex justify-content-between">
                                    Mortgage Interest Rate
                                    <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Current annual interest rate for mortgages"></i>
                                </label>
                                <div class="input-group mb-1">
                                    <input type="number" step="0.125" name="rate" id="rate" class="form-control" required value="{{ old('rate', $rate ?? 5.5) }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                <div class="slider-container">
                                    <input type="range" class="range-slider" min="2" max="10" step="0.125" id="rate_slider">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Mortgage Term</label>
                                <select class="form-select" name="term" id="term">
                                    <option value="30" selected>30-Year Fixed</option>
                                    <option value="20">20-Year Fixed</option>
                                    <option value="15">15-Year Fixed</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Property Tax Rate</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="property_tax" id="property_tax" class="form-control" value="{{ old('property_tax', $property_tax ?? 1.2) }}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-search-dollar me-2"></i>Calculate Affordability
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Additional Information Card -->
                <div class="card mt-4 info-card">
                    <div class="card-body">
                        <h5 class="mb-3">Financial Rule of Thumb</h5>
                        <p>Our calculator uses the 28/36 rule, a common guideline in the mortgage industry:</p>
                        <ul class="mb-0">
                            <li>Your housing costs should be less than <strong>28%</strong> of your gross monthly income</li>
                            <li>Your total debt payments should be less than <strong>36%</strong> of your gross monthly income</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Results Card -->
            <div class="col-lg-6">
                <div class="card result-card">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="fas fa-home me-2"></i>Your Affordability Results</h5>
                    </div>
                    <div class="card-body">
                        @isset($maxHomePrice)
                            <div class="text-center mb-4">
                                <h4 class="mb-3">Based on your inputs, you can afford:</h4>
                                <div class="result-highlight mb-3">${{ number_format($maxHomePrice, 0) }}</div>
                                
                                <!-- DTI Ratio Visualization -->
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <h6 class="text-center mb-2">Front-End DTI</h6>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="small text-center">28% of your income for housing</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-center mb-2">Back-End DTI</h6>
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 36%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="small text-center">36% of your income for all debts</p>
                                    </div>
                                </div>
                                
                                <!-- Monthly Payment Breakdown -->
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="mb-3">Estimated Monthly Payment</h5>
                                        <div class="row">
                                            <div class="col-7 text-start">Principal & Interest:</div>
                                            <div class="col-5 text-end">${{ number_format(($maxHomePrice - $down_payment) * ($rate/100/12) / (1 - pow(1 + ($rate/100/12), -360)), 2) }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7 text-start">Property Taxes:</div>
                                            <div class="col-5 text-end">${{ number_format($maxHomePrice * ($property_tax ?? 1.2)/100/12, 2) }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7 text-start">Insurance (est.):</div>
                                            <div class="col-5 text-end">${{ number_format($maxHomePrice * 0.0035/12, 2) }}</div>
                                        </div>
                                        <hr>
                                        <div class="row fw-bold">
                                            <div class="col-7 text-start">Total Monthly Payment:</div>
                                            <div class="col-5 text-end">${{ number_format(($maxHomePrice - $down_payment) * ($rate/100/12) / (1 - pow(1 + ($rate/100/12), -360)) + $maxHomePrice * ($property_tax ?? 1.2)/100/12 + $maxHomePrice * 0.0035/12, 2) }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Home Size Visualization -->
                                <div class="mt-4">
                                    <h5 class="mb-3">What This Might Buy</h5>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                @if($maxHomePrice < 200000)
                                                    <i class="fas fa-home fa-3x text-muted"></i>
                                                    <p class="mt-2">Smaller home, condo, or townhouse in most markets</p>
                                                @elseif($maxHomePrice < 400000)
                                                    <i class="fas fa-home fa-4x text-primary"></i>
                                                    <p class="mt-2">Medium-sized home in many markets</p>
                                                @elseif($maxHomePrice < 750000)
                                                    <i class="fas fa-home fa-5x text-success"></i>
                                                    <p class="mt-2">Larger home in many markets or average home in high-cost areas</p>
                                                @else
                                                    <i class="fas fa-home fa-5x text-success"></i>
                                                    <p class="mt-2">Luxury home in most markets or standard home in premium areas</p>
                                                @endif
                                            </div>
                                            <p class="small text-center text-muted mb-0">*Home prices vary significantly by location. Consult with a local real estate agent for specific market information.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="fas fa-search-dollar" style="font-size: 3rem; color: var(--primary-color);"></i>
                                </div>
                                <h4>Enter your financial details</h4>
                                <p class="text-muted">Fill out the form and click "Calculate Affordability" to see your personalized home buying budget.</p>
                            </div>
                        @endisset
                        
                        <!-- Recommendations -->
                        <div class="mt-4">
                            <h5 class="mb-3">Next Steps</h5>
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <p class="mb-0"><strong>Get pre-approved</strong>: Speak with a mortgage lender to get an official pre-approval letter.</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <p class="mb-0"><strong>Find a real estate agent</strong>: A good agent can help you navigate the market and find homes within your budget.</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <p class="mb-0"><strong>Consider additional costs</strong>: Remember to budget for closing costs, moving expenses, and home maintenance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Features Section -->
        <div class="row mt-5">
            <div class="col-12 text-center mb-4">
                <h3>Home Buying Considerations</h3>
                <p class="text-muted">Beyond affordability, keep these factors in mind</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5>Location</h5>
                        <p class="text-muted">Consider neighborhood quality, school districts, commute times, and proximity to amenities when buying a home.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h5>Hidden Costs</h5>
                        <p class="text-muted">Budget for closing costs (3-6% of loan amount), home maintenance (1-3% of home value annually), and moving expenses.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>Emergency Fund</h5>
                        <p class="text-muted">Maintain 3-6 months of expenses in savings even after your down payment to handle unexpected repairs or financial setbacks.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="explainerModalLabel">How This Calculator Works</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-3">Our Methodology</h5>
                    <p>This calculator uses the 28/36 debt-to-income ratio rule that most lenders follow to determine mortgage affordability:</p>
                    
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Front-End Ratio (28%)</h6>
                        </div>
                        <div class="card-body">
                            <p>Your monthly housing costs (mortgage payment, property taxes, insurance) should not exceed 28% of your monthly gross income.</p>
                            <div class="small text-muted">Example: If you earn $6,000/month, your housing costs should be under $1,680/month.</div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Back-End Ratio (36%)</h6>
                        </div>
                        <div class="card-body">
                            <p>Your total debt payments (housing costs plus other debts like car loans, credit cards, student loans) should not exceed 36% of your monthly gross income.</p>
                            <div class="small text-muted">Example: If you earn $6,000/month, your total debt payments should be under $2,160/month.</div>
                        </div>
                    </div>
                    
                    <h5 class="mb-3">What We Include In Our Calculations</h5>
                    <ul>
                        <li><strong>Principal and interest</strong> based on your loan amount and interest rate</li>
                        <li><strong>Property taxes</strong> (estimated based on home value and average rates)</li> 
                        <li><strong>Homeowners insurance</strong> (estimated based on home value)</li>
                        <li><strong>Existing debt obligations</strong> that you enter</li>
                        <li><strong>Down payment amount</strong> that reduces your loan size</li>
                    </ul>
                    
                    <div class="alert alert-info">
                        <h6>Important Note</h6>
                        <p class="mb-0">This calculator provides estimates for educational purposes. Actual loan approval depends on additional factors including credit score, employment history, and lender-specific criteria. Always consult with a mortgage professional for personalized advice.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <p>© 2025 Home Affordability Calculator | All Rights Reserved</p>
                <p class="small mb-0">This calculator provides estimates for educational purposes only and should not be considered financial advice.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Connect sliders to inputs
            connectSliderToInput('income_slider', 'income');
            connectSliderToInput('debts_slider', 'debts');
            connectSliderToInput('down_payment_slider', 'down_payment');
            connectSliderToInput('rate_slider', 'rate');
        });
        
        function connectSliderToInput(sliderId, inputId) {
            const slider = document.getElementById(sliderId);
            const input = document.getElementById(inputId);
            
            if (slider && input) {
                // Set slider initial value
                slider.value = input.value;
                
                // Update input when slider changes
                slider.addEventListener('input', function() {
                    input.value = this.value;
                });
                
                // Update slider when input changes
                input.addEventListener('input', function() {
                    slider.value = this.value;
                });
            }
        }
        
        // Format currency inputs
        function formatCurrency(input) {
            let value = input.value.replace(/[^\d.]/g, '');
            if (value) {
                value = parseFloat(value).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
                input.value = value.replace('$', '');
            }
        }
    </script>
</body>
</html>