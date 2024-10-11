<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS, and PUG.js. It's fully customizable and modular.">
    <meta property="og:title" content="Sales Centers List">
    <title>Sales Centers List</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
     <!-- Font Awesome 5 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-cart"></i> Sales Centers List</h1>
                <p>Discover sales centers for recycled products and start your sustainable journey here.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Sales Centers List</a></li>
            </ul>
        </div>
        
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('salesCenters.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create New Center
            </a>
        </div>

<!-- Adjusted Search Form centered and with appropriate width -->

<form method="GET" action="{{ route('salesCenters.index') }}" class="mb-4 d-flex justify-content-center" id="searchForm">
    <div class="row w-100 justify-content-center">
        <!-- Search Section -->
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-success text-white"><i class="fas fa-search"></i></span>
                <input type="text" name="searchQuery" class="form-control border-0" placeholder="Search by Name, Address, or Phone Number" value="{{ request('searchQuery') }}" id="searchInput">
            </div>
        </div>

        <!-- Sort Section -->
        <div class="col-md-4 mb-3">
            <select name="sortBy" class="form-select shadow-sm border-0" id="sortSelect">
                <option value="" disabled {{ request('sortBy') ? '' : 'selected' }}>Sort By</option>
                <option value="name" {{ request('sortBy') === 'name' ? 'selected' : '' }}>Name</option>
                <option value="address" {{ request('sortBy') === 'address' ? 'selected' : '' }}>Address</option>
                <option value="phoneNumber" {{ request('sortBy') === 'phoneNumber' ? 'selected' : '' }}>Phone Number</option>
                <option value="opening_hours" {{ request('sortBy') === 'opening_hours' ? 'selected' : '' }}>Opening Hours</option>
            </select>
        </div>
    </div>
</form>

<script>
    // Automatically submit the form when the sorting option is changed
    document.getElementById('sortSelect').addEventListener('change', function() {
        document.getElementById('searchForm').submit();
    });
    
    // Submit the form when the search input changes only if it contains a full word
    document.getElementById('searchInput').addEventListener('input', function() {
        const inputValue = this.value.trim();
        
        // Check if the input contains a full word (minimum of 3 characters)
        if (inputValue.length >= 10 && inputValue.split(' ').length > 0) { // Change 3 to the desired minimum length
            document.getElementById('searchForm').submit();
        }
    });
</script>





        <div class="row">
            @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Sales Centers</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Image</th>
                                    <th>Opening Hours</th>
                                    <th>Closing Hours</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($salesCenters as $center)
                                <tr>
                                    <td>{{ $loop->iteration + ($salesCenters->currentPage() - 1) * $salesCenters->perPage() }}</td>
                                    <td><a href="{{ route('BackOffice.RecycledProduct.index', $center->id) }}">{{ $center->name }}</a></td>
                                    <td>{{ $center->address }}</td>
                                    <td>{{ $center->phoneNumber }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $center->image) }}" alt="{{ $center->name }}" width="100">
                                    </td>
                                    <td>{{ $center->opening_hours }}</td>
                                    <td>{{ $center->closing_hours }}</td>
                                    <td>
                                        <a href="{{ route('salesCenters.edit', $center->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('salesCenters.destroy', $center->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this center?');">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No sales centers available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                   <!-- Pagination -->
                   <div class="col-lg-12 d-flex justify-content-center">
                        <div class="bs-component">
                            <ul class="pagination">
                                <li class="page-item {{ $salesCenters->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $salesCenters->previousPageUrl() }}">«</a>
                                </li>
                                @for ($i = 1; $i <= $salesCenters->lastPage(); $i++)
                                    <li class="page-item {{ $salesCenters->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $salesCenters->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $salesCenters->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $salesCenters->nextPageUrl() }}">»</a>
                                </li>
                            </ul>
                        </div>
                   </div>
                   <!-- End Pagination -->
                </div>
            </div>
        </div>
    </main>
    @vite(['resources/assets/js/jquery-3.7.0.min.js', 'resources/assets/js/bootstrap.min.js', 'resources/assets/js/main - Back.js'])

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alert = document.getElementById('successAlert');
            if (alert) {
                setTimeout(function() {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(function() {
                        alert.remove();
                    }, 1000); 
                }, 3000); 
            }
        });
    </script>
</body>
</html>
