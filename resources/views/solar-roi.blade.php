<!DOCTYPE html>
<html>
<head>
    <title>Solar Panel ROI Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Solar Panel ROI Calculator</h2>

    <!-- Modal Trigger -->
    <button class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#infoModal">
        What does this calculator do?
    </button>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About This Calculator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>This calculator estimates your potential return on investment (ROI) from installing rooftop solar panels. It calculates how many years it will take to break even and your expected profit over 25 years after rebates and electricity savings.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('solar.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">System Cost ($)</label>
            <input type="number" name="system_cost" step="0.01" class="form-control" required value="{{ old('system_cost', $systemCost ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">kWh per Year</label>
            <input type="number" name="kwh_per_year" step="1" class="form-control" required value="{{ old('kwh_per_year', $kwhPerYear ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Rate per kWh ($)</label>
            <input type="number" name="rate_per_kwh" step="0.01" class="form-control" required value="{{ old('rate_per_kwh', $ratePerKwh ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Rebate (%)</label>
            <input type="number" name="rebate" step="0.1" class="form-control" required value="{{ old('rebate', $rebate ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calculate ROI</button>
    </form>

    @isset($paybackYears)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Results</h4>
            <p><strong>System Cost after Rebate:</strong> ${{ number_format($rebatedCost, 2) }}</p>
            <p><strong>Annual Savings:</strong> ${{ number_format($annualSavings, 2) }}</p>
            <p><strong>Payback Period:</strong> {{ $paybackYears }} years</p>
            <p><strong>Estimated 25-Year Profit:</strong> <span class="text-success">${{ number_format($profit25Years, 2) }}</span></p>
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
