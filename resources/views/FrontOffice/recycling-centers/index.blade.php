<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/blog.css'])
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    @vite(['resources/assets/js/bootstrap.bundle.min.js'])

    <style>
        /* Custom styles for the navbar */
        .navbar {
            border-bottom: 2px solid #007bff;
            background-color: #fff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .navbar:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            font-weight: 500;
        }
        .nav-link.active {
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }
        .nav-link:hover {
            color: #0056b3;
        }
        .social_link {
            font-size: 1.2rem;
            color: #007bff;
        }
        .social_link:hover {
            color: #0056b3;
        }
        .btn-success {
            border-radius: 20px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 15px;
            transition: transform 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-title {
            font-size: 1.5rem;
            margin: 10px 0;
            color: #007bff;
        }
        .card-text {
            margin: 5px 0;
            color: #555;
        }
        .qrcode {
            margin-top: 10px;
        }
        .distribute-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .distribute-btn:hover {
            background-color: #218838;
        }
        /* Responsive grid layout for cards */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col {
            flex: 1 1 300px;
            margin: 10px;
            display: flex;
        }
    </style>
</head>
<body>

<section id="top" class="bg_green pt-2 pb-2">
    <div class="container-xl">
        <div class="row top_1">
            <div class="col-md-8">
                <div class="top_1l">
                    <ul class="mb-0">
                        <li class="text-white d-inline-block">Welcome EcoCycle</li>
                        <li class="text-white d-inline-block mx-2">|</li>
                        <li class="d-inline-block"><a class="text-white" href="#">How to Find Us</a></li>
                        <li class="text-white d-inline-block mx-2">|</li>
                        <li class="d-inline-block"><a class="text-white" href="#">Give Feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top_1r text-end">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 bg-transparent text-white" placeholder="Search Keyword">
                        <span class="input-group-btn">
                            <button class="btn btn-primary col_green bg-transparent rounded-0 p-1 px-3 border-0" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="header">
    @include('FrontOffice.partials.navbar')
</section>

<section id="center" class="center_blog">
    <div class="center_om bg_back">
        <div class="container-xl">
            <div class="row center_o1 text-center">
                <div class="col-md-12">
                    <h2 class="text-white text-uppercase font_50">Centre de recyclage</h2>
                    <h6 class="col_green fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Centre de recyclage</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h1>Centres de Recyclage</h1>

    <div class="row">
        @foreach ($recyclingCenters as $center)
            <div class="col">
                <div class="card">
                    @if ($center->image)
                        <img src="{{ asset('images/' . $center->image) }}" alt="Image du centre">
                    @else
                        <img src="{{ asset('images/default-image.jpg') }}" alt="Image par défaut"> <!-- Placeholder for missing images -->
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $center->name }}</h5>
                        <p class="card-text"><strong>Adresse:</strong> {{ $center->address }}</p>
                        <p class="card-text"><strong>Téléphone:</strong> {{ $center->phoneNumber }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $center->email }}</p>
                        <p class="card-text"><strong>Responsable:</strong> {{ $center->manager_name }}</p>
                        <p class="card-text"><strong>Heures d'ouverture:</strong> {{ $center->opening_hours }} - {{ $center->closing_hours }}</p>
                        <!-- QR Code container -->
                        <div id="qrcode-{{ $center->id }}" class="qrcode"></div>

                        <!-- Button "Distribuer" -->
                        <button class="distribute-btn">Distribuer</button>
                    </div>
                </div>
            </div>

            <script>
                // Generate QR code for each recycling center
                $(document).ready(function() {
                    $('#qrcode-{{ $center->id }}').qrcode({
                        text: 'Nom: {{ $center->name }}, Adresse: {{ $center->address }}, Téléphone: {{ $center->phoneNumber }}, Email: {{ $center->email }}',
                        width: 128,
                        height: 128
                    });
                });
            </script>
        @endforeach
    </div>
</div>

@vite(['resources/assets/js/main.js'])
</body>
</html>
