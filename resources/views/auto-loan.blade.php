<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Loan Calculator</title>
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
        
        .text-danger {
            margin-top: 0.3rem;
            font-size: 0.85rem;
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            animation-fill-mode: both;
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
                <h1>Auto Loan Calculator</h1>
                <p>Calculate your monthly payments and total interest for your car loan</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('auto-loan.calculate') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Car Price
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="The total price of the vehicle you wish to purchase">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <span class="input-prefix">$</span>
                                <input type="number" name="car_price" step="0.01" class="form-control currency-input" 
                                      value="{{ old('car_price', $inputs['car_price'] ?? '25000') }}" required>
                            </div>
                            @error('car_price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Down Payment
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="The amount you plan to pay upfront">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <span class="input-prefix">$</span>
                                <input type="number" name="down_payment" step="0.01" class="form-control currency-input" 
                                       value="{{ old('down_payment', $inputs['down_payment'] ?? '5000') }}" required>
                            </div>
                            @error('down_payment')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Interest Rate
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Annual interest rate for your auto loan">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" name="interest_rate" step="0.01" class="form-control percent-input" 
                                       value="{{ old('interest_rate', $inputs['interest_rate'] ?? '4.5') }}" required>
                                <span class="input-suffix">%</span>
                            </div>
                            @error('interest_rate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Loan Term
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Duration of the loan in months">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" name="term" class="form-control" 
                                       value="{{ old('term', $inputs['term'] ?? '60') }}" required>
                                <span class="input-suffix">months</span>
                            </div>
                            @error('term')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                State Tax
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="State sales tax percentage applied to your vehicle purchase">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <input type="number" name="state_tax" step="0.01" class="form-control percent-input" 
                                       value="{{ old('state_tax', $inputs['state_tax'] ?? '6') }}" required>
                                <span class="input-suffix">%</span>
                            </div>
                            @error('state_tax')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label d-flex align-items-center">
                                Additional Fees
                                <span class="ms-2 info-icon" data-bs-toggle="tooltip" 
                                      title="Registration, documentation, or other fees">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            </label>
                            <div class="input-container">
                                <span class="input-prefix">$</span>
                                <input type="number" name="additional_fees" step="0.01" class="form-control currency-input" 
                                       value="{{ old('additional_fees', $inputs['additional_fees'] ?? '300') }}">
                            </div>
                            @error('additional_fees')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-calculate">
                            <i class="bi bi-calculator me-2"></i> Calculate Payment
                        </button>
                    </div>
                </form>

                @if (isset($monthly_payment))
                <div class="result-card fade-in-up mt-4">
                    <div class="result-title">Loan Calculation Results</div>
                    <div class="savings-value">${{ number_format($monthly_payment, 2) }}</div>
                    <div class="savings-description">Monthly Payment</div>
                    
                    <div class="result-details">
                        <div class="result-row">
                            <span class="result-label">Loan Amount:</span>
                            <span class="result-value">${{ number_format($loan_amount ?? (($car_price ?? 25000) + (($car_price ?? 25000) * ($state_tax ?? 6) / 100) - ($down_payment ?? 5000)), 2) }}</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Total Interest:</span>
                            <span class="result-value">${{ number_format($total_interest, 2) }}</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Total Cost:</span>
                            <span class="result-value">${{ number_format(($monthly_payment * ($term ?? 60)), 2) }}</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Sales Tax Amount:</span>
                            <span class="result-value">${{ number_format((($car_price ?? 25000) * ($state_tax ?? 6) / 100), 2) }}</span>
                        </div>
                    </div>
                </div>
                @endif
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
        });
    </script>
</body>
</html>