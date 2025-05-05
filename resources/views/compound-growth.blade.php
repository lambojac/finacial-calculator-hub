<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compound Interest Calculator</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --success-color: #10b981;
            --error-color: #ef4444;
            --text-color: #1f2937;
            --light-bg: #f9fafb;
            --border-color: #e5e7eb;
            --chart-color: rgba(75, 192, 192, 1);
            --chart-bg: rgba(75, 192, 192, 0.1);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius: 0.5rem;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-bg);
            padding: 1.5rem;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .calculator-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .form-container {
            padding: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group input {
            padding-left: 2rem;
        }
        
        .input-group:before {
            content: "$";
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        
        .percent-group:before {
            content: "%";
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        
        .percent-group input {
            padding-right: 2rem;
        }
        
        input[type="number"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 1rem;
            transition: border-color 0.15s ease-in-out;
        }
        
        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        button {
            display: block;
            width: 100%;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--radius);
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out;
        }
        
        button:hover {
            background-color: var(--primary-hover);
        }
        
        .errors {
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 4px solid var(--error-color);
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 0 var(--radius) var(--radius) 0;
        }
        
        .error-item {
            color: var(--error-color);
            margin-bottom: 0.5rem;
        }
        
        .error-item:last-child {
            margin-bottom: 0;
        }
        
        .results {
            background-color: rgba(16, 185, 129, 0.1);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .results h2 {
            color: var(--success-color);
            font-size: 1.25rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .result-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 1rem;
        }
        
        .chart-container {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .chart-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .canvas-container {
            position: relative;
            height: 300px;
        }
        
        @media (max-width: 640px) {
            .container {
                max-width: 100%;
            }
            
            .canvas-container {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calculator-card">
            <div class="header">
                <h1>Compound Interest Calculator</h1>
            </div>
            
            <div class="form-container">
                <form method="POST" action="{{ route('compound-growth.calculate') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="initial_deposit">Initial Deposit:</label>
                        <div class="input-group">
                            <input type="number" id="initial_deposit" name="initial_deposit" step="0.01" min="0" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="monthly_addition">Monthly Addition:</label>
                        <div class="input-group">
                            <input type="number" id="monthly_addition" name="monthly_addition" step="0.01" min="0" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rate">Annual Rate of Return:</label>
                        <div class="input-group percent-group">
                            <input type="number" id="rate" name="rate" step="0.01" min="0" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="years">Years to Grow:</label>
                        <input type="number" id="years" name="years" min="1" max="50" required>
                    </div>
                    
                    <button type="submit">Calculate Growth</button>
                </form>
                
                @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                    <div class="error-item">{{ $error }}</div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        
        @if (isset($future_value))
        <div class="results">
            <h2>Results</h2>
            <div class="result-value">
                Future Value after {{ $inputs['years'] }} years: ${{ number_format($future_value, 2) }}
            </div>
        </div>
        
        <div class="chart-container">
            <div class="chart-title">Investment Growth Over Time</div>
            <div class="canvas-container">
                <canvas id="growthChart"></canvas>
            </div>
        </div>
        
        <script>
            const ctx = document.getElementById('growthChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($time_periods),
                    datasets: [{
                        label: 'Investment Value ($)',
                        data: @json($values),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('en-US', { 
                                            style: 'currency', 
                                            currency: 'USD' 
                                        }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Value ($)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return new Intl.NumberFormat('en-US', { 
                                        style: 'currency', 
                                        currency: 'USD',
                                        maximumSignificantDigits: 3 
                                    }).format(value);
                                }
                            }
                        }
                    }
                }
            });
        </script>
        @endif
    </div>
</body>
</html>