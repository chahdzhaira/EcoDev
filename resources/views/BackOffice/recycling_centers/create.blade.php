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
        .invalid-feedback {
            display: none;
            color: red;
        }
        .form-control.is-invalid ~ .invalid-feedback {
            display: block;
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

            <form id="recyclingForm" action="{{ route('recycling_centers.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Center Name" required minlength="3">
                    <div class="invalid-feedback">The name must be at least 3 characters long.</div>
                </div>
                <div class="form-group">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <textarea id="address" name="address" class="form-control" placeholder="Center Address" rows="3" required minlength="10"></textarea>
                    <div class="invalid-feedback">The address must be at least 10 characters long.</div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Phone Number" pattern="^\+?[0-9]{8}$">
                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Contact Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <small class="form-text text-muted">E.g. contact@example.com</small>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="form-group">
                    <label for="manager_name">Manager's Name</label>
                    <input type="text" id="manager_name" name="manager_name" class="form-control" placeholder="Manager's Name" minlength="3">
                    <div class="invalid-feedback">The manager's name must be at least 3 characters long.</div>
                </div>
                <div class="form-group">
                    <label for="opening_hours">Opening Hours <span class="text-danger">*</span></label>
                    <input type="time" id="opening_hours" name="opening_hours" class="form-control" required>
                    <div class="invalid-feedback">Please indicate the opening hours.</div>
                </div>
                <div class="form-group">
                    <label for="closing_hours">Closing Hours <span class="text-danger">*</span></label>
                    <input type="time" id="closing_hours" name="closing_hours" class="form-control" required>
                    <div class="invalid-feedback">Please indicate the closing hours.</div>
                </div>
                <div class="form-group">
                    <label for="image">Center Image</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <div class="invalid-feedback">Please provide a valid image.</div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            <a href="{{ route('recycling_centers.index') }}" class="btn btn-secondary mt-3">Back to Recycling Centers List</a>
        </div>
    </main>

    <!-- Essential Scripts -->
    @vite(['resources/assets/js/main.js'])

    <!-- Form validation with real-time feedback -->
    <script>
        (function () {
            'use strict';

            // Fetch the form element
            var form = document.getElementById('recyclingForm');

            // Function to validate a field on blur
            function validateField(field) {
                // Check if the field is valid
                if (!field.checkValidity()) {
                    // If invalid, apply the Bootstrap invalid class
                    field.classList.add('is-invalid');
                } else {
                    // If valid, remove the invalid class
                    field.classList.remove('is-invalid');
                }
            }

            // Loop through all form controls and add event listener for 'blur' event
            var inputs = form.querySelectorAll('.form-control');
            inputs.forEach(function (input) {
                input.addEventListener('blur', function () {
                    validateField(input);
                });
            });

            // Prevent form submission if fields are invalid
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>
</html>
