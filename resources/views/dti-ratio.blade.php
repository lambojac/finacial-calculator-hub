<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Health Tool - Debt-to-Income Ratio Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .header-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        
        .calculator-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .info-card {
            border-left: 4px solid var(--secondary-color);
            background-color: rgba(52, 152, 219, 0.1);
            padding: 1rem;
            border-radius: 0 5px 5px 0;
            margin-bottom: 1.5rem;
        }
        
        .btn-custom-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        
        .btn-custom-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-info-custom {
            background-color: transparent;
            border: 1px solid var(--secondary-color);
            color: var(--secondary-color);
            padding: 0.5rem 1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        
        .btn-info-custom:hover {
            background-color: rgba(52, 152, 219, 0.1);
            border-color: var(--secondary-color);
            color: var(--secondary-color);
        }
        
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 7px;
            border: 1px solid #dce4ec;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .input-group-text {
            background-color: var(--secondary-color);
            color: white;
            border: none;
        }
        
        .results-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .results-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1rem;
        }
        
        .results-body {
            padding: 1.5rem;
        }
        
        .dti-meter {
            height: 10px;
            border-radius: 5px;
            background-color: #e0e0e0;
            margin: 1rem 0;
            overflow: hidden;
        }
        
        .dti-level {
            height: 100%;
            transition: width 1s ease-in-out;
        }
        
        .footer-section {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            border-radius: 15px 15px 0 0;
            margin-top: 3rem;
        }
        
        .card-header-custom {
            background-color: rgba(52, 152, 219, 0.1);
            border-bottom: 1px solid rgba(52, 152, 219, 0.2);
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .explanation-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        
        .status-excellent {
            color: #2ecc71;
        }
        
        .status-good {
            color: #3498db;
        }
        
        .status-fair {
            color: #f39c12;
        }
        
        .status-concerning {
            color: #e74c3c;
        }
        
        .rating-stars {
            color: #f1c40f;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">Debt-to-Income Ratio Calculator</h1>
                    <p class="lead">Assess your financial health and borrowing capacity with our professional DTI calculator</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <img src="/api/placeholder/400/200" alt="Financial health illustration" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Main Content -->
        <div class="row">
            <!-- Left Column - Calculator -->
            <div class="col-lg-7">
                <div class="calculator-section">
                    <div class="info-card mb-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-info-circle fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Why Calculate Your DTI?</h5>
                                <p class="mb-0">Your debt-to-income ratio is a key financial metric that lenders use to determine your creditworthiness and ability to manage monthly payments.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Calculator Form -->
                    <form method="POST" action="{{ route('dti.calculate') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">Monthly Debt Payments</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" name="monthly_debt" step="0.01" class="form-control" required value="{{ old('monthly_debt', $monthlyDebt ?? '') }}" placeholder="Enter your total monthly debt payments">
                            </div>
                            <small class="text-muted">Include credit card payments, auto loans, student loans, etc.</small>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Gross Monthly Income</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" name="gross_income" step="0.01" class="form-control" required value="{{ old('gross_income', $grossIncome ?? '') }}" placeholder="Enter your pre-tax monthly income">
                            </div>
                            <small class="text-muted">Your total income before taxes and other deductions</small>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom-primary">
                                <i class="fas fa-calculator me-2"></i>Calculate My DTI Ratio
                            </button>
                        </div>
                    </form>

                    <!-- Information Modal Button -->
                    <div class="text-center mt-4">
                        <button class="btn btn-info-custom" data-bs-toggle="modal" data-bs-target="#infoModal">
                            <i class="fas fa-question-circle me-2"></i>Learn more about DTI calculations
                        </button>
                    </div>

                    <!-- Errors Display -->
                    @if ($errors->any())
                        <div class="alert alert-danger mt-4">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Please check the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column - Results and Info -->
            <div class="col-lg-5">
                <!-- Results Section (only shown when results exist) -->
                @isset($dti)
                <div class="results-card mb-4">
                    <div class="results-header">
                        <h4 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Your DTI Results</h4>
                    </div>
                    <div class="results-body">
                        <div class="text-center mb-3">
                            <h2 class="display-4 fw-bold">{{ $dti }}%</h2>
                            <p class="lead">Debt-to-Income Ratio</p>
                        </div>
                        
                        <div class="dti-meter">
                            <div class="dti-level bg-{{ $dti < 36 ? 'success' : ($dti < 43 ? 'warning' : 'danger') }}" style="width: {{ min($dti, 100) }}%;"></div>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="small">0%</span>
                            <span class="small text-success">35%</span>
                            <span class="small text-warning">43%</span>
                            <span class="small text-danger">50%+</span>
                        </div>
                        
                        <div class="mb-3">
                            <h5>Your Status: 
                                <span class="{{ $status === 'Pass' ? 'status-excellent' : 'status-concerning' }}">
                                    {{ $status }}
                                </span>
                            </h5>
                            
                            <div class="rating-stars mb-2">
                                @if($dti < 28)
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="ms-2 status-excellent">Excellent</span>
                                @elseif($dti < 36)
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                    <span class="ms-2 status-good">Good</span>
                                @elseif($dti < 43)
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    <span class="ms-2 status-fair">Fair</span>
                                @else
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    <span class="ms-2 status-concerning">Needs Improvement</span>
                                @endif
                            </div>
                        </div>
                        
                        <p class="mb-1"><strong>What this means:</strong></p>
                        <p>
                            @if($dti < 28)
                                Your DTI ratio is excellent. You're in a strong position for most loan approvals.
                            @elseif($dti < 36)
                                Your DTI ratio is good. Most lenders will consider you a qualified borrower.
                            @elseif($dti < 43)
                                Your DTI ratio is fair. You may qualify for many loans, but consider reducing your debt.
                            @else
                                Your DTI ratio is higher than recommended. You may face challenges with loan approvals.
                            @endif
                        </p>
                    </div>
                </div>
                @endisset

                <!-- Information Card (Always shown) -->
                <div class="explanation-card">
                    <div class="card-header-custom py-3">
                        <h5 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Understanding DTI Ratio</h5>
                    </div>
                    <div class="card-body">
                        <p>Debt-to-Income (DTI) ratio is calculated by dividing your total monthly debt payments by your gross monthly income, then multiplying by 100 to get a percentage.</p>
                        
                        <div class="alert alert-primary">
                            <strong>Formula:</strong> (Monthly Debt / Monthly Income) × 100 = DTI%
                        </div>
                        
                        <h6 class="fw-bold">DTI Guidelines:</h6>
                        <ul>
                            <li><span class="status-excellent fw-bold">Below 28%</span> - Excellent position for loan approval</li>
                            <li><span class="status-good fw-bold">28-35%</span> - Good standing with most lenders</li>
                            <li><span class="status-fair fw-bold">36-43%</span> - Maximum for most qualified mortgages</li>
                            <li><span class="status-concerning fw-bold">Above 43%</span> - May face challenges with loan approvals</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information Section -->
        <div class="row mt-4">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center">Why Your DTI Ratio Matters</h3>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-home"></i>
                        </div>
                        <h5 class="card-title">Mortgage Approval</h5>
                        <p class="card-text">Most mortgage lenders prefer a DTI ratio of 43% or less to qualify for a conventional mortgage.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h5 class="card-title">Credit Applications</h5>
                        <p class="card-text">Lenders use your DTI to assess your ability to take on additional debt when applying for loans and credit cards.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <h5 class="card-title">Financial Health</h5>
                        <p class="card-text">A low DTI indicates better financial health and more flexibility to handle unforeseen expenses.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>About This Calculator</h5>
                    <p>This professional DTI calculator helps you understand your current financial position and borrowing capacity. Please note that while this calculator provides a good estimate, lending criteria may vary between financial institutions.</p>
                </div>
                <div class="col-md-3">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Financial Planning</a></li>
                        <li><a href="#" class="text-white">Debt Management</a></li>
                        <li><a href="#" class="text-white">Credit Score Tips</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Terms of Use</a></li>
                        <li><a href="#" class="text-white">Disclaimer</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4" style="background-color: rgba(255,255,255,0.2);">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2025 Financial Health Tools. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Info Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="infoModalLabel"><i class="fas fa-info-circle me-2"></i>About This Calculator</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="fw-bold">What is a Debt-to-Income (DTI) Ratio?</h5>
                    <p>Your DTI ratio is a personal finance measure that compares your total monthly debt payment obligations to your monthly gross income. This ratio is one way lenders assess your borrowing risk.</p>
                    
                    <h5 class="fw-bold mt-4">How We Calculate Your DTI</h5>
                    <p>We use this formula: <code>(Total Monthly Debt Payments ÷ Gross Monthly Income) × 100 = DTI%</code></p>
                    
                    <div class="alert alert-light border mt-3">
                        <h6 class="fw-bold">What to Include in Monthly Debts:</h6>
                        <ul>
                            <li>Mortgage or rent payments</li>
                            <li>Car loan payments</li>
                            <li>Student loan payments</li>
                            <li>Credit card minimum payments</li>
                            <li>Personal loan payments</li>
                            <li>Child support or alimony</li>
                            <li>Other recurring debt obligations</li>
                        </ul>
                        
                        <h6 class="fw-bold mt-3">What NOT to Include:</h6>
                        <ul>
                            <li>Utilities (electric, water, internet)</li>
                            <li>Cell phone bills</li>
                            <li>Insurance premiums</li>
                            <li>Groceries and other living expenses</li>
                            <li>Entertainment and discretionary spending</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Animate DTI meter on load if results exist
            const dtiLevel = document.querySelector('.dti-level');
            if (dtiLevel) {
                // Start with width 0 and animate to actual value
                dtiLevel.style.width = '0%';
                setTimeout(() => {
                    dtiLevel.style.width = dtiLevel.getAttribute('style').replace('width: 0%', '');
                }, 300);
            }
            
            // Validation for number inputs
            const numberInputs = document.querySelectorAll('input[type="number"]');
            numberInputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value < 0) {
                        this.value = 0;
                    }
                });
            });
        });
    </script>
</body>
</html>