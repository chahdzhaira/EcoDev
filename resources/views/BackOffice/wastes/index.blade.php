<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des déchets</title>
    @vite(['resources/assets/css/main.css'])
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
                <h1><i class="bi bi-trash"></i> Liste des déchets</h1>
                <p>Gestion des déchets à distribuer</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="#">Liste des déchets</a></li>
            </ul>
        </div>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Message d'erreur -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Formulaire pour sélectionner des déchets et les distribuer -->
        <form action="{{ route('waste.distribution.form') }}" method="POST" id="wasteForm" onsubmit="validateSelection(event)">
            @csrf
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Selectionner</th>
                        <th>Image</th>
                        <th>Quantité</th>
                        <th>Catégorie</th>
                        <th>Centre de dépôt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wastes as $waste)
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_wastes[]" value="{{ $waste->id }}" @if($waste->isDistributed()) disabled @endif>
                            </td>
                            <td>
                                @if($waste->image)
                                    <img src="{{ asset('storage/'.$waste->image) }}" alt="Image du déchet" width="100">
                                @else
                                    Pas d'image
                                @endif
                            </td>
                            <td>{{ $waste->quantity }}</td>
                            <td>{{ $waste->category }}</td>
                            <td>
                                @if($waste->depotCenter)
                                    {{ $waste->depotCenter->name }}
                                @else
                                    Non défini
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Distribuer</button>
        </form>
    </main>

    <!-- Essential JavaScripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])

    <script>
        function validateSelection(event) {
            const checkboxes = document.querySelectorAll('input[name="selected_wastes[]"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault();
                alert('Veuillez sélectionner un déchet tout d\'abord.');
            }
        }
    </script>
</body>
</html>
