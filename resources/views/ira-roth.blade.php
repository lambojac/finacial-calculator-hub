<!DOCTYPE html>
<html lang="en">
<head>
    <title>IRA vs Roth IRA Calculator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --success: #0bb4aa;
            --dark: #2b2d42;
            --light: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            position: relative;
            overflow-x: hidden;
        }
        
        .canvas-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.05;
        }
        
        .calculator-container {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }
        
        .calculator-container:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }
        
        .description-box {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .description-box::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.2;
        }
        
        .calculator-title {
            text-align: center;
            margin-bottom: 1rem;
            color: var(--dark);
            font-weight: 700;
            font-size: 2.2rem;
        }
        
        .ira-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        @media (max-width: 768px) {
            .ira-form {
                grid-template-columns: 1fr;
            }
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d9e6;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .input-group-text {
            background-color: #e9ecef;
            border-radius: 8px 0 0 8px;
            border: 1px solid #d1d9e6;
            border-right: none;
        }
        
        .input-group .form-control {
            border-radius: 0 8px 8px 0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(67, 97, 238, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(67, 97, 238, 0.3);
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary) 100%);
        }
        
        .results-container {
            background: linear-gradient(135deg, #ffffff 0%, #f5f7fa 100%);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }
        
        .results-container.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .results-title {
            color: var(--dark);
            margin-bottom: 1.5rem;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }
        
        .results-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }
        
        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .result-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }
        
        .result-item:last-child {
            margin-bottom: 0;
        }
        
        .result-label {
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }
        
        .result-value {
            font-weight: 700;
            color: var(--primary);
            margin: 0;
            font-size: 1.1rem;
        }
        
        .better-option {
            background: linear-gradient(135deg, var(--success) 0%, #4cc9f0 100%);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
            text-align: center;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(11, 180, 170, 0.2);
        }
        
        .chart-container {
            margin-top: 2rem;
            height: 300px;
            position: relative;
        }
        
        .info-icon {
            color: var(--primary);
            margin-left: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .info-icon:hover {
            color: var(--secondary);
            transform: scale(1.1);
        }
        
        .tooltip-container {
            position: absolute;
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 250px;
            z-index: 10;
            display: none;
            border-left: 4px solid var(--primary);
        }
        
        .tooltip-container.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .range-slider {
            width: 100%;
            margin-top: 0.5rem;
        }
        
        .range-values {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .card-tab {
            border-radius: 8px;
            border: 1px solid #d1d9e6;
            padding: 1rem;
            margin-bottom: 1rem;
            background: white;
            transition: all 0.3s ease;
        }
        
        .card-tab.active {
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.1);
        }
        
        .card-tab-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        
        .card-tab-title {
            font-weight: 600;
            margin: 0;
        }
        
        .card-tab-content {
            padding-top: 1rem;
            display: none;
        }
        
        .card-tab-content.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>

<body>
    <canvas class="canvas-container" id="backgroundCanvas"></canvas>
    
    <div class="container-fluid">
        <div class="calculator-container">
            <h1 class="calculator-title">IRA vs Roth IRA Calculator</h1>
            
            <div class="description-box">
                <h4><i class="fas fa-info-circle me-2"></i>What does this calculator do?</h4>
                <p class="mb-0">This interactive tool compares the future after-tax value of a Traditional IRA vs. a Roth IRA based on your age, contribution amount, estimated return rate, and expected tax timing. Use it to determine which retirement account type gives you more value in retirement based on your specific financial situation.</p>
            </div>
            
            <form method="POST" action="{{ route('ira.calculate') }}" class="ira-form" id="calculatorForm">
                @csrf
                <div class="left-section">
                    <div class="form-group">
                        <label class="form-label">
                            Current Age
                            <span class="info-icon" data-tooltip="Enter your current age. This helps calculate how many years your investment will grow until retirement.">
                                <i class="fas fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="number" name="age" id="age" class="form-control" required value="{{ old('age', $age ?? 30) }}" min="18" max="80">
                        </div>
                        <input type="range" class="form-range range-slider" min="18" max="80" value="{{ old('age', $age ?? 30) }}" id="ageRange">
                        <div class="range-values">
                            <span>18</span>
                            <span>80</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            Annual Return Rate (%)
                            <span class="info-icon" data-tooltip="The estimated annual return rate on your investments. The historical average for a diversified portfolio is around 7-10%.">
                                <i class="fas fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
                            <input type="number" name="rate" id="rate" step="0.1" class="form-control" required value="{{ old('rate', $rate ?? 7) }}" min="0" max="20">
                            <span class="input-group-text">%</span>
                        </div>
                        <input type="range" class="form-range range-slider" min="0" max="20" step="0.1" value="{{ old('rate', $rate ?? 7) }}" id="rateRange">
                        <div class="range-values">
                            <span>0%</span>
                            <span>20%</span>
                        </div>
                    </div>
                </div>
                
                <div class="right-section">
                    <div class="form-group">
                        <label class="form-label">
                            Contribution Amount ($)
                            <span class="info-icon" data-tooltip="The amount you plan to contribute. For 2025, the maximum IRA contribution is $7,000 ($8,000 if age 50 or older).">
                                <i class="fas fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            <input type="number" name="contribution" id="contribution" step="100" class="form-control" required value="{{ old('contribution', $contribution ?? 6000) }}" min="100" max="10000">
                        </div>
                        <input type="range" class="form-range range-slider" min="100" max="10000" step="100" value="{{ old('contribution', $contribution ?? 6000) }}" id="contributionRange">
                        <div class="range-values">
                            <span>$100</span>
                            <span>$10,000</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            Current vs. Future Tax Rate
                            <span class="info-icon" data-tooltip="Select whether you expect your tax rate to be higher now or in retirement. This is a key factor in deciding between Traditional and Roth IRAs.">
                                <i class="fas fa-question-circle"></i>
                            </span>
                        </label>
                        <div class="card-tabs">
                            <div class="card-tab active" data-value="now">
                                <div class="card-tab-header">
                                    <h5 class="card-tab-title"><i class="fas fa-shield-alt me-2"></i>Roth IRA</h5>
                                    <span class="badge bg-primary">Pay taxes now</span>
                                </div>
                                <div class="card-tab-content show">
                                    <p class="text-muted">Best if you expect to be in a higher tax bracket in retirement. Contributions are made with after-tax dollars, but withdrawals are tax-free.</p>
                                </div>
                            </div>
                            <div class="card-tab" data-value="future">
                                <div class="card-tab-header">
                                    <h5 class="card-tab-title"><i class="fas fa-hourglass-half me-2"></i>Traditional IRA</h5>
                                    <span class="badge bg-secondary">Pay taxes later</span>
                                </div>
                                <div class="card-tab-content">
                                    <p class="text-muted">Best if you expect to be in a lower tax bracket in retirement. Contributions may be tax-deductible now, but withdrawals are taxed as ordinary income.</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="tax_type" id="taxType" value="{{ old('tax_type', $tax_type ?? 'now') }}">
                    </div>
                </div>
                
                <div class="text-center mt-4" style="grid-column: span 2;">
                    <button type="submit" class="btn btn-primary btn-lg" id="calculateBtn">
                        <i class="fas fa-calculator me-2"></i>Calculate Results
                    </button>
                </div>
            </form>
            
            <div class="results-container" id="resultsContainer">
                <h3 class="results-title">Calculation Results</h3>
                
                <div class="result-item">
                    <p class="result-label">Future Value (Pre-Tax):</p>
                    <p class="result-value" id="futureValue">${{ $futureValue ?? '0' }}</p>
                </div>
                
                <div class="result-item">
                    <p class="result-label">After-Tax Value:</p>
                    <p class="result-value" id="afterTaxValue">${{ $afterTaxValue ?? '0' }}</p>
                </div>
                
                <div class="better-option" id="betterOption">
                    <i class="fas fa-award me-2"></i>Better Option: <span id="methodText">{{ $method ?? 'Calculate to see results' }}</span>
                </div>
                
                <div class="chart-container" id="chartContainer">
                    <!-- Chart will be inserted here by JavaScript -->
                </div>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="tooltip-container" id="tooltipContainer">
                <p class="tooltip-text" id="tooltipText"></p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        // Background animation
        (function() {
            const canvas = document.getElementById('backgroundCanvas');
            const ctx = canvas.getContext('2d');
            let particles = [];
            const particleCount = 50;
            
            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            
            function createParticles() {
                particles = [];
                for (let i = 0; i < particleCount; i++) {
                    particles.push({
                        x: Math.random() * canvas.width,
                        y: Math.random() * canvas.height,
                        radius: Math.random() * 3 + 1,
                        color: `rgba(67, 97, 238, ${Math.random() * 0.5 + 0.1})`,
                        speedX: Math.random() * 0.5 - 0.25,
                        speedY: Math.random() * 0.5 - 0.25
                    });
                }
            }
            
            function drawParticles() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                particles.forEach(particle => {
                    ctx.beginPath();
                    ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
                    ctx.fillStyle = particle.color;
                    ctx.fill();
                    
                    // Update position
                    particle.x += particle.speedX;
                    particle.y += particle.speedY;
                    
                    // Bounce off walls
                    if (particle.x < 0 || particle.x > canvas.width) {
                        particle.speedX = -particle.speedX;
                    }
                    
                    if (particle.y < 0 || particle.y > canvas.height) {
                        particle.speedY = -particle.speedY;
                    }
                });
                
                // Draw connecting lines
                particles.forEach((particleA, indexA) => {
                    particles.slice(indexA + 1).forEach(particleB => {
                        const dx = particleA.x - particleB.x;
                        const dy = particleA.y - particleB.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (distance < 100) {
                            ctx.beginPath();
                            ctx.moveTo(particleA.x, particleA.y);
                            ctx.lineTo(particleB.x, particleB.y);
                            ctx.strokeStyle = `rgba(67, 97, 238, ${0.1 * (1 - distance / 100)})`;
                            ctx.lineWidth = 0.5;
                            ctx.stroke();
                        }
                    });
                });
                
                requestAnimationFrame(drawParticles);
            }
            
            resizeCanvas();
            createParticles();
            drawParticles();
            
            window.addEventListener('resize', () => {
                resizeCanvas();
                createParticles();
            });
        })();
        
        // Form interaction and calculator functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Show results container if results exist
            const resultsContainer = document.getElementById('resultsContainer');
            const futureValue = document.getElementById('futureValue');
            if (futureValue && futureValue.textContent !== '$0') {
                resultsContainer.classList.add('show');
                renderChart();
            }
            
            // Range slider synchronization
            const ageInput = document.getElementById('age');
            const ageRange = document.getElementById('ageRange');
            const rateInput = document.getElementById('rate');
            const rateRange = document.getElementById('rateRange');
            const contributionInput = document.getElementById('contribution');
            const contributionRange = document.getElementById('contributionRange');
            
            ageInput.addEventListener('input', () => {
                ageRange.value = ageInput.value;
            });
            
            ageRange.addEventListener('input', () => {
                ageInput.value = ageRange.value;
            });
            
            rateInput.addEventListener('input', () => {
                rateRange.value = rateInput.value;
            });
            
            rateRange.addEventListener('input', () => {
                rateInput.value = rateRange.value;
            });
            
            contributionInput.addEventListener('input', () => {
                contributionRange.value = contributionInput.value;
            });
            
            contributionRange.addEventListener('input', () => {
                contributionInput.value = contributionRange.value;
            });
            
            // Card tabs functionality
            const cardTabs = document.querySelectorAll('.card-tab');
            const taxTypeInput = document.getElementById('taxType');
            
            cardTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    cardTabs.forEach(t => {
                        t.classList.remove('active');
                        t.querySelector('.card-tab-content').classList.remove('show');
                    });
                    
                    tab.classList.add('active');
                    tab.querySelector('.card-tab-content').classList.add('show');
                    taxTypeInput.value = tab.dataset.value;
                });
            });
            
            // Set active tab based on hidden input value
            const activeTaxType = taxTypeInput.value;
            cardTabs.forEach(tab => {
                if (tab.dataset.value === activeTaxType) {
                    tab.classList.add('active');
                    tab.querySelector('.card-tab-content').classList.add('show');
                } else {
                    tab.classList.remove('active');
                    tab.querySelector('.card-tab-content').classList.remove('show');
                }
            });
            
            // Tooltips
            const tooltipTriggers = document.querySelectorAll('.info-icon');
            const tooltipContainer = document.getElementById('tooltipContainer');
            const tooltipText = document.getElementById('tooltipText');
            
            tooltipTriggers.forEach(trigger => {
                trigger.addEventListener('mouseenter', (e) => {
                    const tooltip = trigger.dataset.tooltip;
                    tooltipText.textContent = tooltip;
                    
                    // Position tooltip
                    const rect = trigger.getBoundingClientRect();
                    tooltipContainer.style.top = `${rect.top - tooltipContainer.offsetHeight - 10}px`;
                    tooltipContainer.style.left = `${rect.left - (tooltipContainer.offsetWidth / 2) + (trigger.offsetWidth / 2)}px`;
                    
                    tooltipContainer.classList.add('show');
                });
                
                trigger.addEventListener('mouseleave', () => {
                    tooltipContainer.classList.remove('show');
                });
            });
            
            // Client-side calculation function (for demo purposes)
            function calculateIRA() {
                const age = parseInt(ageInput.value);
                const contribution = parseFloat(contributionInput.value);
                const rate = parseFloat(rateInput.value) / 100;
                const taxType = taxTypeInput.value;
                
                // Assuming retirement age is 65 for calculation
                const years = 65 - age;
                
                // Simple future value calculation: FV = P * (1 + r)^n
                const futureValue = contribution * Math.pow(1 + rate, years);
                
                // For demo purposes, assume:
                // - Current tax rate: 25%
                // - Retirement tax rate: 20%
                const currentTaxRate = 0.25;
                const retirementTaxRate = 0.20;
                
                let afterTaxValue, method;
                
                if (taxType === 'now') {
                    // Roth IRA: Pay taxes now (no taxes at withdrawal)
                    afterTaxValue = futureValue;
                    method = "Roth IRA";
                } else {
                    // Traditional IRA: Pay taxes at withdrawal
                    afterTaxValue = futureValue * (1 - retirementTaxRate);
                    method = "Traditional IRA";
                }