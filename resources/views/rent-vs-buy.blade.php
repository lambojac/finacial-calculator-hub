<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent vs Buy Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #8338ec;
            --accent-color: #ff006e;
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
        
        .calculator-tabs .nav-link {
            color: var(--dark-color);
            border-radius: 8px 8px 0 0;
            padding: 12px 16px;
        }
        
        .calculator-tabs .nav-link.active {
            background-color: white;
            color: var(--primary-color);
            font-weight: 500;
            border-top: 3px solid var(--primary-color);
            border-bottom: none;
        }
        
        .result-card {
            border-top: 4px solid var(--primary-color);
        }
        
        .result-highlight {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        .savings-positive {
            color: #198754;
        }
        
        .savings-negative {
            color: #dc3545;
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
        
        .footer {
            margin-top: 3rem;
            padding: 2rem 0;
            background-color: var(--dark-color);
            color: var(--light-color);
        }
        
        /* Chart Styling */
        .bar-chart {
            display: flex;
            align-items: flex-end;
            height: 250px;
            margin-top: 2rem;
        }
        
        .bar {
            flex: 1;
            margin: 0 15px;
            position: relative;
            text-align: center;
        }
        
        .bar-inner {
            width: 100%;
            background-color: var(--primary-color);
            border-radius: 6px 6px 0 0;
            position: relative;
            transition: height 0.5s ease;
        }
        
        .bar:nth-child(2) .bar-inner {
            background-color: var(--secondary-color);
        }
        
        .bar-label {
            position: absolute;
            bottom: -30px;
            left: 0;
            right: 0;
            text-align: center;
            font-weight: 500;
        }
        
        .bar-value {
            position: absolute;
            top: -30px;
            left: 0;
            right: 0;
            text-align: center;
            font-weight: 500;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 1.5rem;
            }
            
            .result-highlight {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="page-header">
        <div class="header-content">
            <h1 class="fw-bold">Rent vs Buy Calculator</h1>
            <p class="lead mb-0">Make an informed decision about your next home</p>
        </div>
    </header>

    <div class="container app-container py-4">
        <!-- Introduction Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="mb-3">Should You Rent or Buy?</h4>
                        <p class="mb-0">This calculator helps you compare the financial impact of renting versus buying a home over your chosen time period. Enter your details below to see which option could be more cost-effective for your situation.</p>
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
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Calculator Inputs</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rentvsbuy.calculate') }}" id="calculatorForm">
                            @csrf
                            <div class="row">
                                <!-- Rent Inputs -->
                                <div class="col-md-6">
                                    <h6 class="text-primary mb-3">Rental Details</h6>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            Monthly Rent
                                            <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Your current or expected monthly rent payment"></i>
                                        </label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01" name="monthly_rent" id="monthly_rent" class="form-control" required value="{{ old('monthly_rent', $monthly_rent ?? 2000) }}">
                                        </div>
                                        <div class="slider-container">
                                            <input type="range" class="range-slider" min="500" max="10000" step="50" id="rent_slider">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            Annual Rent Increase (%)
                                            <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Expected yearly percentage increase in rent"></i>
                                        </label>
                                        <div class="input-group">
                                            <input type="number" step="0.1" name="rent_increase" id="rent_increase" class="form-control" value="{{ old('rent_increase', $rent_increase ?? 3) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Buy Inputs -->
                                <div class="col-md-6">
                                    <h6 class="text-primary mb-3">Purchase Details</h6>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            Home Price
                                            <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="The purchase price of the home you're considering"></i>
                                        </label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="1000" name="home_price" id="home_price" class="form-control" required value="{{ old('home_price', $home_price ?? 400000) }}">
                                        </div>
                                        <div class="slider-container">
                                            <input type="range" class="range-slider" min="100000" max="2000000" step="10000" id="price_slider">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            Down Payment (%)
                                            <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Percentage of home price you'll pay upfront"></i>
                                        </label>
                                        <div class="input-group">
                                            <input type="number" step="1" name="down_payment" id="down_payment" class="form-control" value="{{ old('down_payment', $down_payment ?? 20) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="row">
                                <!-- Mortgage Details -->
                                <div class="col-md-6">
                                    <h6 class="text-primary mb-3">Mortgage Details</h6>
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            Mortgage Rate
                                            <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Annual interest rate for your mortgage"></i>
                                        </label>
                                        <div class="input-group mb-1">
                                            <input type="number" step="0.01" name="rate" id="rate" class="form-control" required value="{{ old('rate', $rate ?? 5.5) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <div class="slider-container">
                                            <input type="range" class="range-slider" min="2" max="10" step="0.125" id="rate_slider">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mortgage Term (years)</label>
                                        <select name="mortgage_term" id="mortgage_term" class="form-select">
                                            <option value="15">15 years</option>
                                            <option value="20">20 years</option>
                                            <option value="30" selected>30 years</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Additional Costs -->
                                <div class="col-md-6">
                                    <h6 class="text-primary mb-3">Additional Costs</h6>
                                    <div class="mb-3">
                                        <label class="form-label">Property Tax Rate (%)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" name="property_tax" id="property_tax" class="form-control" value="{{ old('property_tax', $property_tax ?? 1.2) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Annual Maintenance (%)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.1" name="maintenance" id="maintenance" class="form-control" value="{{ old('maintenance', $maintenance ?? 1) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label d-flex justify-content-between">
                                            Comparison Period
                                            <i class="fas fa-question-circle info-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Number of years to compare the costs"></i>
                                        </label>
                                        <div class="input-group mb-1">
                                            <input type="number" name="years" id="years" class="form-control" required value="{{ old('years', $years ?? 5) }}">
                                            <span class="input-group-text">years</span>
                                        </div>
                                        <div class="slider-container">
                                            <input type="range" class="range-slider" min="1" max="30" step="1" id="years_slider">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Home Value Appreciation (%)</label>
                                        <div class="input-group">
                                            <input type="number" step="0.1" name="appreciation" id="appreciation" class="form-control" value="{{ old('appreciation', $appreciation ?? 3) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-calculator me-2"></i>Calculate Comparison
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Results Card -->
            <div class="col-lg-5">
                <div class="card result-card">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Results Comparison</h5>
                    </div>
                    <div class="card-body">
                        @isset($difference)
                            <div class="text-center mb-4">
                                <h3 class="mb-3">{{ $years }}-Year Cost Comparison</h3>
                                
                                <!-- Visual Chart -->
                                <div class="bar-chart">
                                    <div class="bar">
                                        <div class="bar-value">${{ number_format($totalRent, 0) }}</div>
                                        <div class="bar-inner" id="rent-bar" style="height: 60%;"></div>
                                        <div class="bar-label">Renting</div>
                                    </div>
                                    <div class="bar">
                                        <div class="bar-value">${{ number_format($totalBuy, 0) }}</div>
                                        <div class="bar-inner" id="buy-bar" style="height: 80%;"></div>
                                        <div class="bar-label">Buying</div>
                                    </div>
                                </div>
                                
                                <div class="mt-5">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="card h-100">
                                                <div class="card-body text-center">
                                                    <h6 class="text-muted mb-2">Total Rent Cost</h6>
                                                    <div class="result-highlight">${{ number_format($totalRent, 0) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card h-100">
                                                <div class="card-body text-center">
                                                    <h6 class="text-muted mb-2">Total Buy Cost</h6>
                                                    <div class="result-highlight">${{ number_format($totalBuy, 0) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card mt-4">
                                        <div class="card-body text-center">
                                            <h5 class="mb-2">Bottom Line</h5>
                                            @if($difference > 0)
                                                <p class="result-highlight savings-positive">
                                                    <i class="fas fa-arrow-circle-down me-2"></i> 
                                                    Renting saves you ${{ number_format($difference, 0) }}
                                                </p>
                                                <p class="text-muted">That's ${{ number_format($difference / $years / 12, 0) }} per month</p>
                                            @else
                                                <p class="result-highlight savings-positive">
                                                    <i class="fas fa-arrow-circle-down me-2"></i> 
                                                    Buying saves you ${{ number_format(abs($difference), 0) }}
                                                </p>
                                                <p class="text-muted">That's ${{ number_format(abs($difference) / $years / 12, 0) }} per month</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="fas fa-home" style="font-size: 3rem; color: var(--primary-color);"></i>
                                </div>
                                <h4>Enter your details</h4>
                                <p class="text-muted">Fill out the form and click "Calculate Comparison" to see your personalized results.</p>
                            </div>
                        @endisset
                        
                        <!-- Recommendations -->
                        <div class="mt-4">
                            <h5 class="mb-3">Points to Consider</h5>
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div>
                                    <p class="mb-0"><strong>Financial flexibility</strong>: Renting typically requires less upfront investment and makes it easier to relocate.</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-piggy-bank"></i>
                                </div>
                                <div>
                                    <p class="mb-0"><strong>Building equity</strong>: Buying allows you to build wealth as you pay down your mortgage.</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div>
                                    <p class="mb-0"><strong>Maintenance responsibilities</strong>: Homeowners are responsible for repairs and upkeep costs.</p>
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
                <h3>Why Use Our Calculator?</h3>
                <p class="text-muted">Make informed decisions with comprehensive analysis</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5>Detailed Analysis</h5>
                        <p class="text-muted">Our calculator considers all major costs including mortgage, property taxes, maintenance, and rent increases.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <h5>Customizable Options</h5>
                        <p class="text-muted">Adjust parameters to match your specific situation and see how different scenarios affect your bottom line.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h5>Clear Recommendations</h5>
                        <p class="text-muted">Get straightforward insights about which option makes the most financial sense for your situation.</p>
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
                    <h5 class="mb-3">What We Calculate</h5>
                    <p>This calculator provides a comprehensive comparison between the costs of renting versus buying a home over your specified time period. Here's what we consider:</p>
                    
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Renting Costs</h6>
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>Monthly rent payments</li>
                                <li>Annual rent increases</li>
                                <li>Renter's insurance (estimated)</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Buying Costs</h6>
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>Down payment</li>
                                <li>Monthly mortgage payments (principal and interest)</li>
                                <li>Property taxes</li>
                                <li>Homeowner's insurance (estimated)</li>
                                <li>Maintenance and repair costs</li>
                                <li>Closing costs when buying</li>
                                <li>Home value appreciation</li>
                            </ul>
                        </div>
                    </div>
                    
                    <h5 class="mb-3">Important Considerations</h5>
                    <p>This calculator provides a financial comparison, but remember that the rent vs. buy decision involves many personal factors:</p>
                    <ul>
                        <li>How long you plan to stay in the area</li>
                        <li>Your desire for stability vs. flexibility</li>
                        <li>Your comfort with home maintenance responsibilities</li>
                        <li>Local market conditions</li>
                        <li>Your personal financial situation</li>
                    </ul>
                    
                    <p class="mb-0">Use this calculator as one tool in your decision-making process, alongside advice from financial and real estate professionals.</p>
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
                <p>© 2025 Rent vs Buy Calculator | All Rights Reserved</p>
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
            connectSliderToInput('rent_slider', 'monthly_rent');
            connectSliderToInput('price_slider', 'home_price');
            connectSliderToInput('rate_slider', 'rate');
            connectSliderToInput('years_slider', 'years');
            
            // Set up the bar chart if results exist
            setupBarChart();
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
        
       