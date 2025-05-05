<!DOCTYPE html>
<html>
<head>
    <title>401k Retirement Gap Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>401k Retirement Gap Calculator</h2>
    
    <!-- Explainer Modal Button -->
    <button class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#explainerModal">
        What does this calculator do?
    </button>

    <!-- Explainer Modal -->
    <div class="modal fade" id="explainerModal" tabindex="-1" aria-labelledby="explainerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About the 401k Retirement Gap Calculator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This calculator estimates whether your current 401k savings, contributions, and employer match will meet your retirement goal by age 65.</p>
                    <p>It compares your projected 401k balance to a recommended target (25× your salary) to show if there’s a gap you need to fill.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('retirement.calculate') }}">
        @csrf
        <div class="mb-3">
            <label for="age" class="form-label">Your Age</label>
            <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Annual Salary ($)</label>
            <input type="number" step="0.01" name="salary" class="form-control" value="{{ old('salary') }}" required>
        </div>
        <div class="mb-3">
            <label for="current_401k" class="form-label">Current 401k Balance ($)</label>
            <input type="number" step="0.01" name="current_401k" class="form-control" value="{{ old('current_401k') }}" required>
        </div>
        <div class="mb-3">
            <label for="contrib_percent" class="form-label">Your Contribution (%)</label>
            <input type="number" step="0.1" name="contrib_percent" class="form-control" value="{{ old('contrib_percent') }}" required>
        </div>
        <div class="mb-3">
            <label for="employer_match" class="form-label">Employer Match (%)</label>
            <input type="number" step="0.1" name="employer_match" class="form-control" value="{{ old('employer_match') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>

    @if (isset($result))
        <div class="mt-5 p-4 bg-white shadow rounded">
            <h4>Results</h4>
            <p><strong>Years Until Retirement:</strong> {{ $result['years_left'] }} years</p>
            <p><strong>Projected 401k Balance:</strong> ${{ number_format($result['future_value'], 2) }}</p>
            <p><strong>Target Retirement Balance:</strong> ${{ number_format($result['target'], 2) }}</p>
            <p>
                <strong>Gap:</strong>
                @if ($result['gap'] > 0)
                    <span class="text-danger">${{ number_format($result['gap'], 2) }} short of goal</span>
                @else
                    <span class="text-success">You are on track or ahead by ${{ number_format(abs($result['gap']), 2) }}</span>
                @endif
            </p>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
