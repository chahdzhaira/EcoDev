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

            <form id="recyclingForm" action="{{ route('recycling_centers.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Nom <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom du centre" required minlength="3">
                    <div class="invalid-feedback">Le nom doit comporter au moins 3 caractères.</div>
                </div>
                <div class="form-group">
                    <label for="address">Adresse <span class="text-danger">*</span></label>
                    <textarea id="address" name="address" class="form-control" placeholder="Adresse du centre" rows="3" required minlength="10"></textarea>
                    <div class="invalid-feedback">L'adresse doit comporter au moins 10 caractères.</div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Téléphone</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Numéro de téléphone" pattern="^\+?[0-9]{8}$">
                    <div class="invalid-feedback">Veuillez entrer un numéro de téléphone valide.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email de contact" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <small class="form-text text-muted">Ex : contact@exemple.com</small>
                    <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                </div>
                <div class="form-group">
                    <label for="manager_name">Nom du responsable</label>
                    <input type="text" id="manager_name" name="manager_name" class="form-control" placeholder="Nom du responsable" minlength="3">
                    <div class="invalid-feedback">Le nom du responsable doit comporter au moins 3 caractères.</div>
                </div>
                <div class="form-group">
                    <label for="opening_hours">Heures d'ouverture <span class="text-danger">*</span></label>
                    <input type="time" id="opening_hours" name="opening_hours" class="form-control" required>
                    <div class="invalid-feedback">Veuillez indiquer les heures d'ouverture.</div>
                </div>
                <div class="form-group">
                    <label for="closing_hours">Heures de fermeture <span class="text-danger">*</span></label>
                    <input type="time" id="closing_hours" name="closing_hours" class="form-control" required>
                    <div class="invalid-feedback">Veuillez indiquer les heures de fermeture.</div>
                </div>
                <div class="form-group">
                    <label for="image">Image du centre</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <div class="invalid-feedback">Veuillez fournir une image valide.</div>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>

            <a href="{{ route('recycling_centers.index') }}" class="btn btn-secondary mt-3">Retour à la liste des centres</a>
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
