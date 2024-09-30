<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centres de Recyclage</title>
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
                <h1><i class="bi bi-recycle"></i> Centres de Recyclage</h1>
                <p>Gestion des centres de recyclage</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="#">Centres de Recyclage</a></li>
            </ul>
        </div>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Barre de recherche et bouton de retour -->
        <div class="row mb-4">
            <div class="col-md-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Retour au Dashboard</a>
            </div>
            <div class="col-md-4 text-end">
                <form action="{{ route('recycling_centers.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un centre..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('recycling_centers.create') }}" class="btn btn-primary">Créer un nouveau centre</a>
            </div>
        </div>

        <!-- Dropdown for sorting -->
        <div class="row mb-4">
            <div class="col-md-4 offset-md-8 text-end">
                <form action="{{ route('recycling_centers.index') }}" method="GET" class="d-inline">
                    <select name="sort_by" class="form-select d-inline-block" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Trier par</option>
                        <option value="opening_hours" {{ request('sort_by') === 'opening_hours' ? 'selected' : '' }}>Heures d'ouverture</option>
                        <option value="address" {{ request('sort_by') === 'address' ? 'selected' : '' }}>Adresse</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                </form>
            </div>
        </div>

        <!-- Tableau des centres de recyclage -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Nom du responsable</th>
                                    <th>Ouverture</th>
                                    <th>Fermeture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recyclingCenters as $centre)
                                    <tr>
                                        <td>{{ $centre->name }}</td>
                                        <td>{{ $centre->address }}</td>
                                        <td>{{ $centre->phoneNumber }}</td>
                                        <td>{{ $centre->email }}</td>
                                        <td>{{ $centre->manager_name }}</td>
                                        <td>{{ $centre->opening_hours }}</td>
                                        <td>{{ $centre->closing_hours }}</td>
                                        <td>
                                            <a href="{{ route('recycling_centers.edit', $centre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                            <form action="{{ route('recycling_centers.destroy', $centre->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce centre de recyclage ?');">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Aucun centre de recyclage trouvé.</td>
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
                        <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $recyclingCenters->previousPageUrl() }}">Précédent</a></li>
                    @endif

                    @if ($recyclingCenters->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $recyclingCenters->nextPageUrl() }}">Suivant</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Suivant</span></li>
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
