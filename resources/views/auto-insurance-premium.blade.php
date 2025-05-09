<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Insurance Premium Estimator - Financial Tools</title>
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
        
        .range-meter {
            position: relative;
            height: 8px;
            border-radius: 10px;
            background: linear-gradient(to right, #5cc3f0, #3498db, #2980b9);
            margin: 2rem 0;
        }
        
        .premium-marker {
            position: absolute;
            transform: translateX(-50%);
            bottom: -25px;
            width: auto;
            min-width: 40px;
            text-align: center;
            font-weight: bold;
        }
        
        .premium-marker:before {
            content: "";
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 15px;
            background-color: #555;
        }
        
        .coverage-option {
            border-radius: 10px;
            border: 1px solid #dce4ec;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
            cursor: pointer;
        }
        
        .coverage-option:hover, .coverage-option.selected {
            border-color: var(--secondary-color);
            background-color: rgba(52, 152, 219, 0.05);
        }
        
        .coverage-option.selected {
            box-shadow: 0 0 0 1px var(--secondary-color);
        }
        
        .coverage-option .form-check-input {
            margin-top: 0.7rem;
        }
        
        .state-selector {
            padding: 0.75rem 1rem;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">Auto Insurance Premium Estimator</h1>
                    <p class="lead">Get a quick estimate of your annual auto insurance costs based on your profile</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <img src="/api/placeholder/400/200" alt="Car insurance illustration" class="img-fluid rounded">
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
                                <i class="fas fa-car fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Find Your Premium Range</h5>
                                <p class="mb-0">This tool provides a ballpark estimate of what you might pay annually for auto insurance based on key factors.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Calculator Form -->
                    <form method="POST" action="{{ route('auto.estimate') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-bold">Your Age</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="number" name="age" class="form-control" min="16" max="100" required value="{{ old('age', $age ?? '') }}" placeholder="Enter your age (16-100)">
                            </div>
                            <small class="text-muted">Age is a key factor in determining insurance rates</small>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Your State</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <select name="state" class="form-control state-selector" required>
                                    <option value="">-- Select your state --</option>
                                    <option value="AL" {{ old('state', $state ?? '') === 'AL' ? 'selected' : '' }}>Alabama</option>
                                    <option value="AK" {{ old('state', $state ?? '') === 'AK' ? 'selected' : '' }}>Alaska</option>
                                    <option value="AZ" {{ old('state', $state ?? '') === 'AZ' ? 'selected' : '' }}>Arizona</option>
                                    <option value="AR" {{ old('state', $state ?? '') === 'AR' ? 'selected' : '' }}>Arkansas</option>
                                    <option value="CA" {{ old('state', $state ?? '') === 'CA' ? 'selected' : '' }}>California</option>
                                    <option value="CO" {{ old('state', $state ?? '') === 'CO' ? 'selected' : '' }}>Colorado</option>
                                    <option value="CT" {{ old('state', $state ?? '') === 'CT' ? 'selected' : '' }}>Connecticut</option>
                                    <option value="DE" {{ old('state', $state ?? '') === 'DE' ? 'selected' : '' }}>Delaware</option>
                                    <option value="FL" {{ old('state', $state ?? '') === 'FL' ? 'selected' : '' }}>Florida</option>
                                    <option value="GA" {{ old('state', $state ?? '') === 'GA' ? 'selected' : '' }}>Georgia</option>
                                    <option value="HI" {{ old('state', $state ?? '') === 'HI' ? 'selected' : '' }}>Hawaii</option>
                                    <option value="ID" {{ old('state', $state ?? '') === 'ID' ? 'selected' : '' }}>Idaho</option>
                                    <option value="IL" {{ old('state', $state ?? '') === 'IL' ? 'selected' : '' }}>Illinois</option>
                                    <option value="IN" {{ old('state', $state ?? '') === 'IN' ? 'selected' : '' }}>Indiana</option>
                                    <option value="IA" {{ old('state', $state ?? '') === 'IA' ? 'selected' : '' }}>Iowa</option>
                                    <option value="KS" {{ old('state', $state ?? '') === 'KS' ? 'selected' : '' }}>Kansas</option>
                                    <option value="KY" {{ old('state', $state ?? '') === 'KY' ? 'selected' : '' }}>Kentucky</option>
                                    <option value="LA" {{ old('state', $state ?? '') === 'LA' ? 'selected' : '' }}>Louisiana</option>
                                    <option value="ME" {{ old('state', $state ?? '') === 'ME' ? 'selected' : '' }}>Maine</option>
                                    <option value="MD" {{ old('state', $state ?? '') === 'MD' ? 'selected' : '' }}>Maryland</option>
                                    <option value="MA" {{ old('state', $state ?? '') === 'MA' ? 'selected' : '' }}>Massachusetts</option>
                                    <option value="MI" {{ old('state', $state ?? '') === 'MI' ? 'selected' : '' }}>Michigan</option>
                                    <option value="MN" {{ old('state', $state ?? '') === 'MN' ? 'selected' : '' }}>Minnesota</option>
                                    <option value="MS" {{ old('state', $state ?? '') === 'MS' ? 'selected' : '' }}>Mississippi</option>
                                    <option value="MO" {{ old('state', $state ?? '') === 'MO' ? 'selected' : '' }}>Missouri</option>
                                    <option value="MT" {{ old('state', $state ?? '') === 'MT' ? 'selected' : '' }}>Montana</option>
                                    <option value="NE" {{ old('state', $state ?? '') === 'NE' ? 'selected' : '' }}>Nebraska</option>
                                    <option value="NV" {{ old('state', $state ?? '') === 'NV' ? 'selected' : '' }}>Nevada</option>
                                    <option value="NH" {{ old('state', $state ?? '') === 'NH' ? 'selected' : '' }}>New Hampshire</option>
                                    <option value="NJ" {{ old('state', $state ?? '') === 'NJ' ? 'selected' : '' }}>New Jersey</option>
                                    <option value="NM" {{ old('state', $state ?? '') === 'NM' ? 'selected' : '' }}>New Mexico</option>
                                    <option value="NY" {{ old('state', $state ?? '') === 'NY' ? 'selected' : '' }}>New York</option>
                                    <option value="NC" {{ old('state', $state ?? '') === 'NC' ? 'selected' : '' }}>North Carolina</option>
                                    <option value="ND" {{ old('state', $state ?? '') === 'ND' ? 'selected' : '' }}>North Dakota</option>
                                    <option value="OH" {{ old('state', $state ?? '') === 'OH' ? 'selected' : '' }}>Ohio</option>
                                    <option value="OK" {{ old('state', $state ?? '') === 'OK' ? 'selected' : '' }}>Oklahoma</option>
                                    <option value="OR" {{ old('state', $state ?? '') === 'OR' ? 'selected' : '' }}>Oregon</option>
                                    <option value="PA" {{ old('state', $state ?? '') === 'PA' ? 'selected' : '' }}>Pennsylvania</option>
                                    <option value="RI" {{ old('state', $state ?? '') === 'RI' ? 'selected' : '' }}>Rhode Island</option>
                                    <option value="SC" {{ old('state', $state ?? '') === 'SC' ? 'selected' : '' }}>South Carolina</option>
                                    <option value="SD" {{ old('state', $state ?? '') === 'SD' ? 'selected' : '' }}>South Dakota</option>
                                    <option value="TN" {{ old('state', $state ?? '') === 'TN' ? 'selected' : '' }}>Tennessee</option>
                                    <option value="TX" {{ old('state', $state ?? '') === 'TX' ? 'selected' : '' }}>Texas</option>
                                    <option value="UT" {{ old('state', $state ?? '') === 'UT' ? 'selected' : '' }}>Utah</option>
                                    <option value="VT" {{ old('state', $state ?? '') === 'VT' ? 'selected' : '' }}>Vermont</option>
                                    <option value="VA" {{ old('state', $state ?? '') === 'VA' ? 'selected' : '' }}>Virginia</option>
                                    <option value="WA" {{ old('state', $state ?? '') === 'WA' ? 'selected' : '' }}>Washington</option>
                                    <option value="WV" {{ old('state', $state ?? '') === 'WV' ? 'selected' : '' }}>West Virginia</option>
                                    <option value="WI" {{ old('state', $state ?? '') === 'WI' ? 'selected' : '' }}>Wisconsin</option>
                                    <option value="WY" {{ old('state', $state ?? '') === 'WY' ? 'selected' : '' }}>Wyoming</option>
                                    <option value="DC" {{ old('state', $state ?? '') === 'DC' ? 'selected' : '' }}>District of Columbia</option>
                                </select>
                            </div>
                            <small class="text-muted">Insurance rates vary significantly by location</small>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Vehicle Value</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" name="vehicle_value" class="form-control" required value="{{ old('vehicle_value', $vehicleValue ?? '') }}" placeholder="Enter your vehicle's value">
                            </div>
                            <small class="text-muted">More expensive vehicles typically cost more to insure</small>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Coverage Level</label>
                            
                            <div class="coverage-option p-3 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="coverage_level" id="basic" value="basic" {{ old('coverage_level', $coverageLevel ?? '') === 'basic' ? 'checked' : '' }} required>
                                    <label class="form-check-label d-block ms-2" for="basic">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Basic Coverage</strong>
                                                <p class="mb-0 text-muted">Minimum required liability coverage only</p>
                                            </div>
                                            <span class="badge bg-primary">Economical</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="coverage-option p-3 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="coverage_level" id="standard" value="standard" {{ old('coverage_level', $coverageLevel ?? '') === 'standard' ? 'checked' : '' }}>
                                    <label class="form-check-label d-block ms-2" for="standard">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Standard Coverage</strong>
                                                <p class="mb-0 text-muted">Increased liability plus collision coverage</p>
                                            </div>
                                            <span class="badge bg-info">Recommended</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="coverage-option p-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="coverage_level" id="full" value="full" {{ old('coverage_level', $coverageLevel ?? '') === 'full' ? 'checked' : '' }}>
                                    <label class="form-check-label d-block ms-2" for="full">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Full Coverage</strong>
                                                <p class="mb-0 text-muted">Comprehensive protection with additional benefits</p>
                                            </div>
                                            <span class="badge bg-success">Complete</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom-primary">
                                <i class="fas fa-calculator me-2"></i>Calculate My Premium
                            </button>
                        </div>
                    </form>

                    <!-- Information Modal Button -->
                    <div class="text-center mt-4">
                        <button class="btn btn-info-custom" data-bs-toggle="modal" data-bs-target="#explainerModal">
                            <i class="fas fa-question-circle me-2"></i>Learn more about this estimator
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column - Results and Info -->
            <div class="col-lg-5">
                <!-- Results Section (only shown when results exist) -->
                @isset($estimatedLow)
                <div class="results-card mb-4">
                    <div class="results-header">
                        <h4 class="mb-0"><i class="fas fa-chart-line me-2"></i>Your Premium Estimate</h4>
                    </div>
                    <div class="results-body">
                        <div class="text-center mb-3">
                            <span class="text-muted">Estimated Annual Premium Range</span>
                            <h2 class="display-6 fw-bold">${{ number_format($estimatedLow, 0) }} - ${{ number_format($estimatedHigh, 0) }}</h2>
                            <p class="text-muted">About ${{ number_format(($estimatedLow + $estimatedHigh) / 24, 0) }} - ${{ number_format(($estimatedLow + $estimatedHigh) / 12, 0) }} per month</p>
                        </div>
                        
                        <div class="range-meter position-relative">
                            <div class="premium-marker" style="left: 20%">
                                <span class="badge bg-primary">Low</span>
                            </div>
                            <div class="premium-marker" style="left: 50%">
                                <span class="badge bg-info">Average</span>
                            </div>
                            <div class="premium-marker" style="left: 80%">
                                <span class="badge bg-danger">High</span>
                            </div>
                        </div>
                        
                        <div class="alert alert-info mt-4">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-lightbulb fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">What This Means</h5>
                                    <p class="mb-0">This is an estimated range based on your inputs. Actual quotes may vary based on driving history, credit score, vehicle make/model, and other factors.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Ways to Save Tips -->
                        <div class="mt-4">
                            <h5><i class="fas fa-piggy-bank me-2"></i>Ways to Save</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item ps-0 pt-2 pb-2 border-top-0">
                                    <i class="fas fa-check-circle text-success me-2"></i>Bundle with homeowners or renters insurance
                                </li>
                                <li class="list-group-item ps-0 pt-2 pb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>Ask about safe driver discounts
                                </li>
                                <li class="list-group-item ps-0 pt-2 pb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>Consider a higher deductible
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endisset

                <!-- Information Card (Always shown) -->
                <div class="explanation-card">
                    <div class="card-header-custom py-3">
                        <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Understanding Auto Insurance</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">Coverage Types Explained</h6>
                        
                        <div class="mb-3">
                            <h6 class="mb-1 text-primary"><i class="fas fa-check me-2"></i>Basic Coverage</h6>
                            <p class="mb-0 small">Includes state minimum liability coverage for bodily injury and property damage. Does not cover your vehicle.</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="mb-1 text-primary"><i class="fas fa-check me-2"></i>Standard Coverage</h6>
                            <p class="mb-0 small">Includes higher liability limits plus collision coverage that protects your vehicle in accidents.</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="mb-1 text-primary"><i class="fas fa-check me-2"></i>Full Coverage</h6>
                            <p class="mb-0 small">Comprehensive protection including collision, comprehensive (theft, weather damage), uninsured motorist protection, and more.</p>
                        </div>
                        
                        <div class="alert alert-light border mt-3 mb-0">
                            <strong><i class="fas fa-info-circle me-2"></i>Factors Affecting Your Premium:</strong>
                            <ul class="small mb-0 mt-2">
                                <li>Driving history and experience</li>
                                <li>Vehicle make, model, and age</li>
                                <li>Credit score (in most states)</li>
                                <li>Annual mileage</li>
                                <li>Location and local risk factors</li>
                                <li>Age and gender</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information Section -->
        <div class="row mt-4">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center">Why Insurance Coverage Matters</h3>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-car-crash"></i>
                        </div>
                        <h5 class="card-title">Accident Protection</h5>
                        <p class="card-text">The right coverage ensures you're protected financially when accidents happen, covering repairs and medical costs.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h5 class="card-title">Legal Requirements</h5>
                        <p class="card-text">Most states require minimum liability insurance. Driving without proper coverage can result in fines and penalties.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon mx-auto">
                            <i class="fas fa-university"></i>
                        </div>
                        <h5 class="card-title">Financial Security</h5>
                        <p class="card-text">Insurance protects your assets and savings from being depleted due to costly accidents or lawsuits.</p>
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
                    <h5>About This Estimator</h5>
                    <p>This professional auto insurance premium estimator provides a ballpark figure based on key rating factors. Please note that actual premiums from insurance companies may vary based on additional factors and specific underwriting criteria.</p>
                </div>
                <div class="col-md-3">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Insurance Glossary</a></li>
                        <li><a href="#" class="text-white">Coverage Guide</a></li>
                        <li><a href="#" class="text-white">Safe Driving Tips</a></li>
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
                    <p class="mb-