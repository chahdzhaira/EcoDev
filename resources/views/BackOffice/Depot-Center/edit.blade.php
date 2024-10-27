<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Centre de Dépôt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
    @include('BackOffice.partials.navbar')
    </header>
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <!-- Main Content -->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-building"></i> Modifier le centre de dépôt</h1>
          <p>Gérer les centres de dépôt</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
          <li class="breadcrumb-item"><a href="#">Modifier un centre de dépôt</a></li>
        </ul>
      </div>

      <!-- Success Message -->
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

      <div class="container">
        <form action="{{ route('depot_centers.update', $depotCenter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $depotCenter->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Adresse <span class="text-danger">*</span></label>
                <textarea name="address" class="form-control" rows="2" required>{{ old('address', $depotCenter->address) }}</textarea>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="capacity">Capacité <span class="text-danger">*</span></label>
                <input type="number" name="capacity" class="form-control" value="{{ old('capacity', $depotCenter->capacity) }}" required>
                @error('capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phoneNumber">Téléphone</label>
                <input type="text" name="phoneNumber" class="form-control" value="{{ old('phoneNumber', $depotCenter->phoneNumber) }}">
                @error('phoneNumber')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="manager_name">Nom du Responsable</label>
                <input type="text" name="manager_name" class="form-control" value="{{ old('manager_name', $depotCenter->manager_name) }}">
                @error('manager_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="opening_hours">Heures d'ouverture <span class="text-danger">*</span></label>
                <input type="time" name="opening_hours" class="form-control" value="{{ old('opening_hours', $depotCenter->opening_hours) }}" required>
                @error('opening_hours')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="closing_hours">Heures de fermeture <span class="text-danger">*</span></label>
                <input type="time" name="closing_hours" class="form-control" value="{{ old('closing_hours', $depotCenter->closing_hours) }}" required>
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
                @if ($depotCenter->image)
                    <img src="{{ asset('images/' . $depotCenter->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('depot_centers.index') }}" class="btn btn-secondary mt-3">Retour à la liste des centres</a>
        </form>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
