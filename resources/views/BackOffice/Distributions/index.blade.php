<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribution History</title>
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
        .btn-sm {
            margin-right: 5px;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="container mt-4">
            <div class="app-title">
                <h1><i class="bi bi-trash"></i> Distribution History</h1>
                <p>View the distribution history of waste items</p>
            </div>

            <!-- Back to Dashboard Button -->
            <div class="mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>

            <!-- Search Form -->
            <div class="mb-4">
                <form method="GET" action="{{ route('distributions.index') }}" class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for a waste item..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <!-- Dropdown for Sorting -->
            <div class="mb-4 text-end">
                <form action="{{ route('distributions.index') }}" method="GET" class="d-inline">
                    <select name="sort_by" class="form-select d-inline-block" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Sort by</option>
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date</option>
                        <option value="category" {{ request('sort_by') === 'category' ? 'selected' : '' }}>Waste Item</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                </form>
            </div>

            <div class="mb-3">
                <a href="{{ route('distributions.archived') }}" class="btn btn-secondary">View Archives</a>
            </div>
            <a href="{{ route('distributions.stats') }}" class="btn btn-info">Voir statistiques </a>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>
                                    <a href="{{ route('distributions.index', array_merge(request()->all(), ['sort_by' => 'category', 'sortDirection' => request('sortDirection', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">
                                        Waste Item
                                        @if(request('sort_by') === 'category')
                                            <i class="bi bi-arrow-{{ request('sortDirection') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Distributed Quantity</th>
                                <th>Status</th>
                                <th>Recycling Center</th>
                                <th>Delivery Agency</th>
                                <th>
                                    <a href="{{ route('distributions.index', array_merge(request()->all(), ['sort_by' => 'created_at', 'sortDirection' => request('sortDirection', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">
                                        Date
                                        @if(request('sort_by') === 'created_at')
                                            <i class="bi bi-arrow-{{ request('sortDirection') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wastes as $waste)
                                @if($waste->distributions->isNotEmpty())
                                    @foreach($waste->distributions as $distribution)
                                        @if(!$distribution->is_archived) <!-- Exclure les distributions archivées -->
                                            <tr>
                                                <td>{{ $waste->category }}</td>
                                                <td>{{ $distribution->quantity_to_distribute }}</td>
                                                <td class="{{ $distribution->status === 'Completed' ? 'status-completed' : ($distribution->status === 'Pending' ? 'status-pending' : 'status-failed') }}">
                                                    {{ $distribution->status }}
                                                </td>
                                                <td>{{ $distribution->recyclingCenter->name ?? 'Not defined' }}</td>
                                                <td>{{ $distribution->deliveryAgence->name ?? 'Not defined' }}</td>
                                                <td>{{ $distribution->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <form action="{{ route('distributions.archive', $distribution->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to archive this distribution?');">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-warning btn-sm">Archive</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">No distribution found for the waste item {{ $waste->category }}.</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $wastes->appends(request()->all())->links() }}
            </div>
        </div>
    </main>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main.js'])
</body>
</html>