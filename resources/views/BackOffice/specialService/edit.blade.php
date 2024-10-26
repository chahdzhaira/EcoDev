
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Form to edit a special service">
    <title>Edit Special Service - Vali Admin</title>
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
            color: red; /* Couleur rouge pour le message d'erreur */
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
                <h1><i class="bi bi-pencil-square"></i> Edit Special Service</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('special-services.update', ['agencyId' => $agency->id, 'id' => $service->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}" required >
                        @error('name')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="additional_cost" class="form-label">Additional Cost (TND)</label>
                        <input type="number" class="form-control @error('additional_cost') is-invalid @enderror" id="additional_cost" name="additional_cost" value="{{ old('additional_cost', $service->additional_cost) }}" required >
                        @error('additional_cost')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expiration_date" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date" name="expiration_date" value="{{ old('expiration_date', $service->expiration_date) }}" required >
                        @error('expiration_date')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('delivery-agences.services', $service->delivery_agence_id) }}'">Cancel</button>
                    <button type="submit" class="btn btn-success ms-auto">Update Service</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>