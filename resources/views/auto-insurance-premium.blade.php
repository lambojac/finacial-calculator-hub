<!DOCTYPE html>
<html>
<head>
    <title>Auto Insurance Premium Estimator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Auto Insurance Premium Estimator</h2>

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
                    <p>This calculator provides a rough estimate of your annual auto insurance premium based on your age, location, vehicle value, and desired coverage level.</p>
                    <p>It uses simplified assumptions and may vary from actual quotes offered by insurance providers.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('auto.estimate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" min="16" max="100" required value="{{ old('age', $age ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">State</label>
            <input type="text" name="state" class="form-control" required value="{{ old('state', $state ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Value ($)</label>
            <input type="number" name="vehicle_value" class="form-control" required value="{{ old('vehicle_value', $vehicleValue ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Coverage Level</label>
            <select name="coverage_level" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="basic" {{ old('coverage_level', $coverageLevel ?? '') === 'basic' ? 'selected' : '' }}>Basic</option>
                <option value="standard" {{ old('coverage_level', $coverageLevel ?? '') === 'standard' ? 'selected' : '' }}>Standard</option>
                <option value="full" {{ old('coverage_level', $coverageLevel ?? '') === 'full' ? 'selected' : '' }}>Full</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Estimate Premium</button>
    </form>

    @isset($estimatedLow)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Estimated Annual Premium Range</h4>
            <p><strong>Low Estimate:</strong> ${{ number_format($estimatedLow, 2) }}</p>
            <p><strong>High Estimate:</strong> ${{ number_format($estimatedHigh, 2) }}</p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
