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
</head>

<body>

    <section id="top" class="bg_green pt-2 pb-2">
        <div class="container-xl">
            <div class="row top_1">
                <div class="col-md-8">
                    <div class="top_1l">
                        <ul class="mb-0 d-flex align-items-center">
                            <li class="text-white">Welcome to EcoCycle</li>
                            <li class="text-white mx-2">|</li>
                            <li><a class="text-white" href="#">How to Find Us</a></li>
                            <li class="text-white mx-2">|</li>
                            <li><a class="text-white" href="#">Give Feedback</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-end">
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
    </section>

    <section id="header">
        @include('FrontOffice.partials.navbar')
    </section>

    <section id="center" class="center_team">
        <div class="center_om bg_back">
            <div class="container-xl">
                <div class="row center_o1 text-center">
                    <div class="col-md-12">
                        <h2 class="text-white text-uppercase font_50">Déchets pour le centre: {{ $depotCenter->name }}</h2>
                        <h6 class="col_green fw-bold mb-0 mt-3">
                            <a class="text-light" href="#">Home</a>
                            <span class="mx-2 text-white-50">/</span> Centres de Dépôt
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row mb-4">
            <div class="col text-end">
                <form action="{{ route('wastes.byDepot', ['depotId' => $depotCenter->id]) }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un dechet..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                    <button type="button" class="btn btn-outline-primary ms-2" onclick="window.history.back();">
                    <i class="fa fa-arrow-left"></i>
                </button>
                </form>
            </div>
        </div>
    </section>

    <div class="container-xl">

        @if($wastes->count() > 0)
        @foreach($wastes as $waste)
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($waste->image)
                        <img src="{{ asset('images/' . $waste->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @else
                            <img src="{{ asset('images/' . $waste->image.jpg) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title" style="color: #4CAF50; font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: bold;">
                                <i class="fa fa-recycle me-2"></i>Catégorie: {{ $waste->category }}
                            </h5>
                            <p class="card-text"><i class="fa fa-balance-scale me-2"></i><strong>Quantité:</strong> {{ $waste->quantity }}</p>
                            <p class="card-text"><i class="fa fa-map-marker me-2"></i><strong>Lieu de collecte:</strong> {{ $waste->collection_location }}</p>
                            <p class="card-text"><i class="fa fa-calendar me-2"></i><strong>Date de collecte:</strong> {{ $waste->collection_date }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('wastes.edit', $waste->id) }}" class="btn btn-primary mt-3">
                                    <i class="fa fa-edit me-1"></i> Modifier
                                </a>
                                <form action="{{ route('wastes.destroy', $waste->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce déchet ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-3">
                                        <i class="fa fa-trash me-1"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $wastes->links() }}
            </div>
        @else
            <p>Aucun déchet trouvé pour ce centre de dépôt.</p>
        @endif
    </div>

    <div class="d-flex justify-content-center mt-4">
        @if ($wastes->hasPages())
            <ul class="pagination">
                @if ($wastes->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $wastes->previousPageUrl() }}">Précédent</a></li>
                @endif

                @if ($wastes->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $wastes->nextPageUrl() }}">Suivant</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Suivant</span></li>
                @endif
            </ul>
        @endif
    </div>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])

</body>

</html>
