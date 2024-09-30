<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoCycle</title>
    
    @vite(['resources/assets/css/bootstrap.min.css', 
            'resources/assets/css/font-awesome.min.css', 
            'resources/assets/css/global.css', 
            'resources/assets/css/about.css',
            'resources/assets/js/bootstrap.bundle.min.js'])

    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Events</h1>
        <div class="row">
            @foreach ($events as $event) <!-- Correction du nom de la variable -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm"> <!-- Ajout d'une ombre pour la carte -->
                        <img src="{{ asset('images/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $event->title }}</h5> <!-- Texte du titre en bleu -->
                            <p class="card-text">{{ Str::limit($event->description, 100) }}...</p> <!-- Limiter la description -->
                            <p><strong>Date:</strong> {{ $event->date }}</p>
                            <p><strong>Location:</strong> {{ $event->location }}</p>
                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-outline-primary">View Details</a> <!-- Bouton en contour -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
