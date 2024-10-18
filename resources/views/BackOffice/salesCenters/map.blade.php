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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
            margin-top: 20px;
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
        <div class="app-title">
            <div>
                <h1><i class="bi bi-cart"></i> Your Sale Center Location</h1>
                <p>Discover location of your sales centers for recycled products.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Sales Centers location</a></li>
            </ul>
        </div>

        <!-- Add the map section here -->
        <div class="container">
            <h2>{{ $center->name }}</h2>
            <div class="mb-3">
            <a href="{{ route('salesCenters.index') }}" class="btn btn-light">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
            <div id="map"></div>
        </div>
        

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            // Function to initialize the map with address
            function initializeMap(address) {
                // Fetch latitude and longitude from Nominatim API
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            // Get the first result's latitude and longitude
                            const lat = data[0].lat;
                            const lon = data[0].lon;

                            // Initialize the map centered on the retrieved coordinates
                            const map = L.map('map').setView([lat, lon], 15);

                            // Add OpenStreetMap tiles
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);

                            // Add a marker for the center
                            L.marker([lat, lon]).addTo(map)
                                .bindPopup(`<strong>${address}</strong>`).openPopup();
                        } else {
                            alert("Location not found.");
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching location:", error);
                        alert("Failed to fetch location.");
                    });
            }

            // Call the function with the center's address
            initializeMap('{{ $center->address }}');
        </script>
    </main>
</body>
</html>
