<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EcoCycle - Création d'un centre de recyclage">
    <title>Créer un centre de recyclage</title>
    <!-- Main CSS -->
    @vite(['resources/assets/css/main.css'])
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 800px;
        }
        .form-title {
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
        }
        .form-control {
            border-radius: 6px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            border-radius: 6px;
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .text-danger {
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <!-- Navbar -->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
                <p>Créer un centre de recyclage</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('recycling_centers.index') }}">Centres de recyclage</a></li>
                <li class="breadcrumb-item active">Créer</li>
            </ul>
        </div>

        <div class="form-container">
            <h3 class="form-title">Créer un centre de recyclage</h3>

            <form action="{{ route('recycling_centers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nom <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Nom du centre" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Adresse <span class="text-danger">*</span></label>
                    <textarea name="address" class="form-control" placeholder="Adresse du centre" rows="3" required>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Téléphone</label>
                    <input type="text" name="phoneNumber" class="form-control" placeholder="Numéro de téléphone" value="{{ old('phoneNumber') }}">
                    @error('phoneNumber')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email de contact" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="manager_name">Nom du responsable</label>
                    <input type="text" name="manager_name" class="form-control" placeholder="Nom du responsable" value="{{ old('manager_name') }}">
                    @error('manager_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="opening_hours">Heures d'ouverture <span class="text-danger">*</span></label>
                    <input type="time" name="opening_hours" class="form-control" value="{{ old('opening_hours') }}" required>
                    @error('opening_hours')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="closing_hours">Heures de fermeture <span class="text-danger">*</span></label>
                    <input type="time" name="closing_hours" class="form-control" value="{{ old('closing_hours') }}" required>
                    @error('closing_hours')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image du centre</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>

            <a href="{{ route('recycling_centers.index') }}" class="btn btn-secondary mt-3">Retour à la liste des centres</a>
        </div>
    </main>

    <!-- Essential Scripts -->
    @vite(['resources/assets/js/main.js'])
</body>
</html>
