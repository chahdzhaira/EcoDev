<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Distributions</title>
    @vite(['resources/assets/css/main.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
            <h1><i class="bi bi-trash"></i> Historique des Distributions</h1>
            <p>Affichez l'historique des distributions des déchets</p>
        </div>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('distributions.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un déchet..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>

        <!-- Dropdown pour le tri -->
        <div class="row mb-4">
            <div class="col-md-4 offset-md-8 text-end">
                <form action="{{ route('distributions.index') }}" method="GET" class="d-inline">
                    <select name="sort_by" class="form-select d-inline-block" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Trier par</option>
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Date</option>
                        <option value="category" {{ request('sort_by') === 'category' ? 'selected' : '' }}>Déchet</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request('search') }}">
                </form>
            </div>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>
                        <a href="{{ route('distributions.index', array_merge(request()->all(), ['sort_by' => 'category', 'sortDirection' => request('sortDirection', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">
                            Déchet
                            @if(request('sort_by') === 'category')
                                <i class="bi bi-arrow-{{ request('sortDirection') === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th>Quantité Distribuée</th>
                    <th>Statut</th>
                    <th>Centre de Recyclage</th>
                    <th>Agence de Livraison</th>
                    <th>
                        <a href="{{ route('distributions.index', array_merge(request()->all(), ['sort_by' => 'created_at', 'sortDirection' => request('sortDirection', 'asc') === 'asc' ? 'desc' : 'asc'])) }}">
                            Date
                            @if(request('sort_by') === 'created_at')
                                <i class="bi bi-arrow-{{ request('sortDirection') === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wastes as $waste)
                    @if($waste->distributions->isNotEmpty())
                        @foreach($waste->distributions as $distribution)
                            <tr>
                                <td>{{ $waste->category }}</td>
                                <td>{{ $distribution->quantity_to_distribute }}</td>
                                <td class="{{ $distribution->status === 'Completed' ? 'text-success' : ($distribution->status === 'Pending' ? 'text-warning' : 'text-danger') }}">
                                    {{ $distribution->status }}
                                </td>
                                <td>{{ $distribution->recyclingCenter->name ?? 'Non défini' }}</td>
                                <td>{{ $distribution->deliveryAgence->name ?? 'Non défini' }}</td>
                                <td>{{ $distribution->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Aucune distribution trouvée pour le déchet {{ $waste->category }}.</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $wastes->appends(request()->all())->links() }}
        </div>
    </main>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main.js'])
</body>
</html>
