<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS, and PUG.js. It's fully customizable and modular.">
    <meta property="og:title" content="Edit Recycled Product">
    <title>Edit Recycled Product</title>
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
                <h1><i class="bi bi-ui-checks"></i> Edit Recycled Product</h1>
                <p>Modify the details of the recycled product below.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Edit Recycled Product</a></li>
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
                <form id="recycledProductForm" action="{{ route('BackOffice.RecycledProduct.update', [$salesCenter->id, $recycledProduct->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT') 

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-6">
                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label" for="name">Product Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter product name" value="{{ old('name', $recycledProduct->name) }}" maxlength="30" required>
                                <div class="invalid-feedback">Please provide a valid product name.</div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter product description" required>{{ old('description', $recycledProduct->description) }}</textarea>
                                <div class="invalid-feedback">Please provide a valid description.</div>
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label class="form-label" for="quantity">Quantity</label>
                                <input class="form-control" id="quantity" name="quantity" type="number" placeholder="Enter quantity" value="{{ old('quantity', $recycledProduct->quantity) }}" required>
                                <div class="invalid-feedback">Please provide a valid quantity.</div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-6">
                            <!-- Price -->
                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <input class="form-control" id="price" name="price" type="text" placeholder="Enter price" value="{{ old('price', $recycledProduct->price) }}" required>
                                <div class="invalid-feedback">Please provide a valid price.</div>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label class="form-label" for="image">Product Image</label>
                                <input class="form-control" id="image" name="image" type="file" accept="image/jpeg, image/png">
                                <div class="invalid-feedback">Please upload an image (JPEG or PNG).</div>
                                <small class="form-text text-muted">Current Image: 
                                    <img src="{{ asset('storage/' . $recycledProduct->image) }}" alt="Current Image" style="max-width: 100px;" />
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-pencil"></i> Update
                        </button>
                        <a href="{{ route('BackOffice.RecycledProduct.index', $salesCenter->id) }}" class="btn btn-secondary ms-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Essential javascripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js', 'resources/assets/js/bootstrap.min.js', 'resources/assets/js/main - Back.js'])

    <script>
        const form = document.getElementById('recycledProductForm');

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
