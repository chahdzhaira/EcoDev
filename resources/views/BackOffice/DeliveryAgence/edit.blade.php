<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Form to edit a delivery agency">
    <title>Edit Delivery Agency - Vali Admin</title>
    @vite(['resources/assets/css/main.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
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
            color: red; /* Set error message color to red */
            font-size: 0.875em; /* Optional: adjust font size */
            display: block; /* Ensure it displays as a block */
            margin-top: 5px; /* Add some space above the error message */
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('agencyForm');
        const nameInput = document.getElementById('name');
        const addressInput = document.getElementById('address');
        const phoneInput = document.getElementById('phoneNumber');
        const openHoursInput = document.getElementById('opening_hours');
        const closeHoursInput = document.getElementById('closing_hours');

        // Error spans
        const nameError = document.createElement('span');
        const addressError = document.createElement('span');
        const phoneError = document.createElement('span');
        const hoursError = document.createElement('span');

        nameError.className = 'error-message';
        addressError.className = 'error-message';
        phoneError.className = 'error-message';
        hoursError.className = 'error-message';

        nameInput.parentNode.appendChild(nameError);
        addressInput.parentNode.appendChild(addressError);
        phoneInput.parentNode.appendChild(phoneError);
        openHoursInput.parentNode.appendChild(hoursError);
        closeHoursInput.parentNode.appendChild(hoursError);

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
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
    @include('BackOffice.partials.navbar')
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-pencil-square"></i> Edit Delivery Agency</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('delivery-agences.update', $agence->id) }}" method="POST" enctype="multipart/form-data" id="agencyForm">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $agence->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name=" address" value="{{ old('address', $agence->address) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber', $agence->phoneNumber) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Current Image: 
                            @if($agence->image)
                                <img src="{{ asset('storage/' . $agence->image) }}" alt="{{ $agence->name }}" style="width: 50px; height: auto;">
                            @else
                                <span>No Image</span>
                            @endif
                        </small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="opening_hours" class="form-label">Opening Hours</label>
                        <input type="time" class="form-control" id="opening_hours" name="opening_hours" value="{{ old('opening_hours', $agence->opening_hours) }}" required>
                        <span id="hoursError" class="error-message"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="closing_hours" class="form-label">Closing Hours</label>
                        <input type="time" class="form-control" id="closing_hours" name="closing_hours" value="{{ old('closing_hours', $agence->closing_hours) }}" required>
                        <span id="hoursError" class="error-message"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('delivery-agences.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Update Agency</button>
                </div>
            </form>
        </div>
    </main>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
</body>
</html>