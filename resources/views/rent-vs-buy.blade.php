<!DOCTYPE html>
<html>
<head>
    <title>Rent vs Buy Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Rent vs Buy Calculator</h2>

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
                    <p>This calculator helps compare the total 5-year cost of renting a home versus buying one, considering rent payments and typical homeownership costs like interest, maintenance, and property taxes.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('rentvsbuy.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Monthly Rent ($)</label>
            <input type="number" step="0.01" name="monthly_rent" class="form-control" required value="{{ old('monthly_rent', $monthly_rent ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Home Price ($)</label>
            <input type="number" step="0.01" name="home_price" class="form-control" required value="{{ old('home_price', $home_price ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Mortgage Rate (%)</label>
            <input type="number" step="0.01" name="rate" class="form-control" required value="{{ old('rate', $rate ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Number of Years</label>
            <input type="number" name="years" class="form-control" required value="{{ old('years', $years ?? 5) }}">
        </div>
        <button type="submit" class="btn btn-primary">Compare</button>
    </form>

    @isset($difference)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>5-Year Cost Comparison</h4>
            <p><strong>Total Rent Cost:</strong> ${{ number_format($totalRent, 2) }}</p>
            <p><strong>Total Buy Cost:</strong> ${{ number_format($totalBuy, 2) }}</p>
            <p><strong>Difference:</strong> 
                @if($difference > 0)
                    Renting is cheaper by ${{ number_format($difference, 2) }}
                @else
                    Buying is cheaper by ${{ number_format(abs($difference), 2) }}
                @endif
            </p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
