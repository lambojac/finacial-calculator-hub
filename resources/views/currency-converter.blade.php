<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Live Currency Converter</h2>

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
                    <p>This live currency converter fetches real-time exchange rates to convert any amount between international currencies using the latest foreign exchange data.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('currency.convert') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required value="{{ old('amount', $amount ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">From Currency (e.g. USD)</label>
            <input type="text" name="from_currency" class="form-control text-uppercase" required value="{{ old('from_currency', $from ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">To Currency (e.g. EUR)</label>
            <input type="text" name="to_currency" class="form-control text-uppercase" required value="{{ old('to_currency', $to ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Convert</button>
    </form>

    @isset($converted)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Conversion Result</h4>
            <p><strong>Rate:</strong> 1 {{ $from }} = {{ number_format($rate, 4) }} {{ $to }}</p>
            <p><strong>Converted Amount:</strong> {{ number_format($converted, 2) }} {{ $to }}</p>
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
