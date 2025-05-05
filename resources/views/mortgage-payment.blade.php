@extends('layouts.app')

@section('title', 'Mortgage Payment Calculator')
@section('description', 'Calculate your monthly mortgage payment and view your complete amortization schedule')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0">Mortgage Payment Calculator</h1>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">Calculate your monthly mortgage payment and see a complete breakdown of your loan amortization.</p>
                    
                    <form id="mortgage-calculator-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="loan_amount" class="form-label">Loan Amount ($)</label>
                                <input type="number" class="form-control" id="loan_amount" name="loan_amount" min="1" value="250000" required>
                                <div class="invalid-feedback" id="loan_amount_error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rate" class="form-label">Interest Rate (%)</label>
                                <input type="number" class="form-control" id="rate" name="rate" min="0.01" step="0.01" value="4.5" required>
                                <div class="invalid-feedback" id="rate_error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="years" class="form-label">Loan Term (Years)</label>
                                <select class="form-select" id="years" name="years" required>
                                    @for ($i = 1; $i <= 30; $i++)
                                        <option value="{{ $i }}" {{ $i == 30 ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Year' : 'Years' }}</option>
                                    @endfor
                                </select>
                                <div class="invalid-feedback" id="years_error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d') }}" required>
                                <div class="invalid-feedback" id="start_date_error"></div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Calculate Payment</button>
                        </div>
                    </form>
                    
                    <!-- Results Section (Hidden initially) -->
                    <div id="results-section" class="mt-5" style="display: none;">
                        <div class="alert alert-success p-4">
                            <div class="row text-center">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <h5>Monthly Payment</h5>
                                    <h2 class="text-primary">$<span id="monthly-payment">0</span></h2>
                                </div>
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <h5>Total Interest</h5>
                                    <h3>$<span id="total-interest">0</span></h3>
                                </div>
                                <div class="col-md-4">
                                    <h5>Total Cost</h5>
                                    <h3>$<span id="total-cost">0</span></h3>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Amortization Chart -->
                        <div class="mt-5">
                            <h4 class="mb-3">Amortization Breakdown</h4>
                            <div class="chart-container" style="position: relative; height:300px;">
                                <canvas id="amortization-chart"></canvas>
                            </div>
                        </div>
                        
                        <!-- Amortization Table -->
                        <div class="mt-5">
                            <h4 class="mb-3">Amortization Schedule</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Payment</th>
                                            <th>Principal</th>
                                            <th>Interest</th>
                                            <th>Remaining Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody id="amortization-table">
                                        <!-- Populated by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('mortgage-calculator-form');
        const resultsSection = document.getElementById('results-section');
        let amortizationChart = null;
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset validation errors
            form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
            form.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
            
            // Get form data
            const formData = new FormData(form);
            
            // Client-side validation
            let isValid = true;
            
            const loanAmount = parseFloat(formData.get('loan_amount'));
            if (isNaN(loanAmount) || loanAmount <= 0) {
                document.getElementById('loan_amount').classList.add('is-invalid');
                document.getElementById('loan_amount_error').textContent = 'Please enter a valid loan amount';
                isValid = false;
            }
            
            const rate = parseFloat(formData.get('rate'));
            if (isNaN(rate) || rate <= 0 || rate > 100) {
                document.getElementById('rate').classList.add('is-invalid');
                document.getElementById('rate_error').textContent = 'Please enter a valid interest rate between 0.01 and 100';
                isValid = false;
            }
            
            if (!isValid) return;
            
            // Send AJAX request
            fetch('/tools/mortgage-payment/calculate', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(JSON.stringify(data));
                    });
                }
                return response.json();
            })
            .then(data => {
                // Display results
                resultsSection.style.display = 'block';
                
                // Update summary values
                document.getElementById('monthly-payment').textContent = data.monthlyPayment.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('total-interest').textContent = data.totalInterest.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('total-cost').textContent = data.totalCost.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                
                // Create amortization table
                const tableBody = document.getElementById('amortization-table');
                tableBody.innerHTML = '';
                
                data.schedule.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${row.month}</td>
                        <td>${row.date}</td>
                        <td>$${row.payment.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td>$${row.principal.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td>$${row.interest.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td>$${row.balance.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                    `;
                    tableBody.appendChild(tr);
                });
                
                // Create amortization chart
                createAmortizationChart(data.schedule);
                
                // Scroll to results
                resultsSection.scrollIntoView({ behavior: 'smooth' });
            })
            .catch(error => {
                try {
                    const errorData = JSON.parse(error.message);
                    
                    if (errorData.errors) {
                        // Display validation errors
                        Object.keys(errorData.errors).forEach(field => {
                            const inputElement = document.getElementById(field);
                            const errorElement = document.getElementById(`${field}_error`);
                            
                            if (inputElement && errorElement) {
                                inputElement.classList.add('is-invalid');
                                errorElement.textContent = errorData.errors[field][0];
                            }
                        });
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                } catch (e) {
                    alert('An error occurred. Please try again.');
                    console.error(error);
                }
            });
        });
        
        function createAmortizationChart(schedule) {
            const ctx = document.getElementById('amortization-chart').getContext('2d');
            
            const labels = schedule.map(row => row.date);
            const principalData = schedule.map(row => row.principal);
            const interestData = schedule.map(row => row.interest);
            
            if (amortizationChart) {
                amortizationChart.destroy();
            }
            
            amortizationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Principal',
                            data: principalData,
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Interest',
                            data: interestData,
                            backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Principal vs Interest Payments'
                        },
                        tooltip: {
                            mode: 'index',
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += '$' + context.raw.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString('en-US');
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endsection