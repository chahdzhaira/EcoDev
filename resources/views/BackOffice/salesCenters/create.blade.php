<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta property="og:title" content="Create Sales Center">
    <title>Create Sales Center</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
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
                <h1><i class="bi bi-ui-checks"></i> Create Sales Center</h1>
                <p>Fill out the form below to add a new sales center.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Create Sales Center</a></li>
            </ul>
        </div>

        <div class="row">
            @if (session('error'))
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-danger">
                        <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
                        <strong>Oh snap!</strong> {{ session('error') }}.
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="tile">
                <form id="salesCenterForm" action="{{ route('salesCenters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- CSRF Token -->

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-6">
                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label" for="name">Center Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter center name" value="{{ old('name') }}" maxlength="30" required>
                                <div class="invalid-feedback">Please provide a valid center name.</div>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input class="form-control" id="address" name="address" type="text" placeholder="Enter address" value="{{ old('address') }}" maxlength="30" required>
                                <div class="invalid-feedback">Please provide a valid address.</div>
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-3">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <input class="form-control" id="phoneNumber" name="phoneNumber" type="text" placeholder="Enter phone number" value="{{ old('phoneNumber') }}" maxlength="8" pattern="[0-9]{8}" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);">
                                <div class="invalid-feedback">Please provide a valid phone number (8 digits).</div>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label class="form-label" for="image">Center Image</label>
                                <input class="form-control" id="image" name="image" type="file" accept="image/jpeg, image/png" required>
                                <div class="invalid-feedback">Please upload an image for the sales center (JPEG or PNG).</div>
                                <small class="form-text text-muted">Upload an image for the sales center (JPEG or PNG).</small>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-6">
                            <!-- Opening Hours -->
                            <div class="mb-3">
                                <label class="form-label" for="opening_hours">Opening Hours</label>
                                <input class="form-control" id="opening_hours" name="opening_hours" type="time" value="{{ old('opening_hours') }}" required>
                                <div class="invalid-feedback">Please provide valid opening hours.</div>
                            </div>

                            <!-- Closing Hours -->
                            <div class="mb-3">
                                <label class="form-label" for="closing_hours">Closing Hours</label>
                                <input class="form-control" id="closing_hours" name="closing_hours" type="time" value="{{ old('closing_hours') }}" required>
                                <div class="invalid-feedback">Please provide valid closing hours.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-plus-circle"></i> Create
                        </button>
                        <a href="{{ route('salesCenters.index') }}" class="btn btn-secondary ms-2">
        <i class="bi bi-arrow-left"></i> Retour
    </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </main>

  <!-- Essential javascripts -->
  @vite(['resources/assets/js/jquery-3.7.0.min.js', 'resources/assets/js/bootstrap.min.js', 'resources/assets/js/main - Back.js'])

  <script>
      const form = document.getElementById('salesCenterForm');

      form.addEventListener('input', function (event) {
          if (event.target.validity.valid) {
              event.target.classList.remove('is-invalid');
              event.target.classList.add('is-valid');
          } else {
              event.target.classList.remove('is-valid');
              event.target.classList.add('is-invalid');
          }
      });
  </script>
</body>

</html>
