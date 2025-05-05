<!DOCTYPE html>
<html>
<head>
    <title>Debt-to-Income Ratio Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Debt-to-Income Ratio Calculator</h2>

    <!-- Info Modal -->
    <button class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#infoModal">
        What does this calculator do?
    </button>

    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About This Calculator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>This tool calculates your Debt-to-Income (DTI) ratio, which is a key indicator used by lenders to assess your ability to manage monthly payments and repay debts.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('dti.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Monthly Debt Payments ($)</label>
            <input type="number" name="monthly_debt" step="0.01" class="form-control" required value="{{ old('monthly_debt', $monthlyDebt ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Gross Monthly Income ($)</label>
            <input type="number" name="gross_income" step="0.01" class="form-control" required value="{{ old('gross_income', $grossIncome ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calculate DTI</button>
    </form>

    @isset($dti)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Results</h4>
            <p><strong>DTI Ratio:</strong> {{ $dti }}%</p>
            <p><strong>Status:</strong>
                <span class="{{ $status === 'Pass' ? 'text-success' : 'text-danger' }}">
                    {{ $status }}
                </span>
            </p>
            <p><small class="text-muted">A DTI below 43% is generally considered acceptable for most lenders.</small></p>
        </div>
    @endisset

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
