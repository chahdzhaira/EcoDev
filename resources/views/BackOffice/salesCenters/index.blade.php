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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $center->name }}</td>
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
                </div>
            </div>
        </div>
    </main>
    @vite(['resources/assets/js/jquery-3.7.0.min.js', 'resources/assets/js/bootstrap.min.js', 'resources/assets/js/main - Back.js'])

    <script>
        // Wait for the document to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the alert exists
            const alert = document.getElementById('successAlert');
            if (alert) {
                // Set a timeout to dismiss the alert after 3 seconds
                setTimeout(function() {
                    // Remove the 'show' class to trigger the fade out effect
                    alert.classList.remove('show');
                    alert.classList.add('fade');

                    // Remove the alert from the DOM after the fade out effect
                    setTimeout(function() {
                        alert.remove();
                    }, 1000); // Wait 1 second for the fade out to complete
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>
</body>
</html>
