<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Calculators</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3f72af;
            --secondary-color: #112d4e;
            --accent-color: #4e9af1;
            --light-bg: #f9fafc;
            --border-color: #e7e9ef;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--light-bg);
            color: #333;
        }
        
        .sidebar {
            min-height: 100vh;
            background: white;
            padding: 1.5rem;
            border-right: 1px solid var(--border-color);
            box-shadow: 0 0 20px rgba(0,0,0,0.03);
        }
        
        .sidebar .brand {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .sidebar .menu-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .sidebar .nav-link {
            color: #495057;
            padding: 0.6rem 0.75rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            margin: 0.15rem 0;
            display: flex;
            align-items: center;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 0.85rem;
        }
        
        .sidebar .nav-link:hover {
            background-color: rgba(63, 114, 175, 0.08);
            color: var(--primary-color);
        }
        
        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }
        
        .calculator-header {
            background: white;
            border-radius: 10px;
            padding: 1.75rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        
        .calculator-header h4 {
            color: var(--secondary-color);
            font-weight: 600;
        }
        
        .calculator-header p {
            color: #6c757d;
            margin-bottom: 0;
            font-size: 1rem;
        }
        
        .calculator-card {
            background: white;
            border-radius: 10px;
            padding: 1.75rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        
        .calculator-card h5 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .nav-tabs {
            border-bottom: 1px solid var(--border-color);
        }
        
        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
            padding: 0.75rem 1rem;
            font-weight: 500;
            margin-right: 0.5rem;
        }
        
        .nav-tabs .nav-link:hover {
            color: var(--primary-color);
            border-color: transparent;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background-color: transparent;
            border-bottom: 2px solid var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            box-shadow: 0 2px 6px rgba(63, 114, 175, 0.2);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(63, 114, 175, 0.15);
        }
        
        .results-card {
            background-color: #f8faff;
            border-left: 4px solid var(--primary-color);
        }
        
        .footer {
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar col-md-3 col-xl-2">
        <div class="brand">
            <i class="fas fa-calculator me-2"></i> Financial Tools
        </div>

        <div class="menu-title">
            <i class="fas fa-landmark me-1"></i> Loans & Mortgage
        </div>
        <a class="nav-link" href="{{ route('ira.form') }}">
            <i class="fas fa-piggy-bank"></i> IRA vs Roth
        </a>
        <a class="nav-link" href="{{ route('dti.form') }}">
            <i class="fas fa-percentage"></i> DTI Ratio
        </a>
        <a class="nav-link" href="{{ route('student.refi.form') }}">
            <i class="fas fa-graduation-cap"></i> Student Refinance
        </a>
        <a class="nav-link" href="{{ route('rentvsbuy.form') }}">
            <i class="fas fa-home"></i> Rent vs Buy
        </a>
        <a class="nav-link" href="{{ route('home.affordability.form') }}">
            <i class="fas fa-house-user"></i> Home Affordability
        </a>
        <a class="nav-link" href="{{ route('auto.form') }}">
            <i class="fas fa-car"></i> Auto Insurance
        </a>

        <div class="menu-title">
            <i class="fas fa-shield-alt me-1"></i> Insurance & Tax
        </div>
        <a class="nav-link" href="{{ route('life.form') }}">
            <i class="fas fa-heartbeat"></i> Life Insurance
        </a>
        <a class="nav-link active" href="{{ route('tax.form') }}">
            <i class="fas fa-file-invoice-dollar"></i> Tax Estimator
        </a>
        <a class="nav-link" href="{{ route('hsa.form') }}">
            <i class="fas fa-notes-medical"></i> HSA vs PPO
        </a>

        <div class="menu-title">
            <i class="fas fa-chart-line me-1"></i> Financial Tools
        </div>
        <a class="nav-link" href="{{ route('networth.form') }}">
            <i class="fas fa-wallet"></i> Net Worth
        </a>
        <a class="nav-link" href="{{ route('currency.form') }}">
            <i class="fas fa-exchange-alt"></i> Currency Converter
        </a>
        <a class="nav-link" href="{{ route('solar.form') }}">
            <i class="fas fa-solar-panel"></i> Solar ROI
        </a>
    </div>

    <!-- Main Content -->
    <div class="col-md-9 col-xl-10 p-4">
        <!-- Calculator Description Header -->
        <div class="calculator-header mb-4">
            <h4><i class="fas fa-file-invoice-dollar me-2"></i>Income Tax Estimator (US/CA)</h4>
            <p>Estimate your federal and state/province income tax liability for the United States or Canada based on your filing status, income, and region.</p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ira.form') }}">
                    <i class="fas fa-piggy-bank me-1"></i> IRA
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dti.form') }}">
                    <i class="fas fa-percentage me-1"></i> DTI
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('solar.form') }}">
                    <i class="fas fa-solar-panel me-1"></i> Solar ROI
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('networth.form') }}">
                    <i class="fas fa-wallet me-1"></i> Net Worth
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('tax.form') }}">
                    <i class="fas fa-file-invoice-dollar me-1"></i> Tax Estimator
                </a>
            </li>
        </ul>

        <!-- Calculator Form -->
        <div class="calculator-card">
            <h5><i class="fas fa-calculator me-2"></i>Tax Estimator Calculator</h5>
            
            <form method="POST" action="{{ route('tax.estimate') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="filing_status" class="form-label fw-medium">Filing Status</label>
                            <select name="filing_status" id="filing_status" class="form-select" required>
                                <option value="">-- Select Status --</option>
                                <option value="single" {{ old('filing_status', $filingStatus ?? '') === 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ old('filing_status', $filingStatus ?? '') === 'married' ? 'selected' : '' }}>Married Filing Jointly</option>
                                <option value="head" {{ old('filing_status', $filingStatus ?? '') === 'head' ? 'selected' : '' }}>Head of Household</option>
                                <option value="separate" {{ old('filing_status', $filingStatus ?? '') === 'separate' ? 'selected' : '' }}>Married Filing Separately</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Annual Income ($)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" step="0.01" name="income" class="form-control" required value="{{ old('income', $income ?? '') }}" placeholder="e.g. 75000">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-medium">State or Province</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" name="region" class="form-control" required value="{{ old('region', $region ?? '') }}" placeholder="e.g. CA, ON">
                            </div>
                            <div class="form-text">Enter state code (US) or province code (Canada)</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Country</label>
                            <select name="country" class="form-select" required>
                                <option value="US" {{ old('country', $country ?? '') === 'US' ? 'selected' : '' }}>United States</option>
                                <option value="CA" {{ old('country', $country ?? '') === 'CA' ? 'selected' : '' }}>Canada</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-calculator me-2"></i>Estimate Tax
                    </button>
                    <button type="reset" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-redo me-2"></i>Reset
                    </button>
                </div>
            </form>
            
            <!-- Results Section (shown conditionally) -->
            @isset($totalTax)
            <div class="mt-4 p-4 results-card rounded">
                <h5 class="mb-3 text-primary"><i class="fas fa-chart-pie me-2"></i>Estimated Tax Summary</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="mb-2">Federal Tax</h6>
                                <h4 class="mb-0 text-primary">${{ number_format($estimatedFederal, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="mb-2">State/Province Tax</h6>
                                <h4 class="mb-0 text-primary">${{ number_format($estimatedState, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="mb-2">Total Tax</h6>
                                <h4 class="mb-0 text-primary">${{ number_format($totalTax, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-light mt-3 mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    This is an estimate only. Tax rates and brackets may change. Consult with a tax professional for accurate advice.
                </div>
            </div>
            @endisset
        </div>
        
        <div class="mt-4 text-center footer">
            <p>© {{ date('Y') }} Financial Calculators. All calculations are estimates only.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>