<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de distribution</title>
    <!-- Main CSS from the admin template -->
    @vite(['resources/assets/css/main.css'])
    <!-- Bootstrap Icons and Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
                <h1><i class="bi bi-truck"></i> Formulaire de distribution</h1>
                <p>Veuillez sélectionner l'agence de livraison et le centre de recyclage pour les déchets</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="#">Formulaire de distribution</a></li>
            </ul>
        </div>

        <div class="container mt-4">
            <form action="{{ route('waste.distribute') }}" method="POST">
                @csrf

                @foreach ($selectedWastes as $waste)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>Déchet ID: {{ $waste->id }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- Sélection de l'agence de livraison -->
                                <label for="delivery_agency_{{ $waste->id }}">Agence de livraison :</label>
                                <select name="delivery_agency[{{ $waste->id }}]" id="delivery_agency_{{ $waste->id }}" class="form-control">
                                    @foreach($deliveryAgencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>

                                <!-- Sélection du centre de recyclage -->
                                <label for="recycling_center_{{ $waste->id }}" class="mt-2">Centre de recyclage :</label>
                                <select name="recycling_center[{{ $waste->id }}]" id="recycling_center_{{ $waste->id }}" class="form-control">
                                    @foreach($recyclingCenters as $center)
                                        <option value="{{ $center->id }}">{{ $center->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Bouton pour soumettre le formulaire -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Confirmer la distribution</button>
                    <a href="{{ route('wastes.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Essential JavaScripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
