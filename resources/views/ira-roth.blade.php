<!DOCTYPE html>
<html>
<head>
    <title>IRA vs Roth IRA Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>IRA vs Roth IRA Calculator</h2>

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
                    <p>This tool compares the future after-tax value of a Traditional IRA vs. a Roth IRA based on your age, contribution, estimated return, and expected tax timing. Use it to determine which account gives you more retirement value.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('ira.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" required value="{{ old('age', $age ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Contribution Amount ($)</label>
            <input type="number" name="contribution" step="0.01" class="form-control" required value="{{ old('contribution', $contribution ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Annual Return Rate (%)</label>
            <input type="number" name="rate" step="0.1" class="form-control" required value="{{ old('rate', $rate ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tax Timing Preference</label>
            <select name="tax_type" class="form-select" required>
                <option value="now" {{ (old('tax_type', $tax_type ?? '') == 'now') ? 'selected' : '' }}>Pay tax now (Roth)</option>
                <option value="future" {{ (old('tax_type', $tax_type ?? '') == 'future') ? 'selected' : '' }}>Pay tax at withdrawal (Traditional)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Compare</button>
    </form>

    @isset($afterTaxValue)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Results</h4>
            <p><strong>Future Value:</strong> ${{ $futureValue }}</p>
            <p><strong>After-Tax Value:</strong> ${{ $afterTaxValue }}</p>
            <p><strong>Better Option:</strong> {{ $method }}</p>
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
