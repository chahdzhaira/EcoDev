<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archived Distributions</title>
    @vite(['resources/assets/css/main.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .app-title {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .status-completed {
            color: #28a745; /* green */
        }
        .status-pending {
            color: #ffc107; /* yellow */
        }
        .status-failed {
            color: #dc3545; /* red */
        }
        .pdf-button {
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('dashboard') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="container mt-4">
            <div class="app-title">
                <h1><i class="bi bi-trash"></i> Archived Distributions</h1>
                <p>View the historical record of archived waste distributions</p>
            </div>

            <!-- Back to Dashboard Button -->
            <div class="mb-3">
                <a href="{{ route('indexBack') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>

            <!-- Back to Distributions List Button -->
            <div class="mb-3">
                <a href="{{ route('distributions.index') }}" class="btn btn-secondary">Back to Distributions List</a>
            </div>

            <!-- Search Form -->
            <div class="mb-4">
                <form method="GET" action="{{ route('distributions.archived') }}" class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for a waste..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <!-- Table displaying archived distributions -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Waste</th>
                                <th>Quantity Distributed</th>
                                <th>Status</th>
                                <th>Recycling Center</th>
                                <th>Delivery Agency</th>
                                <th>Date</th>
                                <th>Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivedDistributions as $distribution)
                                <tr>
                                    <td>{{ $distribution->waste->category }}</td>
                                    <td>{{ $distribution->quantity_to_distribute }}</td>
                                    <td class="{{ $distribution->status === 'Completed' ? 'status-completed' : ($distribution->status === 'Pending' ? 'status-pending' : 'status-failed') }}">
                                        {{ $distribution->status }}
                                    </td>
                                    <td>{{ $distribution->recyclingCenter->name ?? 'Undefined' }}</td>
                                    <td>{{ $distribution->deliveryAgence->name ?? 'Undefined' }}</td>
                                    <td>{{ $distribution->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <!-- Unarchive button -->
                                        <form action="{{ route('distributions.unarchive', $distribution->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">Unarchive</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Links -->
            <div class="mt-3">
                {{ $archivedDistributions->appends(request()->all())->links() }}
            </div>
        </div>
    </main>

    <!-- Scripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main.js'])
</body>
</html>
