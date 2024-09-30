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
    <title>Delivery Agencies - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     <style>
        .container {
            background: #f8f9fa; /* Fond gris clair pour le conteneur */
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
            margin: 30px auto;
            max-width: 2000px;
        }
        .table {
        background-color: #f0f0f0; /* Fond gris clair pour la table */
        width: 100%; /* Assure que la table prend toute la largeur */
        }
        .table img {
    width: 100px; /* Largeur fixe pour toutes les images */
    height: 100px; /* Hauteur fixe pour toutes les images */
    object-fit: cover; /* Couvre le conteneur sans déformer l'image */
    border-radius: 5px; /* Coins arrondis pour un meilleur style */
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
                <h1><i class="bi bi-archive"></i> Delivery Agencies</h1>
                <p>Manage Delivery Agencies</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Agencies</li>
                <li class="breadcrumb-item"><a href="#">Delivery Agencies</a></li>
            </ul>
        </div>

        <div class="container">
            <h1>List of Delivery Agencies</h1>
    <div class="d-flex justify-content-end align-items-center mb-3">
          <a href="{{ route('delivery-agences.create') }}" class="btn btn-primary">+ Add Delivery Agency</a>
    </div>
            <table class="table">
                <thead>
                    <tr>
                    <th>Image</th>

                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Opening Hours</th>
                        <th>Closing Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agences as $agence)
                        <tr>
                        <td>
    @if($agence->image)
        <img src="{{ asset($agence->image) }}" alt="{{ $agence->name }}">
    @else
        <span>No Image</span>
    @endif
</td>

                            <td>{{ $agence->name }}</td>
                            <td>{{ $agence->address }}</td>
                            <td>{{ $agence->phoneNumber }}</td>
                           

                            <td>{{ $agence->opening_hours }}</td>
                            <td>{{ $agence->closing_hours }}</td>
                            <td>
                                <!-- <a href="{{ route('delivery-agences.show', $agence->id) }}" class="btn btn-info">Details</a> -->
                                <a href="{{ route('delivery-agences.edit', $agence->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('delivery-agences.destroy', $agence->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])

    <!-- Google analytics script-->
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
</body>
</html> 