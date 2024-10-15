<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centres de Dépôt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{route('indexBack')}}">EcoCycle</a>
    @include('BackOffice.partials.navbar')
    </header>
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <!-- Main Content -->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-building"></i> Centres de Dépôt</h1>
          <p>Gérer les centres de dépôt</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
          <li class="breadcrumb-item"><a href="#">Centres de Dépôt</a></li>
        </ul>
      </div>

              <!-- Message de succès -->
              @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Barre de recherche et bouton de retour -->
        <div class="row mb-4">
            <div class="col">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Retour au Dashboard</a>
            </div>
            <div class="col text-end">
                <form action="{{ route('depot_centers.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un centre..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                </form>
            </div>
            <div class="col text-end">
                <a href="{{ route('depot_centers.create') }}" class="btn btn-primary">Créer un nouveau centre</a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                            <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Capacité</th>
            <th>Nom du Responsable</th>
            <th>Heures d'ouverture</th>
            <th>Heures de fermeture</th>
            <th>Téléphone</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($depotCenters as $centre)
            <tr>
                <td>{{ $centre->name }}</td>
                <td>{{ $centre->address }}</td>
                <td>{{ $centre->capacity }}</td> <!-- Added capacity -->
                <td>{{ $centre->manager_name }}</td> <!-- Added manager_name -->
                <td>{{ $centre->opening_hours }}</td> <!-- Added opening_hours -->
                <td>{{ $centre->closing_hours }}</td> <!-- Added closing_hours -->
                <td>{{ $centre->phoneNumber }}</td>
                <td>
                @if ($centre->image)
                        <img src="{{ asset('images/' . $centre->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @else
                        <img src="{{ asset('images/' . $centre->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </td>
                        <td>
                        <a href="{{ route('depot_centers.edit', $centre->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('depot_centers.destroy', $centre->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucun centre de dépôt trouvé.</td>
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
            @if ($depotCenters->hasPages())
                <ul class="pagination">
                    @if ($depotCenters->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $depotCenters->previousPageUrl() }}">Précédent</a></li>
                    @endif

                    @if ($depotCenters->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $depotCenters->nextPageUrl() }}">Suivant</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Suivant</span></li>
                    @endif
                </ul>
            @endif
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
