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
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }
    </style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select form and input fields
        const form = document.getElementById('agencyForm');
        const nameInput = document.getElementById('name');
        const addressInput = document.getElementById('address');
        const phoneInput = document.getElementById('phoneNumber');
        const imageInput = document.getElementById('image');
        const openHoursInput = document.getElementById('opening_hours');
        const closeHoursInput = document.getElementById('closing_hours');

        // Error spans
        const nameError = document.getElementById('nameError');
        const phoneError = document.getElementById('phoneError');
        const addressError = document.getElementById('addressError');
        const hoursError = document.getElementById('hoursError');

        const nameRegex = /^[a-zA-Z\s]+$/;
        const addressRegex = /^(?=.*[a-zA-Z])(?=.*\d)/;

        // Real-time validation for name
        nameInput.addEventListener('input', function() {
            if (!nameRegex.test(nameInput.value)) {
                nameError.textContent = "The name must contain only letters.";
            } else {
                nameError.textContent = "";
            }
        });

        // Real-time validation for address
        addressInput.addEventListener('input', function() {
            if (!addressRegex.test(addressInput.value)) {
                addressError.textContent = "The address must contain both letters and numbers.";
            } else {
                addressError.textContent = "";
            }
        });

        // Real-time validation for phone number
        phoneInput.addEventListener('input', function() {
            if (!/^\d{8,}$/.test(phoneInput.value)) {
                phoneError.textContent = "It must contain numbers (8 digits)";
            } else {
                phoneError.textContent = "";
            }
        });

        // Validate opening and closing hours
        openHoursInput.addEventListener('input', function() {
            validateHours();
        });

        closeHoursInput.addEventListener('input', function() {
            validateHours();
        });

        function validateHours() {
            const openHours = new Date('1970-01-01T' + openHoursInput.value + ':00');
            const closeHours = new Date('1970-01-01T' + closeHoursInput.value + ':00');

            if (closeHours <= openHours) {
                hoursError.textContent = "Closing hours must be after opening hours.";
            } else {
                hoursError.textContent = "";
            }
        }

        // Prevent form submission if there are validation errors
        form.addEventListener('submit', function(event) {
            if (nameError.textContent || addressError.textContent || phoneError.textContent || hoursError.textContent) {
                event.preventDefault(); // Stop form submission
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
                <h1><i class="bi bi-plus-circle"></i> Add Delivery Agency</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('delivery-agences.store') }}" method="POST" enctype="multipart/form-data" id="agencyForm">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Agency Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <span id="nameError" class="error-message">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <span id="addressError" class="error-message">@error('address') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                        <span id="phoneError" class="error-message">@error('phoneNumber') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <span id="imageError" class="error-message">@error('image') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-6">
    <label for="opening_hours" class="form-label">Opening hours</label>
    <input type="time" class="form-control" id="opening_hours" name="opening_hours" required>
</div>

<div class="col-md-6">
    <label for="closing_hours" class="form-label">Closing hours</label>
    <input type="time" class="form-control" id="closing_hours" name="closing_hours" required>
    <span id="hoursError" class="error-message"></span> <!-- Pour afficher les erreurs -->
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