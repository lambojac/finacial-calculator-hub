<!DOCTYPE html>
<html>
<head>
    <title>Home Affordability Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Home Affordability Calculator</h2>

    <!-- Modal Trigger -->
    <button class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#explainerModal">
        What does this calculator do?
    </button>

    <!-- Modal -->
    <div class="modal fade" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About This Tool</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>This calculator estimates the maximum home price you can afford based on your income, existing debts, down payment, and mortgage rate.</p>
                    <p>It uses a 28% front-end debt-to-income ratio to determine affordability.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('home.affordability.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Annual Income ($)</label>
            <input type="number" step="0.01" name="income" class="form-control" required value="{{ old('income', $income ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Monthly Debts ($)</label>
            <input type="number" step="0.01" name="debts" class="form-control" required value="{{ old('debts', $debts ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Down Payment ($)</label>
            <input type="number" step="0.01" name="down_payment" class="form-control" required value="{{ old('down_payment', $down_payment ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Mortgage Interest Rate (%)</label>
            <input type="number" step="0.01" name="rate" class="form-control" required value="{{ old('rate', $rate ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>

    @isset($maxHomePrice)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Estimated Home Affordability</h4>
            <p><strong>Maximum Affordable Home Price:</strong> ${{ number_format($maxHomePrice, 2) }}</p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
