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
           'resources/assets/css/team.css'])
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
	        <h2 class="text-white text-uppercase font_50">Events</h2>
	        <h6 class="col_green fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Team Members</h6>
	       </div>
        </div>
     </div>
   </div>   
</section>

<div class="container mt-5">
    <h1 class="text-center mb-4">Events</h1>
    <div class="row">
        @foreach ($event as $event) 
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100"> <!-- Ajout de h-100 pour la hauteur égale des cartes --> 
                    <img src="{{ asset('storage/' . $event->image_url) }}" alt="{{ $event->title }}" class="card-img-top" style="max-height: 200px; object-fit: cover;"> <!-- Ajout de l'image -->
                    <div class="card-body d-flex flex-column"> <!-- Flexbox pour alignement -->
                        <h5 class="card-title text-primary">{{ $event->title }}</h5> 
                        <p class="card-text">{{ Str::limit($event->description, 100) }}...</p>
                        <p><strong>Date:</strong> {{ $event->date }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <div class="mt-auto">
                        <a href="{{ route('event.show', $event->id) }}" class="btn btn-outline-primary mt-2">View Details</a>

                            <a href="{{ route('event.participate', $event->id) }}" class="btn btn-success mt-2">Participate</a> <!-- New Participate button -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<section id="footer" class="p_3 bg-dark">
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

</body>
</html>
