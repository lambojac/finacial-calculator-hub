<!DOCTYPE html>
<html>
<head>
    <title>Life Insurance Needs Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Life Insurance Needs Calculator</h2>

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
                    <p>This tool estimates how much life insurance coverage you may need based on your annual income, existing debts, and desired college savings for your children.</p>
                    <p>It typically uses a 10x income rule plus your outstanding obligations to suggest a reasonable policy size.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('life.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Annual Income ($)</label>
            <input type="number" name="annual_income" class="form-control" required value="{{ old('annual_income', $annualIncome ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Outstanding Debts ($)</label>
            <input type="number" name="debts" class="form-control" required value="{{ old('debts', $debts ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kids’ College Fund Goal ($)</label>
            <input type="number" name="college_fund" class="form-control" required value="{{ old('college_fund', $collegeFund ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calculate Coverage</button>
    </form>

    @isset($recommendedCoverage)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Recommended Life Insurance Coverage</h4>
            <p><strong>Estimated Policy Size:</strong> ${{ number_format($recommendedCoverage, 2) }}</p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
