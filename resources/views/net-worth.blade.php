<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Net Worth Tracker | Financial Health Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2d3e50;
            --secondary-color: #3498db;
            --accent-color: #edf3f8;
            --dark-color: #1a252f;
            --light-accent: #d6e6f5;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 3rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("/api/placeholder/1200/400");
            background-size: cover;
            opacity: 0.08;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        .header-title {
            font-weight: 700;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .header-subtitle {
            font-size: 1.2rem;
            font-weight: 300;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .main-container {
            margin-top: -2rem;
            position: relative;
            z-index: 10;
        }
        
        .card-custom {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .card-header-custom {
            background-color: var(--accent-color);
            padding: 1.5rem;
            border-bottom: 3px solid var(--secondary-color);
        }
        
        .card-body-custom {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            box-shadow: none;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
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
            color: #6c757d;
        }
        
        .btn-calculate {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2);
            transition: all 0.3s;
            color: white;
        }
        
        .btn-calculate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(52, 152, 219, 0.3);
        }
        
        .btn-info-custom {
            background-color: var(--accent-color);
            color: var(--primary-color);
            border: none;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .btn-info-custom:hover {
            background-color: var(--light-accent);
            transform: translateY(-1px);
        }
        
        .results-card {
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border-left: 5px solid var(--secondary-color);
            margin-top: 2rem;
        }
        
        .results-header {
            background-color: var(--accent-color);
            padding: 1rem 1.5rem;
            border-bottom: 2px solid rgba(45, 62, 80, 0.1);
        }
        
        .results-body {
            padding: 1.5rem;
        }
        
        .net-worth-value {
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .positive-value {
            color: var(--success-color);
        }
        
        .negative-value {
            color: var(--danger-color);
        }
        
        .modal-custom .modal-header {
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 8px 8px 0 0;
        }
        
        .modal-custom .modal-content {
            border-radius: 8px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .info-block {
            background-color: rgba(237, 243, 248, 0.7);
            border-left: 4px solid var(--secondary-color);
            padding: 1rem;
            border-radius: 0 8px 8px 0;
            margin: 1.5rem 0;
        }
        
        .feature-section {
            background-color: var(--accent-color);
            border-radius: 12px;
            padding: 2rem;
            margin-top: 1rem;
            margin-bottom: 2rem;
        }
        
        .circle-icon {
            width: 54px;
            height: 54px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
            font-size: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .progress-track {
            height: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        
        .progress-bar-custom {
            height: 100%;
            border-radius: 5px;
        }
        
        .asset-item, .liability-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }
        
        .asset-item {
            border-left: 3px solid var(--success-color);
        }
        
        .liability-item {
            border-left: 3px solid var(--danger-color);
        }
        
        .error-alert {
            border-radius: 8px;
            border-left: 4px solid var(--danger-color);
        }
        
        footer {
            background-color: var(--dark-color);
            color: #fff;
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }
        
        .footer-heading {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        .footer-link {
            color: #ddd;
            text-decoration: none;
            transition: all 0.2s;
            display: block;
            margin-bottom: 0.5rem;
        }
        
        .footer-link:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .disclaimer {
            font-size: 0.85rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="page-header text-white text-center">
    <div class="container header-content">
        <h1 class="header-title display-4 mb-3">Net Worth Tracker</h1>
        <p class="header-subtitle mb-0">Track your financial health by calculating the difference between what you own and what you owe</p>
    </div>
</header>

<div class="container main-container">
    <!-- Calculator Card -->
    <div class="card-custom">
        <div class="card-header-custom">
            <div class="d-flex align-items-center">
                <div class="circle-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <div>
                    <h2 class="mb-0 text-primary">Net Worth Calculator</h2>
                    <p class="mb-0 text-muted">Monitor your overall financial position</p>
                </div>
            </div>
        </div>
        
        <div class="card-body-custom">
            <div class="mb-4">
                <button class="btn btn-info-custom w-100 py-2" data-bs-toggle="modal" data-bs-target="#explainerModal">
                    <i class="fas fa-info-circle me-2"></i>What does this calculator do?
                </button>
            </div>
            
            <!-- Form -->
            <form method="POST" action="{{ route('networth.calculate') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Assets (comma-separated amounts)</label>
                    <div class="input-with-icon">
                        <i class="fas fa-plus-circle input-icon text-success"></i>
                        <input type="text" name="assets_list" class="form-control" required value="{{ old('assets_list', $assetsInput ?? '') }}" placeholder="Example: 50000, 25000, 10000">
                    </div>
                    <small class="text-muted">Enter the values of what you own: home equity, investments, savings, etc.</small>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Total Liabilities ($)</label>
                    <div class="input-with-icon">
                        <i class="fas fa-minus-circle input-icon text-danger"></i>
                        <input type="number" step="0.01" name="liabilities" class="form-control" required value="{{ old('liabilities', $liabilities ?? '') }}" placeholder="Total amount of all your debts">
                    </div>
                    <small class="text-muted">Enter the total of what you owe: mortgage, loans, credit cards, etc.</small>
                </div>
                
                <button type="submit" class="btn btn-calculate btn-lg w-100">
                    <i class="fas fa-calculator me-2"></i>Calculate Net Worth
                </button>
            </form>
            
            <!-- Info Block -->
            <div class="info-block mt-4">
                <div class="d-flex">
                    <div class="me-3 fs-4 text-primary">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div>
                        <p class="mb-0"><strong>Pro Tip:</strong> Track your net worth regularly (monthly or quarterly) to monitor your financial progress over time.</p>
                    </div>
                </div>
            </div>
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger error-alert mt-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading mb-1">Please check your inputs</h5>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Results Section -->
    @isset($netWorth)
        <div class="results-card">
            <div class="results-header">
                <h3 class="mb-0 text-primary"><i class="fas fa-chart-line me-2"></i>Your Financial Snapshot</h3>
            </div>
            <div class="results-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4 class="mb-3">Net Worth Summary</h4>
                        <div class="net-worth-value mb-3 {{ $netWorth >= 0 ? 'positive-value' : 'negative-value' }}">
                            ${{ number_format($netWorth, 2) }}
                        </div>
                        
                        <!-- Assets vs Liabilities Progress Bar -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <div>Asset-to-Debt Ratio</div>
                                <div>
                                    @php
                                        $ratio = $liabilities > 0 ? $totalAssets / $liabilities : 1;
                                        $percentage = min(100, $ratio * 100);
                                    @endphp
                                    {{ number_format($ratio, 2) }}:1
                                </div>
                            </div>
                            <div class="progress-track">
                                <div class="progress-bar-custom bg-success" style="width: {{ $percentage }}%"></div>
                            </div>
                            <div class="text-muted small">Higher ratio indicates stronger financial position</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5>Assets</h5>
                            <div class="asset-item">
                                <span>Total Assets</span>
                                <span class="fw-bold text-success">${{ number_format($totalAssets, 2) }}</span>
                            </div>
                        </div>
                        
                        <div>
                            <h5>Liabilities</h5>
                            <div class="liability-item">
                                <span>Total Debts</span>
                                <span class="fw-bold text-danger">${{ number_format($liabilities, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-{{ $netWorth >= 0 ? 'success' : 'warning' }} mb-0">
                    <i class="fas fa-{{ $netWorth >= 0 ? 'check-circle' : 'exclamation-circle' }} me-2"></i>
                    <strong>Financial Health:</strong> 
                    @if($netWorth >= 0)
                        Your net worth is positive, indicating that your assets exceed your liabilities.
                    @else
                        Your net worth is negative, indicating that your liabilities exceed your assets. Focus on debt reduction.
                    @endif
                </div>
            </div>
        </div>
    @endisset

    <!-- Financial Tips Section -->
    <div class="feature-section">
        <h3 class="text-center mb-4">Improving Your Net Worth</h3>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-primary mb-3">
                            <i class="fas fa-arrow-up fa-2x"></i>
                        </div>
                        <h5>Increase Assets</h5>
                        <p class="mb-0">Boost savings, invest regularly, and increase retirement contributions to grow your asset base.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-danger mb-3">
                            <i class="fas fa-arrow-down fa-2x"></i>
                        </div>
                        <h5>Reduce Liabilities</h5>
                        <p class="mb-0">Pay down high-interest debt first, avoid unnecessary loans, and live within your means.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-warning mb-3">
                            <i class="fas fa-sync-alt fa-2x"></i>
                        </div>
                        <h5>Track Regularly</h5>
                        <p class="mb-0">Monitor your net worth quarterly to identify trends and adjust your financial strategy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal-custom" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="explainerModalLabel">
                    <i class="fas fa-info-circle me-2"></i>About This Tool
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h5 class="fw-bold mb-3">How This Calculator Works:</h5>
                <p>The Net Worth Tracker calculates your financial position using a simple formula:</p>
                
                <div class="bg-light p-3 rounded mb-3">
                    <code>Net Worth = Total Assets - Total Liabilities</code>
                </div>
                
                <h5 class="fw-bold mt-4 mb-2">What to Include:</h5>
                
                <div class="mb-3">
                    <h6 class="text-success"><i class="fas fa-plus-circle me-2"></i>Assets (What You Own):</h6>
                    <ul>
                        <li>Cash and savings accounts</li>
                        <li>Investment accounts (401k, IRA, brokerage)</li>
                        <li>Home equity (home value minus mortgage)</li>
                        <li>Vehicle values</li>
                        <li>Other valuable possessions</li>
                    </ul>
                </div>
                
                <div>
                    <h6 class="text-danger"><i class="fas fa-minus-circle me-2"></i>Liabilities (What You Owe):</h6>
                    <ul>
                        <li>Mortgage balance</li>
                        <li>Auto loans</li>
                        <li>Student loans</li>
                        <li>Credit card debt</li>
                        <li>Personal loans</li>
                        <li>Other outstanding debts</li>
                    </ul>
                </div>
                
                <div class="alert alert-info mt-3">
                    <i class="fas fa-lightbulb me-2"></i> <strong>Pro Tip:</strong> For the assets field, enter each asset value separated by commas. For example: 250000, 50000, 25000, 10000
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h5 class="footer-heading">Net Worth Tracker</h5>
                <p>Our professional calculator helps you monitor your financial health and track progress toward your financial goals.</p>
                <p class="mb-0">© 2025 Financial Health Tools</p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Home</a></li>
                    <li><a href="#" class="footer-link">About Us</a></li>
                    <li><a href="#" class="footer-link">Financial Tools</a></li>
                    <li><a href="#" class="footer-link">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-heading">Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Financial Planning</a></li>
                    <li><a href="#" class="footer-link">Investment Basics</a></li>
                    <li><a href="#" class="footer-link">Debt Reduction</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="footer-heading">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@financial-tools.com</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (800) 555-9876</li>
                </ul>
                <div class="mt-3">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-3" style="opacity: 0.1;">
        <div class="row">
            <div class="col-12">
                <p class="disclaimer text-center mb-0">
                    Disclaimer: This calculator provides a simplified net worth estimation and should not be considered as financial advice. For personalized guidance, consult with a financial professional.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>