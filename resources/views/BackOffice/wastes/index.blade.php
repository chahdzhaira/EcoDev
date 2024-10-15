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
          <h1><i class="bi bi-building"></i> Wastes Collectés</h1>
          <p>Gérer les déchets collectés</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
          <li class="breadcrumb-item"><a href="#">Wastes Collectés</a></li>
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
              <form action="{{ route('wastes.index') }}" method="GET" class="d-flex">
                  <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un déchet..." value="{{ request('search') }}">
                  <button class="btn btn-outline-primary" type="submit">Rechercher</button>
              </form>
          </div>
          
      </div>

      <div class="row">
          <div class="col-md-12">
              <div class="tile">
                  <div class="tile-body">
                      <table class="table table-striped table-hover">
                          <thead class="table-dark">
                              <tr>
                                  <th>Quantité</th>
                                  <th>Date de Collecte</th>
                                  <th>Lieu de Collecte</th>
                                  <th>Catégorie</th>
                                  <th>Nom de l'Utilisateur</th>
                                  <th>Centre de Dépôt</th>
                                  <th>Image</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse($wastes as $waste)
                                  <tr>
                                      <td>{{ $waste->quantity }}</td>
                                      <td>{{ $waste->collection_date }}</td>
                                      <td>{{ $waste->collection_location }}</td>
                                      <td>{{ $waste->category }}</td>
                                      <td>{{ $waste->user_id }}</td>
                                      <td>{{ $waste->depot ? $waste->depot->name : 'N/A' }}</td> <!-- Utilisation de la relation depot -->
                                      <td>
                                          @if ($waste->image)
                                              <img src="{{ asset('images/' . $waste->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 100px;">
                                          @else
                                              <span>Aucune image</span>
                                          @endif
                                      </td>
                                      <!-- <td>
                                          <a href="{{ route('wastes.edit', $waste->id) }}" class="btn btn-primary">Modifier</a>
                                          <form action="{{ route('wastes.destroy', $waste->id) }}" method="POST" style="display:inline;">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Supprimer</button>
                                          </form>
                                      </td> -->
                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="9" class="text-center">Aucun déchet trouvé.</td>
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
          @if ($wastes->hasPages())
              <ul class="pagination">
                  @if ($wastes->onFirstPage())
                      <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                  @else
                      <li class="page-item"><a class="page-link" href="{{ $wastes->previousPageUrl() }}">Précédent</a></li>
                  @endif

                  @if ($wastes->hasMorePages())
                      <li class="page-item"><a class="page-link" href="{{ $wastes->nextPageUrl() }}">Suivant</a></li>
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
