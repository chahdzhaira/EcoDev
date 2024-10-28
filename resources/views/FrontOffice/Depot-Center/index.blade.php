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



<section id="top" class="bg_green pt-2 pb-2">
<div class="container-xl">
 <div class="row top_1">
  <div class="col-md-8">
   <div class="top_1l">
    <ul class="mb-0">
		<li class="text-white d-inline-block">Welcome to EcoCycle </li>
		<li class="text-white d-inline-block mx-2">| </li>
		<li class="d-inline-block"> <a class="text-white " href="#">How to Find Us</a> </li>
		<li class="text-white d-inline-block mx-2">| </li>
		<li class="d-inline-block"> <a class="text-white " href="#">Give Feedback</a> </li>
	</ul>
   </div>
  </div>
  <div class="col-md-4">
   <div class="top_1r text-end">
      <div class="input-group">
				<input type="text" class="form-control border-0 bg-transparent text-white" placeholder="Search Keyword">
				<span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent rounded-0 p-1 px-3 border-0" type="button">
						<i class="fa fa-search"></i> </button>
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


<section id="center" class="center_team">
    <div class="center_om bg_back">
        <div class="container-xl">
            <div class="row center_o1 text-center">
                <div class="col-md-12">
                    <h2 class="text-white text-uppercase font_50">Depot Centers</h2>
                    <h6 class="col_green fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Depot Centers</h6>
                </div>
            </div>
        </div>
    </div>
</section>

       <section> <!-- Barre de recherche et bouton de retour -->
        <div class="row mb-4">
            <!-- <div class="col">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Retour au Dashboard</a>
            </div> -->
            <div class="col text-end">
                <form action="{{ route('depot_center.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un centre..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                </form>
            </div>
            <!-- <div class="col text-end">
                <a href="{{ route('depot_centers.create') }}" class="btn btn-primary">Créer un nouveau centre</a>
            </div> -->
        </div>
        </section>

        <div class="container-xl">
        <div class="container-xl">
    <div class="row">
        @forelse($depotCenters as $centre)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($centre->image)
                        <img src="{{ asset('images/' . $centre->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @else
                        <img src="{{ asset('images/' . $centre->image) }}" alt="Image actuelle" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title" style="color: #4CAF50; font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: bold;">{{ $centre->name }}</h5>
                    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Adresse:</strong> {{ $centre->address }}</p>
                        <p class="card-text"><i class="fa fa-user" aria-hidden="true"></i> <strong>Nom du Responsable:</strong> {{ $centre->manager_name }}</p>
                        <p class="card-text"><i class="fa fa-users" aria-hidden="true"></i> <strong>Capacité:</strong> {{ $centre->capacity }}</p>
                        <p class="card-text"><i class="fa fa-clock-o" aria-hidden="true"></i> <strong>Heures d'ouverture et de fermeture:</strong> {{ $centre->opening_hours }}-{{ $centre->closing_hours }}</p>
                        <p class="card-text"><i class="fa fa-phone" aria-hidden="true"></i> <strong>Téléphone:</strong> {{ $centre->phoneNumber }}</p>
                        <!-- Nouveau bouton pour créer un déchet -->
                        <a href="{{ route('wastes.create', ['centre_id' => $centre->id]) }}" class="btn btn-primary">Ajouter un déchet</a>
                        <a href="{{ route('wastes.byDepot', ['depotId' => $centre->id]) }}" class="btn btn-primary">voir déchet</a>

                        <!-- <a href="#" class="btn btn-primary">Voir plus</a> Optional button for more details -->
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">Aucun centre trouvé.</div>
            </div>
            
        @endforelse
    </div>
</div>

</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    @if ($depotCenters->hasPages())
        <ul class="pagination">
            @if ($depotCenters->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Précédent</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $depotCenters->previousPageUrl() }}">Précédent</a></li>
            @endif

            @if ($depotCenters->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $depotCenters->nextPageUrl() }}">Suivant</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Suivant</span></li>
            @endif
        </ul>
    @endif
</div>

    </main>

    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
