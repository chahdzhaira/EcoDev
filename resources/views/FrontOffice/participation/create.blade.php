<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $event->title }} - EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css', 
           'resources/assets/css/font-awesome.min.css', 
           'resources/assets/css/global.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Couleur de fond légère */
        }

        .form-title {
            font-size: 1.5rem; /* Taille de la police */
            font-weight: 600; /* Épaisseur de la police */
            color: #333; /* Couleur de la police */
            margin-bottom: 20px; /* Espacement en bas */
        }

        .form-control {
            border-radius: 0.5rem; /* Coins arrondis pour les inputs */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .input-group {
            margin-bottom: 15px; /* Espacement entre les champs */
        }

        .input-group-text {
            background-color: #e9ecef; /* Couleur d'arrière-plan de l'icône */
            border: none; /* Retirer la bordure par défaut */
        }

        .btn-primary {
            background-color: #28a745; /* Couleur personnalisée pour le bouton */
            border: none; /* Retirer la bordure par défaut */
            border-radius: 0.5rem; /* Coins arrondis pour le bouton */
        }

        .btn-primary:hover {
            background-color: #218838; /* Couleur au survol */
        }

        .event-card {
            background-color: white; /* Couleur de fond de la carte */
            border-radius: 10px; /* Coins arrondis de la carte */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre de la carte */
            transition: transform 0.3s; /* Transition pour l'animation */
        }

        .event-card:hover {
            transform: scale(1.05); /* Zoom au survol */
        }

        .event-details h4, .event-details h5 {
            color: #333; /* Couleur pour les titres de détails */
            transition: color 0.3s; /* Transition pour la couleur */
        }

        .event-details h4:hover, .event-details h5:hover {
            color: #28a745; /* Changement de couleur au survol */
        }

        .event-image {
            max-height: 250px; /* Hauteur maximale de l'image */
            object-fit: cover; /* Ajustement de l'image */
            border-radius: 10px 10px 0 0; /* Coins arrondis en haut */
        }

        .animated {
            opacity: 0;
            transform: translateY(20px); /* Position initiale pour l'animation */
            transition: opacity 0.5s ease, transform 0.5s ease; /* Transition pour l'animation */
        }

        .animated.visible {
            opacity: 1;
            transform: translateY(0); /* Position finale pour l'animation */
        }
    </style>
    @vite(['resources/assets/js/bootstrap.bundle.min.js'])
</head>
<body>

<section id="header">
    @include('FrontOffice.partials.navbar')
</section>

<div class="container mt-5">
    <h1 class="text-center mb-4">{{ $event->title }}</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
           
            <!-- Formulaire de participation dans la colonne de gauche -->
            <div class="card">
                <div class="card-body">
                    <h2 class="form-title text-center">Formulaire de Participation</h2>

                    <!-- Affichage des messages d'erreur ou de succès -->
                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('participations.store', $event->id) }}" method="POST">
                        @csrf

                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nom" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Téléphone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Participer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center animated" id="event-details">
            <!-- Détails de l'événement dans la colonne de droite -->
            <div class="event-card">
            <img src="{{ asset('images/' . $event->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 300px;">
            <div class="card-body">
                    <div class="event-details mt-3">
                        <h4>Description</h4>
                        <p>{{ $event->description }}</p>

                        <h5>Date:</h5>
                        <p>{{ $event->date }}</p>

                        <h5>Location:</h5>
                        <p>{{ $event->location }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="footer" class="p_3 bg-dark mt-5">
    @include('FrontOffice.partials.footer')
</section>

<section id="footer_b" class="pt-3 pb-3">
    <div class="container-xl">
        <div class="row footer_b1">
            <div class="col-md-12">
                <div class="footer_b1l text-center">
                    <p class="mb-0">© 2013 Your Website Name. All Rights Reserved | Design by <a class="col_green fw-bold" href="http://www.templateonweb.com">TemplateOnWeb</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Ajouter la classe "visible" pour l'animation d'entrée
    window.addEventListener('scroll', function() {
        const eventDetails = document.getElementById('event-details');
        const { top } = eventDetails.getBoundingClientRect();
        if (top < window.innerHeight - 50) { // Lorsque l'élément est visible
            eventDetails.classList.add('visible');
        }
    });
</script>

</body>
</html>
