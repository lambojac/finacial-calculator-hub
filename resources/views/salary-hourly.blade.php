<!DOCTYPE html>
<html>
<head>
    <title>Salary ↔ Hourly Converter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Salary ↔ Hourly Pay Converter</h2>

    <!-- Explainer Modal Button -->
    <button class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#explainerModal">
        What does this calculator do?
    </button>

    <!-- Explainer Modal -->
    <div class="modal fade" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About the Salary ↔ Hourly Converter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This tool converts between annual salary and hourly wage based on your weekly working hours.</p>
                    <p>Enter either your annual salary or hourly rate (not both), plus your hours per week to get the equivalent pay format.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('salary.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Annual Salary ($)</label>
            <input type="number" step="0.01" name="annual_salary" class="form-control" value="{{ old('annual_salary', $annual_salary ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Hourly Rate ($)</label>
            <input type="number" step="0.01" name="hourly_rate" class="form-control" value="{{ old('hourly_rate', $hourly_rate ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Hours Per Week</label>
            <input type="number" step="0.1" name="hours_per_week" class="form-control" required value="{{ old('hours_per_week', $hours_per_week ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Convert</button>
    </form>

    @if (isset($result))
        <div class="mt-4 p-4 bg-white shadow rounded">
            <h4>Result</h4>
            @if (isset($result['error']))
                <div class="text-danger">{{ $result['error'] }}</div>
            @endif
            @if (isset($result['hourly']))
                <p><strong>Equivalent Hourly Rate:</strong> ${{ number_format($result['hourly'], 2) }}/hr</p>
            @endif
            @if (isset($result['annual']))
                <p><strong>Equivalent Annual Salary:</strong> ${{ number_format($result['annual'], 2) }}</p>
            @endif
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
