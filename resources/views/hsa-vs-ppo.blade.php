<!DOCTYPE html>
<html>
<head>
    <title>HSA vs PPO Break Even Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>HSA vs PPO Break Even Calculator</h2>

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
                    <p>This calculator helps you estimate the total annual cost of a health plan based on its monthly premium and potential out-of-pocket maximum.</p>
                    <p>It helps compare HSA vs PPO options to identify the more cost-effective plan, depending on your expected usage.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('hsa.calculate') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Annual Deductible ($)</label>
            <input type="number" name="deductible" class="form-control" required value="{{ old('deductible', $deductible ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Monthly Premium ($)</label>
            <input type="number" name="premium" class="form-control" required value="{{ old('premium', $premium ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Out-of-Pocket Maximum ($)</label>
            <input type="number" name="oop_max" class="form-control" required value="{{ old('oop_max', $oopMax ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Compare</button>
    </form>

    @isset($estimatedAnnualCost)
        <div class="mt-4 bg-white p-4 shadow rounded">
            <h4>Estimated Total Annual Cost</h4>
            <p><strong>Premiums + Max Out-of-Pocket:</strong> ${{ number_format($estimatedAnnualCost, 2) }}</p>
        </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
