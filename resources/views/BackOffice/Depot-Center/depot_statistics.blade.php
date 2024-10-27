<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques de {{ $depot }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/assets/css/main.css'])
</head>
<body>
    <div class="container">
        <h1>Statistiques de {{ $depot }}</h1>
        <ul class="list-group">
            @foreach($statistics as $stat)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $stat->category }}
                <span class="badge bg-primary rounded-pill">{{ $stat->total }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
</body>
</html>
