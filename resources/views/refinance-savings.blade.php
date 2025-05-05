<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortgage Refinance Calculator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --primary-light: #e9efff;
            --secondary-color: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: #333;
        }
        
        .calculator-container {
            max-width: 860px;
            margin: 3rem auto;
            padding: 0;
        }
        
        .calculator-card {
            border: none;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }
        
        .calculator-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            transform: translateY(-5px);
        }
        
        .calculator-header {
            padding: 2.5rem 2rem 1.5rem;
            background: linear-gradient(120deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border-bottom: none;
        }
        
        .calculator-header h1 {
            font-weight: 700;
            margin-bottom: 0.8rem;
            font-size: 1.8rem;
        }
        
        .calculator-header p {
            opacity: 0.85;
            font-size: 1.05rem;
            font-weight: 300;
        }
        
        .card-body {
            padding: 2.5rem;
            background-color: white;
        }
        
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .input-container {
            position: relative;
            margin-bottom: 0.5rem;
        }
        
        .input-prefix,
        .input-suffix {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
            font-size: 1rem;
            pointer-events: none;
            font-weight: 500;
        }
        
        .input-prefix {
            left: 15px;
        }
        
        .input-suffix {
            right: 15px;
        }
        
        .currency-input {
            padding-left: 35px !important;
        }
        
        .percent-input {
            padding-right: 35px !important;
        }
        
        .form-control {
            height: 50px;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            font-size: 1rem;
            transition: var(--transition);
            color: #333;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
        }
        
        .info-icon {
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
            transition: var(--transition);
            font-size: 0.85rem;
            vertical-align: middle;
        }
        
        .info-icon:hover {
            color: white;
        }
        
        .card-body .info-icon {
            color: var(--secondary-color);
        }
        
        .card-body .info-icon:hover {
            color: var(--primary-dark);
        }
        
        .btn-calculate {
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
            font-weight: 600;
            padding: 0.85rem 2.5rem;
            border-radius: 50px;
            transition: var(--transition);
            border: none;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            min-width: 200px;
            margin-top: 1rem;
        }
        
        .btn-calculate:hover {
            background: linear-gradient(to right, var(--primary-dark), var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-calculate:active {
            transform: translateY(0);
        }
        
        .result-card {
            background: linear-gradient(120deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            color: white;
            padding: 2rem;
            border-radius: var(--border-radius);
            margin-top: 2.5rem;
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.25);
            display: none;
        }
        
        .result-card .result-title {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }
        
        .result-card .savings-value {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .result-card .savings-description {
            font-size: 1.1rem;
            opacity: 0.85;
        }
        
        .result-details {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .result-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.7rem;
        }
        
        .result-label {
            opacity: 0.8;
        }
        
        .result-value {
            font-weight: 500;
        }
        
        .input-group-text {
            background-color: var(--primary-light);
            color: var(--primary-dark);
            font-weight: 500;
            border: 2px solid #e5e7eb;
            border-right: none;
        }
        
        .text-danger {
            margin-top: 0.3rem;
            font-size: 0.85rem;
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            animation-fill-mode: both;
        }
        
        .input-label-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .input-tooltip {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 0.15rem 0.5rem;
            border-radius: 100px;
            font-size: 0.75rem;
            margin-left: 0.5rem;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 767px) {
            .calculator-container {
                margin: 1rem auto;
                padding: 0 1rem;
            }
            
            .calculator-header {
                padding: 2rem 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .btn-calculate {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container calculator-container">
        <div class="calculator-card card">
            <div class="calculator-header">
                <h1>Mortgage Refinance Calculator</h1>
                <p>Discover how much you could save by refinancing your mortgage</p>
            </div>
            <div class="card-body">
                <form id="refinance-form" method="POST" action="{{ route('refinance-savings.calculate') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Current Mortgage Balance
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Your current outstanding mortgage amount">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <span class="input-prefix">$</span>
                                <input type="number" step="0.01" name="current_balance" 
                                       class="form-control currency-input" min="1000"
                                       value="{{ old('current_balance', $inputs['current_balance'] ?? '250000') }}" required>
                            </div>
                            @error('current_balance')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Term Left 
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Number of years left on your current mortgage">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" class="form-control" name="term_left" min="1" max="30"
                                       value="{{ old('term_left', $inputs['term_left'] ?? '25') }}" required>
                                <span class="input-suffix">years</span>
                            </div>
                            @error('term_left')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Current Interest Rate
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Interest rate on your existing mortgage">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" step="0.01" name="current_rate" class="form-control percent-input" min="0"
                                       value="{{ old('current_rate', $inputs['current_rate'] ?? '5.00') }}" required>
                                <span class="input-suffix">%</span>
                            </div>
                            @error('current_rate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                New Interest Rate
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="The new rate you are considering refinancing to">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" step="0.01" name="new_rate" class="form-control percent-input" min="0"
                                       value="{{ old('new_rate', $inputs['new_rate'] ?? '3.75') }}" required>
                                <span class="input-suffix">%</span>
                            </div>
                            @error('new_rate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Refinance Costs 
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Total costs associated with refinancing (closing costs, fees, etc.)">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <span class="input-prefix">$</span>
                                <input type="number" step="0.01" name="refinance_costs" 
                                       class="form-control currency-input" min="0"
                                       value="{{ old('refinance_costs', $inputs['refinance_costs'] ?? '3000') }}">
                            </div>
                            @error('refinance_costs')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                New Loan Term
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Length of the new refinanced mortgage">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" class="form-control" name="new_term" min="1" max="30"
                                       value="{{ old('new_term', $inputs['new_term'] ?? '30') }}">
                                <span class="input-suffix">years</span>
                            </div>
                            @error('new_term')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-calculate">
                            <i class="bi bi-calculator me-2"></i> Calculate Savings
                        </button>
                    </div>
                </form>

                <!-- Results Card (will be displayed after calculation) -->
                <div class="result-card fade-in-up" id="results" style="display: block;">
                    <div class="result-title">Your Potential Savings</div>
                    <div class="savings-value">$48,350</div>
                    <div class="savings-description">Total savings over the life of your mortgage</div>
                    
                    <div class="result-details">
                        <div class="result-row">
                            <span class="result-label">Current Monthly Payment:</span>
                            <span class="result-value">$1,442</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">New Monthly Payment:</span>
                            <span class="result-value">$1,158</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Monthly Savings:</span>
                            <span class="result-value">$284</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Break-even Point:</span>
                            <span class="result-value">11 months</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // For demo purposes - hide the results card initially
            document.getElementById('results').style.display = 'none';
            
            // Show results on form submission (for demo)
            document.getElementById('refinance-form').addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('results').style.display = 'block';
            });
        });
    </script>
</body>
</html>