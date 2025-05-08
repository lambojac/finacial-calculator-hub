@extends('layouts.home')

@section('main')
<div class="calculator-page-container">
    <div class="container">
        <!-- Calculator Info Section (where profile pic was) -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="calculator-icon bg-light rounded-circle p-3 me-3">
                                <i class="bi @yield('calculator-icon') fs-3"></i>
                            </div>
                            <div>
                                <h2 class="mb-1">@yield('calculator-title')</h2>
                                <p class="text-muted mb-0">@yield('calculator-description')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calculator Form and Results -->
        <div class="row">
            <!-- Calculator Form -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Calculator</h5>
                    </div>
                    <div class="card-body">
                        @yield('calculator-form')
                    </div>
                </div>
            </div>
            
            <!-- Results Section -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Results</h5>
                    </div>
                    <div class="card-body" id="calculator-results">
                        @yield('calculator-results')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .calculator-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .text-purple {
        color: #844AFF;
    }
    
    .text-pink {
        color: #FF66B2;
    }
    
    .text-orange {
        color: #FF9940;
    }
    
    /* Additional styles for calculator inputs */
    .form-control:focus {
        border-color: #3751ff;
        box-shadow: 0 0 0 0.25rem rgba(55, 81, 255, 0.25);
    }
    
    .btn-primary {
        background-color: #3751ff;
        border-color: #3751ff;
    }
    
    .btn-primary:hover {
        background-color: #2a41dd;
        border-color: #2a41dd;
    }
    
    /* Range slider styling */
    .range-slider {
        width: 100%;
    }
    
    /* Result styling */
    .result-highlight {
        font-size: 24px;
        font-weight: bold;
        color: #3751ff;
    }
    
    .result-card {
        border-left: 4px solid #3751ff;
    }
</style>
@endpush

@push('scripts')
<script>
    // Common calculator functions can go here
    function formatCurrency(amount) {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(amount);
    }
    
    function formatNumber(number, decimals = 0) {
        return new Intl.NumberFormat('en-US', { 
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals 
        }).format(number);
    }
    
    function formatPercent(number, decimals = 2) {
        return new Intl.NumberFormat('en-US', { 
            style: 'percent',
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals 
        }).format(number/100);
    }
    
    // Custom scripts from specific calculators
    @yield('calculator-scripts')
</script>
@endpush

