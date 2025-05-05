<!DOCTYPE html>
<html>
<head>
    <title>Income Tax Estimator (US/CA)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Income Tax Estimator (US/CA)</h2>

    <!-- Modal Button -->
    <button class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#explainerModal">
        What does this calculator do?
    </button>

    <!-- Modal -->
    <div class="modal fade" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About the Tax Estimator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>This tool provides a quick estimate of your federal and state/province income tax liability for the United States or Canada.</p>
                    <p>Enter your filing status, income, and your region (e.g., California or Ontario) to preview your tax burden.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('tax.estimate') }}">
        @csrf
        <div class="mb-3">
            <label for="filing_status" class="form-label">Filing Status</label>
            <select name="filing_status" class="form-control" required>
                <option value="">-- Select Status --</option>
                <option value="single" {{ old('filing_status', $filingStatus ?? '') === 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('filing_status', $filingStatus ?? '') === 'married' ? 'selected' : '' }}>Married</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Income ($)</label>
            <input type="number" step="0.01" name="income" class="form-control" required value="{{ old('income', $income ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">State or Province (e.g., CA, ON)</label>
            <input type="text" name="region" class="form-control" required value="{{ old('region', $region ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Estimate Tax</button>
    </form>

    @isset($totalTax)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Estimated Tax Summary</h4>
            <p><strong>Federal Tax:</strong> ${{ number_format($estimatedFederal, 2) }}</p>
            <p><strong>State/Province Tax:</strong> ${{ number_format($estimatedState, 2) }}</p>
            <p><strong>Total Estimated Tax:</strong> ${{ number_format($totalTax, 2) }}</p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
