<!DOCTYPE html>
<html>
<head>
    <title>Student Loan Refinance Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Student Loan Refinance Calculator</h2>

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
                    <p>This calculator helps you determine if refinancing your student loan would save money based on your current loan rate, proposed new rate, and loan term.</p>
                    <p>It estimates new monthly payments and total interest savings compared to your current loan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('student.refi.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Loan Balance ($)</label>
            <input type="number" step="0.01" name="loan_balance" class="form-control" required value="{{ old('loan_balance', $loan_balance ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Current Interest Rate (%)</label>
            <input type="number" step="0.01" name="old_rate" class="form-control" required value="{{ old('old_rate', $old_rate ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">New Interest Rate (%)</label>
            <input type="number" step="0.01" name="new_rate" class="form-control" required value="{{ old('new_rate', $new_rate ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Term (Years)</label>
            <input type="number" name="term" class="form-control" required value="{{ old('term', $term ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>

    @isset($savings)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Refinance Summary</h4>
            <p><strong>Old Monthly Payment:</strong> ${{ number_format($oldMonthlyPayment, 2) }}</p>
            <p><strong>New Monthly Payment:</strong> ${{ number_format($newMonthlyPayment, 2) }}</p>
            <p><strong>Total Savings Over Term:</strong> ${{ number_format($savings, 2) }}</p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
