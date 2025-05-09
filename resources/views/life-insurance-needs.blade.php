<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professional Life Insurance Needs Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0a4275;
            --secondary-color: #4891d3;
            --accent-color: #e9f2fb;
            --dark-color: #1e2a38;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 3rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("/api/placeholder/1200/400");
            background-size: cover;
            opacity: 0.1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-weight: 700;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .subtitle {
            font-size: 1.2rem;
            font-weight: 300;
        }
        
        .calculator-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-top: -3rem;
            background-color: white;
            position: relative;
            z-index: 10;
        }
        
        .card-header-custom {
            background-color: var(--accent-color);
            border-radius: 8px 8px 0 0;
            border-bottom: 3px solid var(--secondary-color);
            padding: 1rem;
            margin: -2rem -2rem 1.5rem -2rem;
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
            box-shadow: 0 0 0 0.25rem rgba(72, 145, 211, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
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
            box-shadow: 0 4px 12px rgba(10, 66, 117, 0.2);
            transition: all 0.3s;
        }
        
        .btn-calculate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(10, 66, 117, 0.3);
        }
        
        .btn-learn {
            background-color: var(--accent-color);
            color: var(--primary-color);
            border: none;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .btn-learn:hover {
            background-color: #d8e8f7;
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
        }
        
        .result-card {
            background-color: var(--accent-color);
            border-left: 5px solid var(--secondary-color);
            border-radius: 8px;
            padding: 1.5rem;
        }
        
        .result-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .features-section {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        
        .feature-card {
            height: 100%;
            padding: 1.5rem;
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background-color: var(--accent-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        footer {
            background-color: var(--dark-color);
            color: #fff;
            padding: 3rem 0 2rem;
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

<!-- Hero Section/Header -->
<header class="hero-section text-white text-center">
    <div class="container hero-content">
        <h1 class="hero-title display-4 mb-3">Life Insurance Needs Calculator</h1>
        <p class="subtitle mb-0">Plan your family's financial security with our professional estimation tool</p>
    </div>
</header>

<div class="container">
    <!-- Main Calculator Card -->
    <div class="calculator-card mb-5">
        <div class="card-header-custom">
            <h2 class="text-center text-primary mb-0"><i class="fas fa-calculator me-2"></i>Coverage Estimator</h2>
        </div>
        
        <div class="mb-4">
            <button class="btn btn-learn w-100 py-2" data-bs-toggle="modal" data-bs-target="#explainerModal">
                <i class="fas fa-info-circle me-2"></i>Learn How This Calculator Works
            </button>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('life.calculate') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label">Annual Income ($)</label>
                <div class="input-with-icon">
                    <i class="fas fa-dollar-sign input-icon"></i>
                    <input type="number" name="annual_income" class="form-control" required placeholder="Enter your yearly income">
                </div>
                <small class="text-muted">Your pre-tax annual income</small>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Outstanding Debts ($)</label>
                <div class="input-with-icon">
                    <i class="fas fa-credit-card input-icon"></i>
                    <input type="number" name="debts" class="form-control" required placeholder="Mortgage, loans, credit cards, etc.">
                </div>
                <small class="text-muted">Total of all outstanding loans and debts</small>
            </div>
            
            <div class="mb-4">
                <label class="form-label">College Fund Goal ($)</label>
                <div class="input-with-icon">
                    <i class="fas fa-graduation-cap input-icon"></i>
                    <input type="number" name="college_fund" class="form-control" required placeholder="Education savings goal">
                </div>
                <small class="text-muted">Estimated education costs for dependents</small>
            </div>
            
            <button type="submit" class="btn btn-calculate btn-lg w-100 text-white">
                <i class="fas fa-arrow-right me-2"></i>Calculate My Coverage Needs
            </button>
        </form>
    </div>

    <!-- Results Section -->
    @isset($recommendedCoverage)
    <div class="result-card mb-5">
        <div class="text-center">
            <h3 class="mb-4">Your Recommended Coverage</h3>
            <div class="result-amount mb-3">${{ number_format($recommendedCoverage, 0) }}</div>
            <p class="mb-0">This estimate is based on your inputs and industry standard calculations</p>
        </div>
    </div>
    @endisset

    <!-- Features Section -->
    <section class="features-section my-5">
        <div class="container">
            <h2 class="text-center mb-5">Why Use Our Calculator?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="text-center mb-3">Comprehensive Protection</h4>
                        <p class="text-center mb-0">Our calculator considers multiple factors to ensure your loved ones are financially protected.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4 class="text-center mb-3">Quick & Easy</h4>
                        <p class="text-center mb-0">Get an instant estimate in less than a minute with our simple, user-friendly calculator.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="text-center mb-3">Industry Standards</h4>
                        <p class="text-center mb-0">Uses proven financial formulas trusted by insurance professionals nationwide.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade modal-custom" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="explainerModalLabel">
                    <i class="fas fa-info-circle me-2"></i>About This Calculator
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h6 class="fw-bold mb-3">How We Calculate Your Insurance Needs:</h6>
                <p>Our calculator uses the widely accepted "10x income rule" as a foundation, then adds your specific financial obligations:</p>
                
                <div class="bg-light p-3 rounded mb-3">
                    <code>(Annual Income × 10) + Outstanding Debts + College Fund = Recommended Coverage</code>
                </div>
                
                <p>This approach ensures your family can:</p>
                <ul>
                    <li>Replace your income for approximately 10 years</li>
                    <li>Pay off all outstanding debts (mortgage, loans, etc.)</li>
                    <li>Fund education expenses for children</li>
                </ul>
                
                <div class="alert alert-info mt-4">
                    <i class="fas fa-lightbulb me-2"></i> This is an estimation tool only. For personalized advice, consult with a licensed insurance professional.
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
                <h5 class="footer-heading">Insurance Calculator</h5>
                <p>Our professional calculator helps you determine the right amount of coverage to protect your loved ones.</p>
                <p class="mb-0">© 2025 Insurance Needs Calculator</p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Home</a></li>
                    <li><a href="#" class="footer-link">About Us</a></li>
                    <li><a href="#" class="footer-link">Insurance Types</a></li>
                    <li><a href="#" class="footer-link">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="footer-heading">Resources</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Insurance Guide</a></li>
                    <li><a href="#" class="footer-link">Calculator FAQ</a></li>
                    <li><a href="#" class="footer-link">Financial Planning</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="footer-heading">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@insure-calc.com</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (800) 555-1234</li>
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
                    Disclaimer: This calculator provides estimates only and should not be considered as financial advice. Results may vary based on individual circumstances.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>