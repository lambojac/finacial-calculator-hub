
@extends('layouts.app')

@section('content')
<div class="financial-calculator-container">
    <!-- Header Section -->
    <div class="header-section bg-primary text-white p-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold mb-0">ViGamer.com</h1>
                    <p class="mb-0">Financial Calculator Hub</p>
                </div>
                <div class="navigation">
                    <a href="#" class="text-white me-3">Home</a>
                    <a href="#" class="text-white me-3">About</a>
                    <a href="#" class="text-white">Contact</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Financial Calculators Section -->
    <div class="calculator-section py-4">
        <div class="container">
            <h2 class="mb-4 border-bottom pb-2">Financial Calculators</h2>
            
            <div class="row g-4">
                <!-- Mortgage Payment -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-house-door text-primary fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Mortgage Payment</h5>
                            </div>
                            <p class="card-text text-muted">Show homeowners what their mortgage costs per month.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Mortgage Refinance Savings -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-currency-dollar text-success fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Mortgage Refinance Savings</h5>
                            </div>
                            <p class="card-text text-muted">Helps decide if refinancing is worth it.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Auto-Loan Payment -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-car-front text-danger fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Auto-Loan Payment</h5>
                            </div>
                            <p class="card-text text-muted">Forecast car loan costs.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Personal-Loan APR -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-percent text-purple fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Personal-Loan APR</h5>
                            </div>
                            <p class="card-text text-muted">Reveals effective cost of unsecured loans.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Credit-Card Payoff -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-credit-card text-warning fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Credit-Card Payoff</h5>
                            </div>
                            <p class="card-text text-muted">Show timeline to clear credit debt.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Compound-Interest -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-graph-up-arrow text-info fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Compound-Interest</h5>
                            </div>
                            <p class="card-text text-muted">Visualize investment growth.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- 401k Retirement Gap -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-piggy-bank text-dark fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">401k Retirement Gap</h5>
                            </div>
                            <p class="card-text text-muted">Shows if savings meet retirement goal.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Salary — Hourly -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-clock text-secondary fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Salary — Hourly</h5>
                            </div>
                            <p class="card-text text-muted">Convert pay formats with deductions.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Income-Tax Estimator -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-file-earmark-text text-pink fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Income-Tax Estimator (US/CA)</h5>
                            </div>
                            <p class="card-text text-muted">Quick federal + state income tax preview.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Auto-Insurance Premium -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-shield-check text-info fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Auto-Insurance Premium</h5>
                            </div>
                            <p class="card-text text-muted">Rough quote for car insurance.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Life-Insurance Needs -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-heart text-danger fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Life-Insurance Needs</h5>
                            </div>
                            <p class="card-text text-muted">Calculates optimal life policy size.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- HSA vs PPO Break-Even -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-hospital text-success fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">HSA vs PPO Break-Even</h5>
                            </div>
                            <p class="card-text text-muted">Decide between health plans.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Student-Loan Refinance -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-mortarboard text-primary fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Student-Loan Refinance</h5>
                            </div>
                            <p class="card-text text-muted">Check benefit of refinancing student debt.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Home Affordability -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-house text-info fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Home Affordability</h5>
                            </div>
                            <p class="card-text text-muted">Shows buyers their budget ceiling.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Rent vs Buy -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-houses text-warning fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Rent vs Buy</h5>
                            </div>
                            <p class="card-text text-muted">Compare renting to owning.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>

                <!-- Live Currency Converter -->
                <div class="col-md-3">
                    <div class="card h-100 calculator-card border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="calculator-icon bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-currency-exchange text-primary fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0">Live Currency Converter</h5>
                            </div>
                            <p class="card-text text-muted">Real-time FX via open API.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="#" class="btn btn-dark w-100">Launch Calculator</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-primary {
        background-color: #3751ff !important;
    }
    
    .text-purple {
        color: #844AFF;
    }
    
    .text-pink {
        color: #FF66B2;
    }
    
    .calculator-card {
        transition: all 0.3s ease;
    }
    
    .calculator-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .calculator-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-dark {
        background-color: #1e2430;
    }
    
    .btn-dark:hover {
        background-color: #2c3446;
    }
</style>
@endpush
