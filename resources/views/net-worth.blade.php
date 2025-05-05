<!DOCTYPE html>
<html>
<head>
    <title>Net Worth Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Net Worth Tracker</h2>

    <!-- Explainer Modal Trigger -->
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
                    <p>This net worth tracker helps you calculate your total financial worth by subtracting liabilities from the sum of your assets. Just enter a comma-separated list of your assets and the total amount of your debts.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('networth.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Assets (comma-separated amounts)</label>
            <input type="text" name="assets_list" class="form-control" required value="{{ old('assets_list', $assetsInput ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Total Liabilities ($)</label>
            <input type="number" step="0.01" name="liabilities" class="form-control" required value="{{ old('liabilities', $liabilities ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calculate Net Worth</button>
    </form>

    @isset($netWorth)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Results</h4>
            <p><strong>Total Assets:</strong> ${{ number_format($totalAssets, 2) }}</p>
            <p><strong>Liabilities:</strong> ${{ number_format($liabilities, 2) }}</p>
            <p><strong>Net Worth:</strong> <span class="{{ $netWorth >= 0 ? 'text-success' : 'text-danger' }}">
                ${{ number_format($netWorth, 2) }}</span>
            </p>
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
