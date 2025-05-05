<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViGamer.com - Financial Calculator Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .calculator-card {
            transition: all 0.3s ease;
        }
        .calculator-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">ViGamer.com</h1>
                    <p class="text-blue-200">Financial Calculator Hub</p>
                </div>
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="#" class="text-white hover:text-blue-200">Home</a></li>
                        <li><a href="#" class="text-white hover:text-blue-200">About</a></li>
                        <li><a href="#" class="text-white hover:text-blue-200">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <section class="mb-10">
            <h2 class="text-2xl font-bold mb-6">Financial Calculators</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="calculator-grid">
                <!-- Calculator cards will be dynamically inserted here -->
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold mb-4">ViGamer.com</h3>
                    <p>Your one-stop financial calculator resource</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-300 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-blue-300 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-blue-300 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-blue-300 hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center">
                <p>&copy; 2025 ViGamer.com - All rights reserved</p>
            </div>
        </div>
    </footer>

    <script>
        // Mock data for calculators - this would be fetched from the backend
        const calculators = [
            {
                id: 1,
                slug: "mortgage-payment",
                name: "Mortgage Payment",
                description: "Show homeowners what their mortgage costs per month.",
                icon: "fas fa-home",
                color: "blue"
            },
            {
                id: 2,
                slug: "refinance-savings",
                name: "Mortgage Refinance Savings",
                description: "Helps decide if refinancing is worth it.",
                icon: "fas fa-dollar-sign",
                color: "green"
            },
            {
                id: 3,
                slug: "auto-loan",
                name: "Auto-Loan Payment",
                description: "Forecast car loan costs.",
                icon: "fas fa-car",
                color: "red"
            },
            {
                id: 4,
                slug: "personal-loan-apr",
                name: "Personal-Loan APR",
                description: "Reveals effective cost of unsecured loans.",
                icon: "fas fa-percentage",
                color: "purple"
            },
            {
                id: 5,
                slug: "credit-payoff",
                name: "Credit-Card Payoff",
                description: "Show timeline to clear credit debt.",
                icon: "fas fa-credit-card",
                color: "yellow"
            },
            {
                id: 6,
                slug: "compound-growth",
                name: "Compound-Interest",
                description: "Visualise investment growth.",
                icon: "fas fa-chart-line",
                color: "indigo"
            },
            {
                id: 7,
                slug: "retirement-gap",
                name: "401k Retirement Gap",
                description: "Shows if savings meet retirement goal.",
                icon: "fas fa-umbrella-beach",
                color: "teal"
            },
            {
                id: 8,
                slug: "salary-hourly",
                name: "Salary ↔ Hourly",
                description: "Convert pay formats with deductions.",
                icon: "fas fa-exchange-alt",
                color: "orange"
            },
            {
                id: 9,
                slug: "tax-estimator",
                name: "Income-Tax Estimator (US/CA)",
                description: "Quick federal + state income-tax preview.",
                icon: "fas fa-file-invoice-dollar",
                color: "pink"
            },
            {
                id: 10,
                slug: "auto-insurance-premium",
                name: "Auto-Insurance Premium",
                description: "Rough quote for car insurance.",
                icon: "fas fa-shield-alt",
                color: "blue"
            },
            {
                id: 11,
                slug: "life-insurance-needs",
                name: "Life-Insurance Needs",
                description: "Calculates optimal life-policy size.",
                icon: "fas fa-heartbeat",
                color: "red"
            },
            {
                id: 12,
                slug: "hsa-vs-ppo",
                name: "HSA vs PPO Break-Even",
                description: "Decide between health plans.",
                icon: "fas fa-hospital",
                color: "green"
            },
            {
                id: 13,
                slug: "student-refi",
                name: "Student-Loan Refinance",
                description: "Check benefit of refinancing student debt.",
                icon: "fas fa-graduation-cap",
                color: "indigo"
            },
            {
                id: 14,
                slug: "home-affordability",
                name: "Home Affordability",
                description: "Shows buyers their budget ceiling.",
                icon: "fas fa-home",
                color: "purple"
            },
            {
                id: 15,
                slug: "rent-vs-buy",
                name: "Rent vs Buy",
                description: "Compare renting to owning.",
                icon: "fas fa-balance-scale",
                color: "yellow"
            },
            {
                id: 16,
                slug: "currency-converter",
                name: "Live Currency Converter",
                description: "Real-time FX via open API.",
                icon: "fas fa-globe",
                color: "teal"
            },
            {
                id: 17,
                slug: "net-worth",
                name: "Net-Worth Tracker",
                description: "One-page balance-sheet calculator.",
                icon: "fas fa-chart-pie",
                color: "orange"
            },
            {
                id: 18,
                slug: "solar-roi",
                name: "Solar Panel ROI",
                description: "Estimate savings from rooftop solar.",
                icon: "fas fa-solar-panel",
                color: "green"
            },
            {
                id: 19,
                slug: "dti-ratio",
                name: "Debt-to-Income Ratio",
                description: "Key metric for loan pre-qualification.",
                icon: "fas fa-balance-scale-left",
                color: "red"
            },
            {
                id: 20,
                slug: "ira-roth",
                name: "IRA vs Roth IRA",
                description: "Determine better retirement account type.",
                icon: "fas fa-piggy-bank",
                color: "blue"
            }
        ];

        // Function to get color classes based on the color name
        function getColorClasses(color) {
            const colorMap = {
                blue: {
                    bg: "bg-blue-100",
                    border: "border-blue-500",
                    text: "text-blue-700",
                    icon: "text-blue-500"
                },
                green: {
                    bg: "bg-green-100",
                    border: "border-green-500",
                    text: "text-green-700",
                    icon: "text-green-500"
                },
                red: {
                    bg: "bg-red-100",
                    border: "border-red-500",
                    text: "text-red-700",
                    icon: "text-red-500"
                },
                purple: {
                    bg: "bg-purple-100",
                    border: "border-purple-500",
                    text: "text-purple-700",
                    icon: "text-purple-500"
                },
                yellow: {
                    bg: "bg-yellow-100",
                    border: "border-yellow-500",
                    text: "text-yellow-700",
                    icon: "text-yellow-500"
                },
                indigo: {
                    bg: "bg-indigo-100",
                    border: "border-indigo-500",
                    text: "text-indigo-700",
                    icon: "text-indigo-500"
                },
                teal: {
                    bg: "bg-teal-100",
                    border: "border-teal-500",
                    text: "text-teal-700",
                    icon: "text-teal-500"
                },
                orange: {
                    bg: "bg-orange-100",
                    border: "border-orange-500",
                    text: "text-orange-700",
                    icon: "text-orange-500"
                },
                pink: {
                    bg: "bg-pink-100",
                    border: "border-pink-500",
                    text: "text-pink-700",
                    icon: "text-pink-500"
                }
            };

            return colorMap[color] || colorMap.blue;
        }

        // Function to create calculator cards and add them to the grid
        function renderCalculatorCards() {
            const grid = document.getElementById('calculator-grid');
            
            calculators.forEach(calculator => {
                const colorClasses = getColorClasses(calculator.color);
                
                const card = document.createElement('div');
                card.className = `calculator-card bg-white rounded-lg shadow-md overflow-hidden border-t-4 ${colorClasses.border}`;
                
                card.innerHTML = `
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="rounded-full ${colorClasses.bg} p-3 mr-4">
                                <i class="${calculator.icon} ${colorClasses.icon} text-xl"></i>
                            </div>
                            <h3 class="text-lg font-bold ${colorClasses.text}">${calculator.name}</h3>
                        </div>
                        <p class="text-gray-600 mb-6">${calculator.description}</p>
                        <a href="/tools/${calculator.slug}" class="block text-center py-2 px-4 bg-gray-800 hover:bg-gray-700 text-white rounded transition duration-300">
                            Launch Calculator
                        </a>
                    </div>
                `;
                
                grid.appendChild(card);
            });
        }

        // Function to fetch calculators from API
        function fetchCalculators() {
            
            renderCalculatorCards();
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            fetchCalculators();
        });
    </script>
</body>
</html>