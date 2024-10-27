<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Distribution</title>
    @vite(['resources/assets/css/main.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <main class="app-content">
        <div class="container mt-4">
            <div class="app-title">
                <h1><i class="bi bi-pencil"></i> Edit Distribution</h1>
                <p>Modify the details of the distribution.</p>
            </div>

            <!-- Back to Distribution History Button -->
            <div class="mb-3">
                <a href="{{ route('distributions.index') }}" class="btn btn-primary">Back to Distribution History</a>
            </div>

            <!-- Edit Form -->
            <form action="{{ route('distributions.update', $distribution->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="quantity" class="form-label">Distributed Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity_to_distribute" value="{{ old('quantity_to_distribute', $distribution->quantity_to_distribute) }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Completed" {{ $distribution->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Pending" {{ $distribution->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Failed" {{ $distribution->status === 'Failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update Distribution</button>
                </div>
            </form>
        </div>
    </main>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main.js'])
</body>
</html>
