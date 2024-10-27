<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Special Services - Vali Admin</title> <!-- Modifié ici -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <style>
        .container {
            background: #f8f9fa; 
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
            margin: 30px auto;
            max-width: 2000px;
        }
        .table {
            background-color: #f0f0f0;
            width: 100%; 
        }
        .table img {
            width: 100px; 
            height: 100px; 
            object-fit: cover; 
            border-radius: 5px; 
        }
    </style>
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
    @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-archive"></i> Special Services for {{ $agency->name }}</h1> 
                <p>Manage Special Services for the Delivery Agency</p> 
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Agencies</li>
                <li class="breadcrumb-item"><a href="#">Special Services</a></li> 
            </ul>
        </div>

        <div class="container">
    <h1>List of Special Services for {{ $agency->name }}</h1>
    <div class="mb-4"></div> 

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <div class="d-flex flex-grow-1">
            <!-- Formulaire de recherche -->
            <form method="GET" action="{{ route('special-services.index', $agency->id) }}" class="d-flex me-2 ">
                <div class="input-group flex-grow-1" style="max-width: 250px;"> 
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search special services..." value="{{ request('search') }}" style="height: 38px;"> <!-- Ajustement de la hauteur -->
                    <button type="submit" class="btn btn-primary btn-sm" style="height: 38px;">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>

            <!-- Formulaire de tri -->
            <form method="GET" action="{{ route('special-services.index', $agency->id) }}" class="d-flex ms-2 align-items-center">
                <select name="sort_by" id="sort_by" class="form-select form-select-sm me-2" style="max-width: 150px; height: 38px;"> <!-- Réduction de la largeur et de la hauteur -->
                    <option value="">Select</option>
                    <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Name</option>
                    <option value="additional_cost" {{ request('sort_by') === 'additional_cost' ? 'selected' : '' }}>Additional Cost</option>
                    <option value="expiration_date" {{ request('sort_by') === 'expiration_date' ? 'selected' : '' }}>Expiration Date</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm" style="height: 38px; padding: 0 10px;">
    <i class="bi bi-sort-down"></i> Sort
</button>

            </form>
        </div>

        <a href="{{ route('special-services.create', $agency->id) }}" class="btn btn-primary ms-2" style="height: 38px;">
            <i class="bi bi-plus-circle"></i> Add Special Service
        </a>
    </div>

    <table class="table">
            <thead >
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Additional Cost (TND)</th>
                        <th>Expiration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($specialServices as $service)
                                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->additional_cost }}</td>
                        <td>{{ $service->expiration_date }}</td>
                        <td>
    <a href="{{ route('special-services.edit', ['agencyId' => $service->delivery_agence_id, 'id' => $service->id]) }}" class="btn btn-sm btn-warning" title="Edit">
        <i class="fas fa-edit"></i> 
    </a>

    <form id="deleteForm-{{ $service->id }}" action="{{ route('special-services.destroy', ['agencyId' => $service->delivery_agence_id, 'id' => $service->id]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger" title="Delete" onclick="confirmDelete({{ $service->id }})">
        <i class="fas fa-trash-alt"></i> 
    </button>
</form>

<script>
    function confirmDelete(serviceId) {
        if (window.confirm('Are you sure you want to delete this service?')) {
            document.getElementById('deleteForm-' + serviceId).submit();
        }
    }
</script>

</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No special services found for this agency.</td>
                    </tr>
                    @endforelse
                </tbody>
                </div>
            </table>
 
<!-- Pagination -->
<div class="d-flex justify-content-center">
{!! $specialServices->links() !!}
</div>

            <div class="d-flex justify-content-between mt-3">
        <button onclick="window.location='{{ route('delivery-agences.index') }}'" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </button>
    </div>
        </div>
        @vite(['resources/assets/js/jquery-3.7.0.min.js'])
        @vite(['resources/assets/js/bootstrap.min.js'])
        @vite(['resources/assets/js/main - Back.js'])

        <script type="text/javascript">
            if(document.location.hostname == 'pratikborsadiya.in') {
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', 'UA-72504830-1', 'auto');
                ga('send', 'pageview');
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </main>
</body>
</html>
