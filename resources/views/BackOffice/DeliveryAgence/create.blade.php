<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Form to add a new delivery agency">
    <title>Add Delivery Agency - Vali Admin</title>
    @vite(['resources/assets/css/main.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 800px;
        }
        h1 {
            color: #343a40;
        }
        .form-label {
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
        @include('BackOffice.partials.navbar')
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-plus-circle"></i> Add Delivery Agency</h1>
            </div>
        </div>
        <div class="container">
    <form action="{{ route('delivery-agences.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Champ caché pour l'ancienne image -->
        <input type="hidden" name="existing_image" value="{{ old('existing_image', $agency->image ?? '') }}">

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Agency Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                @error('address')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
                @error('phoneNumber')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Image <span class="text-danger"></span></label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                @if (old('existing_image', $agency->image ?? ''))
                    <div class="mt-2">
                        <img src="{{ asset(old('existing_image', $agency->image)) }}" alt="Current Image" style="max-width: 100%; height: auto;">
                    </div>
                    <small class="form-text text-muted">Si une erreur se produit, l'image actuelle sera conservée.</small>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="opening_hours" class="form-label">Opening Hours</label>
                <input type="time" class="form-control @error('opening_hours') is-invalid @enderror" id="opening_hours" name="opening_hours" value="{{ old('opening_hours') }}" required>
                @error('opening_hours')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="closing_hours" class="form-label">Closing Hours</label>
                <input type="time" class="form-control @error('closing_hours') is-invalid @enderror" id="closing_hours" name="closing_hours" value="{{ old('closing_hours') }}" required>
                @error('closing_hours')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('delivery-agences.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Add Agency</button>
        </div>
    </form>
</div>
    </main>
</body>
</html>