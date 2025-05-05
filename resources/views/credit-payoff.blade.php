<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Payoff Calculator</title>
    <style>
        :root {
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --success-color: #10b981;
            --error-color: #ef4444;
            --text-color: #1f2937;
            --light-bg: #f9fafb;
            --border-color: #e5e7eb;
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
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
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
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .results h2 {
            color: var(--success-color);
            font-size: 1.25rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .result-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .result-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .result-label {
            font-weight: 500;
        }
        
        .result-value {
            font-weight: 600;
        }
        
        @media (max-width: 640px) {
            .container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Credit Card Payoff Calculator</h1>
        </div>
        
        <div class="form-container">
            <form method="POST" action="">
                @csrf
                
                @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                    <div class="error-item">{{ $error }}</div>
                    @endforeach
                </div>
                @endif
                
                <div class="form-group">
                    <label for="balance">Current Balance:</label>
                    <div class="input-group">
                        <input type="number" id="balance" name="balance" step="0.01" min="0" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="apr">Annual Percentage Rate (APR):</label>
                    <div class="input-group percent-group">
                        <input type="number" id="apr" name="apr" step="0.01" min="0" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="payment">Monthly Payment:</label>
                    <div class="input-group">
                        <input type="number" id="payment" name="payment" step="0.01" min="0" required>
                    </div>
                </div>
                
                <button type="submit">Calculate Payoff</button>
            </form>
            
            @if (isset($months_to_zero))
            <div class="results">
                <h2>Results</h2>
                <div class="result-item">
                    <span class="result-label">Months to Payoff:</span>
                    <span class="result-value">{{ $months_to_zero }} months</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Total Interest Paid:</span>
                    <span class="result-value">${{ number_format($total_interest, 2) }}</span>
                </div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>