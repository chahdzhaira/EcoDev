<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycling Centers</title>
    <!-- Main CSS from the admin template -->
    @vite(['resources/assets/css/main.css'])
    <!-- Bootstrap Icons and Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .btn-download-pdf {
            background-color: #dc3545; /* Bootstrap red background color */
            color: white; /* Text color */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Transition effect */
        }

        .btn-download-pdf:hover {
            background-color: #c82333; /* Background color on hover */
        }

        .pdf-download-container {
            background-color: #f8f9fa; /* Light background color */
            border: 1px solid #dee2e6; /* Light border */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Internal spacing */
            margin-bottom: 20px; /* Bottom spacing */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Light shadow */
        }
        
        .pdf-download-title {
            font-size: 1.5rem; /* Title font size */
            margin-bottom: 15px; /* Bottom spacing */
        }
    </style>
</head>
<body class="app sidebar-mini">
    <!-- Navbar -->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <!-- Sidebar menu -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-recycle"></i> Recycling Centers</h1>
                <p>Management of recycling centers</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="#">Recycling Centers</a></li>
            </ul>
        </div>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Search bar and back button -->
        <div class="row mb-4">
            <div class="col-md-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            </div>
            <div class="col-md-4 text-end">
                <form action="{{ route('recycling_centers.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search for a center..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('recycling_centers.create') }}" class="btn btn-primary">Create a New Center</a>
            </div>
        </div>

        <!-- Dropdown for sorting -->
        <div class="row mb-4">
            <div class="col-md-4 offset-md-8 text-end">
                <form action="{{ route('recycling_centers.index') }}" method="GET" class="d-inline">
                    <select name="sort_by" class="form-select d-inline-block" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Sort by</option>
                        <option value="opening_hours" {{ request('sort_by') === 'opening_hours' ? 'selected' : '' }}>Opening Hours</option>
                        <option value="address" {{ request('sort_by') === 'address' ? 'selected' : '' }}>Address</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                </form>
            </div>
        </div>

        <!-- PDF download container -->
        <div class="pdf-download-container">
            <div class="pdf-download-title">Download the PDF Report of Recycling Centers</div>
            <a href="{{ route('recycling_centers.download_pdf') }}" class="btn btn-download-pdf">
                <i class="bi bi-file-earmark-pdf"></i> Download PDF
            </a>
        </div>

        <!-- Recycling centers table -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Manager Name</th>
                                    <th>Opening</th>
                                    <th>Closing</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recyclingCenters as $centre)
                                    <tr>
                                        <td>
                                            @if($centre->image)
                                                <img src="{{ asset('images/' . $centre->image) }}" alt="{{ $centre->name }}" style="width: 70px; height: auto;">
                                            @else
                                                <img src="{{ asset('images/default.png') }}" alt="Default Image" style="width: 70px; height: auto;">
                                            @endif
                                        </td>
                                        <td>{{ $centre->name }}</td>
                                        <td>{{ $centre->address }}</td>
                                        <td>{{ $centre->phoneNumber }}</td>
                                        <td>{{ $centre->email }}</td>
                                        <td>{{ $centre->manager_name }}</td>
                                        <td>{{ $centre->opening_hours }}</td>
                                        <td>{{ $centre->closing_hours }}</td>
                                        <td>
                                            <a href="{{ route('recycling_centers.edit', $centre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('recycling_centers.show', $centre->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> View</a>
                                            <form action="{{ route('recycling_centers.destroy', $centre->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this recycling center?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No recycling center found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            @if ($recyclingCenters->hasPages())
                <ul class="pagination">
                    @if ($recyclingCenters->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $recyclingCenters->previousPageUrl() }}">Previous</a></li>
                    @endif

                    @if ($recyclingCenters->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $recyclingCenters->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            @endif
        </div>
    </main>

    <!-- Essential JavaScripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
