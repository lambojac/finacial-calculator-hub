<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HSA vs PPO Break Even Calculator | Healthcare Cost Comparison</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1c5e55;
            --secondary-color: #3aa99e;
            --accent-color: #e8f5f3;
            --dark-color: #1a3c37;
            --light-accent: #ccebe7;
            --chart-color-1: #1c5e55;
            --chart-color-2: #5b9bd5;
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
        
        .calculator-wrapper {
            margin-top: -2rem;
            position: relative;
            z-index: 10;
        }
        
        .calculator-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .calculator-header {
            background-color: var(--accent-color);
            padding: 1.5rem;
            border-bottom: 3px solid var(--secondary-color);
        }
        
        .calculator-body {
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
            box-shadow: 0 0 0 0.25rem rgba(58, 169, 158, 0.25);
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
            box-shadow: 0 4px 12px rgba(28, 94, 85, 0.2);
            transition: all 0.3s;
            color: white;
        }
        
        .btn-calculate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(28, 94, 85, 0.3);
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
            overflow: hidden;
        }
        
        .results-header {
            background-color: var(--accent-color);
            padding: 1rem 1.5rem;
            border-bottom: 2px solid rgba(28, 94, 85, 0.1);
        }
        
        .results-body {
            padding: 1.5rem;
        }
        
        .result-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
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
        
        .plan-comparison {
            background-color: var(--accent-color);
            border-radius: 12px;
            padding: 2rem;
            margin-top: 3rem;
        }
        
        .plan-feature {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .feature-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        
        .chart-container {
            height: 250px;
            margin: 2rem 0;
        }
        
        .info-block {
            background-color: rgba(230, 247, 244, 0.7);
            border-left: 4px solid var(--secondary-color);
            padding: 1rem;
            border-radius: 0 8px 8px 0;
            margin: 1.5rem 0;
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
        
        .comparison-table {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .comparison-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            text-align: center;
        }
        
        .comparison-table td {
            padding: 1rem;
            text-align: center;
            background-color: white;
        }
        
        .comparison-table tr:nth-child(even) td {
            background-color: #f8f9fa;
        }
        
        .comparison-feature {
            text-align: left !important;
            font-weight: 600;
        }
        
        .circle-icon {
            width: 54px;
            height: 54px;
            background-color: var(--accent-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="page-header text-white text-center">
    <div class="container header-content">
        <h1 class="header-title display-4 mb-3">HSA vs PPO Break Even Calculator</h1>
        <p class="header-subtitle mb-0">Make informed healthcare decisions by comparing total annual costs between High Deductible Health Plans (with HSA) and PPO options</p>
    </div>
</header>

<div class="container calculator-wrapper">
    <div class="calculator-container">
        <div class="calculator-header">
            <div class="d-flex align-items-center">
                <div class="circle-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div>
                    <h2 class="mb-0 text-primary">Cost Comparison Tool</h2>
                    <p class="mb-0 text-muted">Find your healthcare plan break-even point</p>
                </div>
            </div>
        </div>
        
        <div class="calculator-body">
            <div class="mb-4">
                <button class="btn btn-info-custom w-100 py-2" data-bs-toggle="modal" data-bs-target="#explainerModal">
                    <i class="fas fa-info-circle me-2"></i>What does this calculator do?
                </button>
            </div>
            
            <!-- Form -->
            <form method="POST" action="{{ route('hsa.calculate') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Annual Deductible ($)</label>
                    <div class="input-with-icon">
                        <i class="fas fa-dollar-sign input-icon"></i>
                        <input type="number" name="deductible" class="form-control" required value="{{ old('deductible', $deductible ?? '') }}" placeholder="Enter plan deductible">
                    </div>
                    <small class="text-muted">The amount you pay before your insurance starts to cover costs</small>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Monthly Premium ($)</label>
                    <div class="input-with-icon">
                        <i class="fas fa-receipt input-icon"></i>
                        <input type="number" name="premium" class="form-control" required value="{{ old('premium', $premium ?? '') }}" placeholder="Monthly cost of insurance">
                    </div>
                    <small class="text-muted">Your monthly payment to maintain coverage</small>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Out-of-Pocket Maximum ($)</label>
                    <div class="input-with-icon">
                        <i class="fas fa-hand-holding-usd input-icon"></i>
                        <input type="number" name="oop_max" class="form-control" required value="{{ old('oop_max', $oopMax ?? '') }}" placeholder="Maximum annual out-of-pocket expense">
                    </div>
                    <small class="text-muted">The maximum you'll pay in a year before insurance covers 100%</small>
                </div>
                
                <button type="submit" class="btn btn-calculate btn-lg w-100">
                    <i class="fas fa-chart-line me-2"></i>Calculate Break-Even Point
                </button>
            </form>
            
            <!-- Info Block -->
            <div class="info-block mt-4">
                <div class="d-flex">
                    <div class="me-3 fs-4 text-primary">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div>
                        <p class="mb-0"><strong>Pro Tip:</strong> Enter values for both your HSA-eligible plan and PPO plan to compare their worst-case scenarios (maximum possible annual costs).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Results Section -->
    @isset($estimatedAnnualCost)
    <div class="results-card mt-4">
        <div class="results-header">
            <h3 class="mb-0 text-primary"><i class="fas fa-chart-pie me-2"></i>Cost Analysis Results</h3>
        </div>
        <div class="results-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h4>Estimated Total Annual Cost</h4>
                    <p class="text-muted mb-3">Maximum possible expense (premiums + out-of-pocket costs)</p>
                    <div class="result-amount mb-3">${{ number_format($estimatedAnnualCost, 2) }}</div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="me-2"><i class="fas fa-check-circle text-success"></i></div>
                        <div>Annual premium cost: <strong>${{ number_format($premium * 12, 2) }}</strong></div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-2"><i class="fas fa-check-circle text-success"></i></div>
                        <div>Maximum out-of-pocket: <strong>${{ number_format($oopMax, 2) }}</strong></div>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="chart-container">
                        <img src="/api/placeholder/400/250" alt="Cost breakdown chart" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endisset
    
    <!-- Comparison Section -->
    <div class="plan-comparison mt-5">
        <h3 class="text-center mb-4">HSA vs PPO: Understanding the Differences</h3>
        
        <div class="table-responsive">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>HSA-Eligible Plan (HDHP)</th>
                        <th>Traditional PPO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="comparison-feature">Monthly Premium</td>
                        <td>Lower</td>
                        <td>Higher</td>
                    </tr>
                    <tr>
                        <td class="comparison-feature">Annual Deductible</td>
                        <td>Higher</td>
                        <td>Lower</td>
                    </tr>
                    <tr>
                        <td class="comparison-feature">Tax-Advantaged Savings</td>
                        <td>Yes (HSA)</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td class="comparison-feature">Preventive Care</td>
                        <td>Covered 100%</td>
                        <td>Covered 100%</td>
                    </tr>
                    <tr>
                        <td class="comparison-feature">Best For</td>
                        <td>Low healthcare users, healthy individuals</td>
                        <td>Frequent healthcare users, chronic conditions</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="row mt-4 g-4">
            <div class="col-md-6">
                <div class="plan-feature">
                    <div class="feature-icon">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">HSA Tax Benefits</h5>
                        <p class="mb-0">Triple tax advantage: tax-deductible contributions, tax-free growth, and tax-free withdrawals for qualified expenses.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="plan-feature">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">PPO Network Freedom</h5>
                        <p class="mb-0">More flexibility to see specialists without referrals and better coverage for out-of-network providers.</p>
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
                <p>This calculator helps you estimate the total annual cost of a health plan based on three key factors:</p>
                
                <div class="bg-light p-3 rounded mb-3">
                    <code>Annual Premiums + Out-of-Pocket Maximum = Worst-Case Annual Cost</code>
                </div>
                
                <p>By comparing these "worst-case scenario" costs between an HSA-eligible plan and a PPO plan, you can:</p>
                <ul>
                    <li>Determine which plan has lower maximum financial exposure</li>
                    <li>Identify your personal break-even point based on expected healthcare usage</li>
                    <li>Make a more informed decision about which plan type best fits your needs</li>
                </ul>
                
                <div class="alert alert-info mt-3">
                    <i class="fas fa-lightbulb me-2"></i> <strong>Pro Tip:</strong> Run the calculator twice - once for each plan option - and compare the results to see which plan offers better financial protection.
                </div>
                
                <h5 class="fw-bold mt-4 mb-3">When to Choose Each Plan Type:</h5>
                <p><strong>HSA-Eligible Plan:</strong> Generally better for individuals who are healthy, don't expect significant medical expenses, and want to build tax-advantaged savings.</p>
                <p><strong>PPO Plan:</strong> Often better for individuals with ongoing medical conditions, families expecting to use healthcare services frequently, or those who prefer lower deductibles.</p>
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
                <h5 class="footer-heading">Healthcare Cost Calculator</h5>
                <p>Our professional tool helps you make informed decisions about your healthcare plan options.</p>
                <p class="mb-0">© 2025 Health Plan Comparison Tools</p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-heading">Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Home</a></li>
                    <li><a href="#" class="footer-link">About Us</a></li>
                    <li><a href="#" class="footer-link">Healthcare Guides</a></li>
                    <li><a href="#" class="footer-link">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-heading">Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">HSA Rules Guide</a></li>
                    <li><a href="#" class="footer-link">PPO vs HDHP FAQ</a></li>
                    <li><a href="#" class="footer-link">Healthcare Glossary</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="footer-heading">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@health-calc.com</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (800) 555-5678</li>
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
                    Disclaimer: This calculator provides estimates only and should not be considered as financial or medical advice. Individual results may vary based on specific plan details and healthcare usage.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>