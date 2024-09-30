<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EcoCycle - Modifier un centre de recyclage">
    <title>Modifier Centre de Recyclage</title>
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
      .img-thumbnail {
        max-width: 200px;
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
          <p>Modifier un centre de recyclage</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
          <li class="breadcrumb-item"><a href="{{ route('recycling_centers.index') }}">Centres de recyclage</a></li>
          <li class="breadcrumb-item active">Modifier</li>
        </ul>
      </div>

      <div class="form-container">
        <h3 class="form-title">Modifier un centre de recyclage</h3>
        
        <!-- Formulaire de modification du centre de recyclage -->
        <form action="{{ route('recycling_centers.update', $recyclingCenter->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Nom <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $recyclingCenter->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="address">Adresse <span class="text-danger">*</span></label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address', $recyclingCenter->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="phoneNumber">Téléphone</label>
            <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" value="{{ old('phoneNumber', $recyclingCenter->phoneNumber) }}">
            @error('phoneNumber')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $recyclingCenter->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="image">Image du centre</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($recyclingCenter->image)
                <img src="{{ asset('images/' . $recyclingCenter->image) }}" alt="Image actuelle" class="img-thumbnail mt-2">
            @else
                <p>Aucune image disponible</p>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

        <a href="{{ route('recycling_centers.index') }}" class="btn btn-secondary mt-3">Annuler</a>
      </div>
    </main>

    <!-- Essential Scripts -->
    @vite(['resources/assets/js/main.js'])
</body>
</html>
