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
          <h1><i class="bi bi-building"></i> Créer un centre de dépôt</h1>
          <p>Gérer les centres de dépôt</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
          <li class="breadcrumb-item"><a href="#">Créer un centre de dépôt</a></li>
        </ul>
      </div>

              <!-- Message de succès -->
              @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        button {
            width: 100%;
        }
    </style>     
<body>

<div class="container">

    <form action="{{ route('depot_centers.store') }}" method="POST" enctype="multipart/form-data"> <!-- Change route -->
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
            <textarea name="address" class="form-control" placeholder="Adresse du centre" rows="2" required>{{ old('address') }}</textarea>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="capacity">Capacité <span class="text-danger">*</span></label> <!-- Added capacity field -->
            <input type="number" name="capacity" class="form-control" placeholder="Capacité du centre" value="{{ old('capacity') }}" required>
            @error('capacity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_quantity_available">Quantité totale disponible</label>
            <input type="number" name="total_quantity_available" class="form-control" placeholder="Quantité totale disponible" value="{{ old('total_quantity_available') }}" required>
            @error('total_quantity_available')
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
            <input type="file" name="image" class="form-control-file">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>

    <a href="{{ route('depot_centers.index') }}" class="btn btn-secondary mt-3">Retour à la liste des centres</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
