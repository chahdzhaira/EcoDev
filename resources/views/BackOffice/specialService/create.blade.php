<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Form to add a new special service">
    <title>Add Special Service - Vali Admin</title>
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
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
    @include('BackOffice.partials.navbar')
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-plus-circle"></i> Add Special Service</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('special-services.store', $agency->id) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="additional_cost" class="form-label">Additional Cost (TND)</label>
                        <input type="number" class="form-control @error('additional_cost') is-invalid @enderror" id="additional_cost" name="additional_cost" value="{{ old('additional_cost') }}" required>
                        @error('additional_cost')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expiration_date" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}" required>
                        @error('expiration_date')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
    <label for="status" class="form-label">Status</label>
    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
        <option value="">Select Status</option>
        <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="error-message text-danger">{{ $message }}</div>
    @enderror
</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" required name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="error-message text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('delivery-agences.services', $agency->id) }}'">Cancel</button>
                    <button type="submit" class="btn btn-success ms-auto">Add Service</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>