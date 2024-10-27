<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recyclingCenter->name }} - Recycling Center</title>
    @vite(['resources/assets/css/main.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar') <!-- Sidebar included here -->

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-recycle"></i> {{ $recyclingCenter->name }}</h1>
                <p>Details of the recycling center</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('recycling_centers.index') }}">Recycling Centers</a></li>
                <li class="breadcrumb-item active">{{ $recyclingCenter->name }}</li>
            </ul>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <a href="{{ route('recycling_centers.index') }}" class="btn btn-secondary">Back to list</a>
            </div>
            <div class="col-md-4 text-end">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('recycling_centers.edit', $recyclingCenter->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('recycling_centers.destroy', $recyclingCenter->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this center?')">Delete</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <p><strong>Address:</strong> {{ $recyclingCenter->address }}</p>
                        <p><strong>Phone:</strong> {{ $recyclingCenter->phoneNumber }}</p>
                        <p><strong>Email:</strong> {{ $recyclingCenter->email }}</p>
                        <p><strong>Manager:</strong> {{ $recyclingCenter->manager_name }}</p>
                        <p><strong>Opening Hours:</strong> {{ $recyclingCenter->opening_hours }} - {{ $recyclingCenter->closing_hours }}</p>
                        
                        <div id="map"></div> <!-- Div for the map -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="app-footer">
        <div>
            <p>&copy; 2024 EcoCycle. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ $recyclingCenter->latitude ?? 0 }};
            var lng = {{ $recyclingCenter->longitude ?? 0 }};

            var map = L.map('map').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup('<strong>{{ $recyclingCenter->name }}</strong><br>{{ $recyclingCenter->address }}')
                .openPopup();
        });
    </script>
</body>
</html>
