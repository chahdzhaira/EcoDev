<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/team.css'])
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
	    <h2 class="text-white text-uppercase font_50">Sales Centers</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="{{route('index')}}">Home</a> <span class="mx-2 text-white-50">/</span> Sales Centers</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="team" class="p_3">
 <div class="container-xl">
        <div class="row team_1">
            @foreach ($salesCenters as $center)
            <div class="col-md-4">
                <div class="team_1m text-center">
                    <div class="team_1m1 position-relative">
                        <div class="team_1m1i">
                            <img src="{{ asset('storage/' . $center->image) }}" class="center-img" alt="{{ $center->name }}">
                        </div>
                        <div class="team_1m1i1 bg_back w-100 h-100 position-absolute top-0">
                            <ul class="mb-0">
                                <li class="text-white d-inline-block">
                                    <a class="btn btn-outline-light text-uppercase font-weight-bold text-nowrap px-5 py-1 w-100" href="">
                                   Our Recycled Products
                                </a>
                                     </a>  
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="team_1m2 p-4 shadow_box">
    <h4 class="text-uppercase"><a href="{{ route('detail') }}">{{ $center->name }}</a></h4>
    <h6 class="col_green">{{ $center->address }}</h6>
    <p class="mb-0 text-black">
    <strong>Phone:</strong> <span class="text-muted">{{ $center->phoneNumber }}</span>
</p>
<p class="mb-0 text-black">
    <strong>Opening Hours:</strong> <span class="text-muted">{{ $center->opening_hours }} - {{ $center->closing_hours }}</span>
</p>

</div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
 
    
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

<script>
window.onscroll = function() {myFunction()};
var navbar_sticky = document.getElementById("navbar_sticky");
var sticky = navbar_sticky.offsetTop;
var navbar_height = document.querySelector('.navbar').offsetHeight;
function myFunction() {
  if (window.pageYOffset >= sticky + navbar_height) {
    navbar_sticky.classList.add("sticky")
	document.body.style.paddingTop = navbar_height + 'px';
  } else {
    navbar_sticky.classList.remove("sticky");
	document.body.style.paddingTop = '0'
  }
}
</script>

</body>


</html>