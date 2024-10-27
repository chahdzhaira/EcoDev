<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Distribution</title>
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
            <div>
                <h1><i class="bi bi-truck"></i> Formulaire de Distribution</h1>
                <p>Veuillez sélectionner l'agence de livraison et le centre de recyclage pour les déchets.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="#">Formulaire de Distribution</a></li>
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container mt-4">
            <form action="{{ route('waste.distribute') }}" method="POST" id="distributionForm">
                @csrf

                @foreach ($selectedWastes as $waste)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>Déchet ID: {{ $waste->id }}</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="waste_id" value="{{ $waste->id }}">
                            <div class="form-group">
                                <label for="delivery_agency_{{ $waste->id }}">Agence de livraison :</label>
                                <select name="delivery_agency" id="delivery_agency_{{ $waste->id }}" class="form-control" required>
                                    <option value="">Sélectionnez une agence</option>
                                    @foreach($deliveryAgencies as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Veuillez sélectionner une agence de livraison.</div>

                                <label for="recycling_center_{{ $waste->id }}" class="mt-2">Centre de recyclage :</label>
                                <select name="recycling_center" id="recycling_center_{{ $waste->id }}" class="form-control" required>
                                    <option value="">Sélectionnez un centre</option>
                                    @foreach($recyclingCenters as $center)
                                        <option value="{{ $center->id }}">{{ $center->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Veuillez sélectionner un centre de recyclage.</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Confirmer la distribution</button>
                    <a href="{{ route('wastes.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </main>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('distributionForm');

            form.addEventListener('submit', function(e) {
                let valid = true;

                // Vérification des sélecteurs d'agence de livraison
                const deliveryAgencySelects = document.querySelectorAll('select[name="delivery_agency"]');
                deliveryAgencySelects.forEach(select => {
                    if (select.value === "") {
                        select.classList.add('is-invalid');
                        valid = false;
                    } else {
                        select.classList.remove('is-invalid');
                    }
                });

                // Vérification des sélecteurs de centre de recyclage
                const recyclingCenterSelects = document.querySelectorAll('select[name="recycling_center"]');
                recyclingCenterSelects.forEach(select => {
                    if (select.value === "") {
                        select.classList.add('is-invalid');
                        valid = false;
                    } else {
                        select.classList.remove('is-invalid');
                    }
                });

                // Si le formulaire n'est pas valide, empêcher la soumission
                if (!valid) {
                    e.preventDefault(); // Empêche la soumission si des champs sont invalides
                    alert('Veuillez remplir tous les champs requis.');
                }
            });
        });
    </script>
</body>
</html>
