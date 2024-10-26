<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Agencies - Vali Admin</title>
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .container {
            background: #f8f9fa; /* Fond gris clair pour le conteneur */
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
            margin: 30px auto;
            max-width: 2000px;
        }
        .table {
            background-color: #f0f0f0; /* Fond gris clair pour la table */
            width: 100%; /* Assure que la table prend toute la largeur */
        }
        .table img {
            width: 100px; /* Largeur fixe pour toutes les images */
            height: 100px; /* Hauteur fixe pour toutes les images */
            object-fit: cover; /* Couvre le conteneur sans déformer l'image */
            border-radius: 5px; /* Coins arrondis pour un meilleur style */
        }
        a {
            color: blue; /* Couleur du lien */
            text-decoration: underline; /* Souligné pour indiquer qu'il s'agit d'un lien */
            cursor: pointer; /* Change le curseur pour indiquer que c'est cliquable */
        }
        a:hover {
            color: darkblue; /* Couleur au survol */
        }
        #map {
            height: 500px; /* Hauteur de la carte dans la modale */
            width: 400px; /* Largeur de la carte */
        }
    </style>
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
    @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-archive"></i> Delivery Agencies</h1>
                <p>Manage Delivery Agencies</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Agencies</li>
                <li class="breadcrumb-item"><a href="#">Delivery Agencies</a></li>
            </ul>
        </div>

        <div class="container">
            <h1>List of Delivery Agencies</h1>
            <div class="mb-4"></div> <!-- Ajout d'une marge avec Bootstrap -->

            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap"> 
                <div class="d-flex flex-grow-1">
                    <!-- Formulaire de recherche -->
                    <form method="GET" action="{{ route('delivery-agences.index') }}" class="d-flex">
                        <div class="input-group flex-grow-1" style="max-width: 250px;"> <!-- Réduction de la largeur -->
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search agencies..." value="{{ request('search') }}" style="height: 38px;"> <!-- Ajustement de la hauteur -->
                            <button type="submit" class=" btn btn-primary btn-sm" style="height: 38px;">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>

                    <!-- Formulaire de tri -->
                    <form method="GET" action="{{ route('delivery-agences.index') }}" class="d-flex ms-2 align-items-center"> <!-- Assurez-vous que l'action pointe vers la bonne route -->
                        <select name="sort_by" id="sort_by" class="form-select form-select-sm me-2" style="max-width: 150px; height: 38px;"> <!-- Réduction de la largeur et de la hauteur -->
                            <option value="">Select</option>
                            <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Name</option>
                            <option value="address" {{ request('sort_by') === 'address' ? 'selected' : '' }}>Address</option> <!-- Ajout du tri par adresse -->
                            <!-- Ajoutez d'autres critères de tri si nécessaire -->
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm" style="height: 38px; padding: 0 10px;">
                            <i class="bi bi-sort-down"></i> Sort
                        </button>
                    </form>
                </div>

                <a href="{{ route('delivery-agences.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Delivery Agency
                </a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Opening Hours</th>
                        <th>Closing Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agences as $agence)
                        <tr>
                            <td>
                                @if($agence->image)
                                    <img src="{{ asset($agence->image) }}" alt="{{ $agence->name }}">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $agence->name }}</td>
                            <!-- <td>{{ $agence->address }}</td> -->
                            <td>
                                <a href="#" class="address-link" data-bs-toggle="modal" data-bs-target="#mapModal" onclick="showLocation('{{ $agence->address }}')">
                                    {{ $agence->address }}
                                </a>
                            </td>
                            <td>{{ $agence->phoneNumber }}</td>
                            <td>{{ $agence->opening_hours }}</td>
                            <td>{{ $agence->closing_hours }}</td>
                            <td>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <div class="d-flex justify-content-start align-items-center">
        <!-- Bouton pour afficher les services spéciaux -->
        <a href="{{ route('delivery-agences.services', $agence->id) }}" class="btn btn-primary custom-btn me-2">Services</a>
        
        <a href="{{ route('delivery-agences.edit', $agence->id) }}" class="btn btn-warning me-2" title="Edit">
            <i class="fas fa-edit"></i>
        </a>
        
        <form action="{{ route('delivery-agences.destroy', $agence->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" title="Delete">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $agences->links('pagination::bootstrap-5') !!}
            </div>

            <div class="modal fade modal-lg" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- Utilisez modal-lg pour une modale plus grande -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mapModalLabel">Map</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="map" style="height: 500px; width: 100%; border: none;"></div> <!-- Ajustez la hauteur et la largeur -->
                        </div>
                    </div>
                </div>
            </div>

            <script src ="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                let map; // Variable globale pour la carte
    let marker; // Variable pour le marqueur

    async function geocodeAddress(address) {
        const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json&addressdetails=1`);
        const data = await response.json();
        return data.length > 0 ? data[0] : null;
    }

    async function showLocation(address) {
        const location = await geocodeAddress(address);
        if (location) {
            const lat = location.lat;
            const lon = location.lon;

            // Afficher la modale
            $('#mapModal').modal('show');

            // Si la carte n'existe pas encore, initialisez-la
            if (!map) {
                map = L.map('map').setView([lat, lon], 13); // Ajustez le niveau de zoom

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            } else {
                // Si la carte existe déjà, réinitialisez sa vue
                map.setView([lat, lon], 13);
            }

            // Si le marqueur existe déjà, le retirer
            if (marker) {
                map.removeLayer(marker);
            }

            // Ajouter un nouveau marqueur à la carte
            marker = L.marker([lat, lon]).addTo(map).bindPopup(`Adresse: ${address}`).openPopup();
        } else {
            alert('Adresse introuvable.');
        }
    }
            </script>
        </div>

    </main>

    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])

    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
</body>
</html>