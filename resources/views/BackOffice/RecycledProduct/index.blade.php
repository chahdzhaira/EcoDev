<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS, and PUG.js. It's fully customizable and modular.">
    <title>Recycled Products - EcoCycle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-box"></i> Recycled Products for {{ $salesCenter->name }}</h1>
                <p>Manage the recycled products available at this sales center.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Recycled Products</a></li>
            </ul>
        </div>
  
        <div class="d-flex justify-content-between mb-3">
    <a href="{{ route('recycledProducts.download', $salesCenter->id) }}" class="btn btn-secondary">
        <i class="bi bi-file-earmark-pdf"></i> Generate PDF
    </a>
    <a href="{{ route('recycledProducts.statistics', $salesCenter->id) }}" class="btn btn-info">
        <i class="bi bi-bar-chart-line"></i> View Price Statistics
    </a>
        <a href="{{ route('BackOffice.RecycledProduct.create', $salesCenter->id) }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add New Product
            </a>
        </div>

        <form method="GET" action="{{ route('BackOffice.RecycledProduct.index', $salesCenter->id) }}" class="mb-4 d-flex justify-content-center" id="searchForm">
    <div class="row w-100 justify-content-center">
        <!-- Search Section -->
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="input-group shadow-sm">
            <span class="input-group-text bg-success text-white"><i class="fas fa-search"></i></span>
            <input type="text" name="searchQuery" class="form-control border-0" placeholder="Search by Name or Description" value="{{ request('searchQuery') }}" id="searchInput">
            </div>
        </div>

        <!-- Sort Section -->
        <div class="col-md-4 mb-3">
            <select name="sortBy" class="form-select shadow-sm border-0" id="sortSelect">
                <option value="" disabled {{ request('sortBy') ? '' : 'selected' }}>Sort By</option>
                <option value="name" {{ request('sortBy') === 'name' ? 'selected' : '' }}>Name</option>
                <option value="quantity" {{ request('sortBy') === 'quantity' ? 'selected' : '' }}>Quantity</option>
                <option value="price" {{ request('sortBy') === 'price' ? 'selected' : '' }}>Price</option>
                <option value="created_at" {{ request('sortBy') === 'created_at' ? 'selected' : '' }}>Date Added</option>
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
   <!-- Back Button -->
   <div class="mb-3">
            <a href="{{ route('salesCenters.index') }}" class="btn btn-light">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <div class="row">
        @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Recycled Products</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recycledProducts as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @else
                        <img src="{{ asset('images/' . $product->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif    </td>                                    </td>                                   
                                    <td>{{ $product->quantity }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>
                                    <a href="{{ route('BackOffice.RecycledProduct.show', [$salesCenter->id, $product->id]) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('BackOffice.RecycledProduct.edit', [$salesCenter->id, $product->id]) }}" class="btn btn-sm btn-warning">
                                       <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('BackOffice.RecycledProduct.destroy', [$salesCenter->id, $product->id]) }}" method="POST" style="display:inline;">
                                      @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No recycled products available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                   
                    <!-- Pagination -->
                 <!-- Pagination -->
                 <div class="col-lg-12 d-flex justify-content-center">
                        <div class="bs-component">
                            <ul class="pagination">
                                <li class="page-item {{ $recycledProducts->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $recycledProducts->previousPageUrl() }}">«</a>
                                </li>
                                @for ($i = 1; $i <= $recycledProducts->lastPage(); $i++)
                                    <li class="page-item {{ $recycledProducts->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $recycledProducts->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ $recycledProducts->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $recycledProducts->nextPageUrl() }}">»</a>
                                </li>
                            </ul>
                        </div>
                   </div>
                    <!-- End Pagination -->
                </div>
            </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
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
