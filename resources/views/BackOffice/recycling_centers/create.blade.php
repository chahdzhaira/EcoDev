<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EcoCycle - Create a recycling center">
    <title>Create a Recycling Center</title>
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
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            color: #dc3545;
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
                <p>Create a Recycling Center</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('recycling_centers.index') }}">Recycling Centers</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ul>
        </div>

        <div class="form-container">
            <h3 class="form-title">Create a Recycling Center</h3>

            <form action="{{ route('recycling_centers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Center Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Center Address" rows="3">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phoneNumber') }}">
                    @error('phoneNumber')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Contact Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="manager_name">Manager's Name</label>
                    <input type="text" id="manager_name" name="manager_name" class="form-control @error('manager_name') is-invalid @enderror" placeholder="Manager's Name" value="{{ old('manager_name') }}">
                    @error('manager_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="opening_hours">Opening Hours <span class="text-danger">*</span></label>
                    <input type="time" id="opening_hours" name="opening_hours" class="form-control @error('opening_hours') is-invalid @enderror" value="{{ old('opening_hours') }}">
                    @error('opening_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="closing_hours">Closing Hours <span class="text-danger">*</span></label>
                    <input type="time" id="closing_hours" name="closing_hours" class="form-control @error('closing_hours') is-invalid @enderror" value="{{ old('closing_hours') }}">
                    @error('closing_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Center Image</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            <a href="{{ route('recycling_centers.index') }}" class="btn btn-secondary mt-3">Back to Recycling Centers List</a>
        </div>
    </main>
    @vite(['resources/assets/js/main.js'])
</body>
</html>
