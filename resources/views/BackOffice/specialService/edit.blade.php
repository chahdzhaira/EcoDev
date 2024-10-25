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
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .invalid-feedback {
            color: red;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('editServiceForm');
            const nameInput = document.getElementById('name');
            const costInput = document.getElementById('additional_cost');
            const dateInput = document.getElementById('expiration_date');

            const nameError = document.getElementById('nameError');
            const costError = document.getElementById('costError');
            const dateError = document.getElementById('dateError');

            const nameRegex = /^[a-zA-Z\s]+$/;

            nameInput.addEventListener('input', function () {
                if (!nameRegex.test(nameInput.value)) {
                    nameError.textContent = 'Service name should contain only letters.';
                } else {
                    nameError.textContent = '';
                }
            });

            costInput.addEventListener('input', function () {
                if (costInput.value < 0) {
                    costError.textContent = 'Cost must be a positive number.';
                } else {
                    costError.textContent = '';
                }
            });

            dateInput.addEventListener('input', function () {
                const selectedDate = new Date(dateInput.value);
                const today = new Date();
                if (selectedDate < today) {
                    dateError.textContent = 'Expiration date must be in the future.';
                } else {
                    dateError.textContent = '';
                }
            });

            form.addEventListener('submit', function (event) {
                if (nameError.textContent || costError.textContent || dateError.textContent) {
                    event.preventDefault();
                }
            });
        });
    </script>
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
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                    <span id="nameError" class="error-message"></span>
                </div>
                <div class="col-md-6">
                    <label for="additional_cost" class="form-label">Additional Cost (TND)</label>
                    <input type="number" class="form-control" id="additional_cost" name="additional_cost" value="{{ old('additional_cost', $service->additional_cost) }}" required>
                    <span id="costError" class="error-message"></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="expiration_date" class="form-label">Expiration Date</label>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="{{ old('expiration_date', $service->expiration_date) }}" required>
                    <span id="dateError" class="error-message"></span>
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
