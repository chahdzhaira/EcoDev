<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recycling</title>
	@vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/about.css'])
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
		<li class="text-white d-inline-block">Welcome to Electronics Recycling </li>
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

<section id="center" class="center_about">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50">About</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> About</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="about_ho" class="p_3">
 <div class="container-xl">
   <div class="about_h1 row">
    <div class="col-md-6">
	 <div class="about_h1l">
	     <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/6.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
	 </div>
	</div>
	<div class="col-md-6">
	  <div class="about_h1r">
	  <h4 class="col_green">About Us</h4>
	  <h2 class="mt-3">We Are Everytime Care Our Environment</h2>
      <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat maecenas nibh dolor, malesuada et bibendum a, sagittis accumsan ipsum pellentesque ultrices ultrices sapien.</p>
	  <h6 class="fs-6"><i class="fa fa-check col_green fs-3 align-middle me-1"></i> Special Care Baby</h6>
	  <h6 class="fs-6 mt-2"><i class="fa fa-check col_green fs-3 align-middle me-1"></i> Qualified Teachers</h6>
	  <h6 class="fs-6 mt-2"><i class="fa fa-check col_green fs-3 align-middle me-1"></i> Every Day Check Home Work</h6>
	  <h6 class="fs-6 mt-2 mb-4"><i class="fa fa-check col_green fs-3 align-middle me-1"></i> Every Day Read and Write</h6>
	  <h6 class="d-inline-block"><a class="button_1" href="#">Read More</a></h6>
	  <h6 class="d-inline-block ms-1"><a class="button_2" href="#">Apply Now</a></h6>
	 </div>
	</div>
   </div>
   <div class="about_h2 row mt-4">
    <div class="col-md-4">
	 <div class="about_h2l">
	  <h2 class="mb-0">Chuck alcatra short ribs strip steak shoulder jowl</h2>
	 </div>
	</div>
	<div class="col-md-4">
	 <div class="about_h2m">
	  <h6 class="fw-bold">Recycle   <span class="float-end fw-normal">92%</span></h6>
	   <div class="progress-bar mt-3">
			<div class="progress" style="width:92%;">
			</div>
		</div>
		 <h6 class="fw-bold mt-3">Electronics   <span class="float-end fw-normal">86%</span></h6>
	   <div class="progress-bar mt-3">
			<div class="progress" style="width:86%;">
			</div>
		</div>
		 <h6 class="fw-bold mt-3">Solar   <span class="float-end fw-normal">76%</span></h6>
	   <div class="progress-bar mt-3">
			<div class="progress" style="width:76%;">
			</div>
		</div>
	 </div>
	</div>
	<div class="col-md-4">
	 <div class="about_h2r">
	  <p class="mb-0">There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form by injected humour or randomised words which don't look even slightly believable need to be sure there isn't anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the Internet.</p>
	 </div>
	</div>
   </div>
   <div class="row exep_2 mt-4">
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i bg-dark p-4 text-center">
	  <span class="font_60 col_green lh-1"><i class="fa fa-user"></i></span>
	  <h1 class="text-white mt-3"> 1480 </h1>
	  <h6 class="mb-0 text-white">Happy Customers</h6>
	</div>
   </div>
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i bg-dark p-4 text-center">
	  <span class="font_60 col_green lh-1"><i class="fa fa-thumbs-o-up"></i></span>
	  <h1 class="text-white mt-3"> 1764 </h1>
	  <h6 class="mb-0 text-white">Peoples Likes</h6>
	</div>
   </div>
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i bg-dark p-4 text-center">
	  <span class="font_60 col_green lh-1"><i class="fa fa-trophy"></i></span>
	  <h1 class="text-white mt-3"> 1180 </h1>
	  <h6 class="mb-0 text-white">Awards Achieved</h6>
	</div>
   </div>
   <div class="col-md-3 col-sm-6">
    <div class="exep_2i bg-dark p-4 text-center">
	  <span class="font_60 col_green lh-1"><i class="fa fa-briefcase"></i></span>
	  <h1 class="text-white mt-3"> 36 </h1>
	  <h6 class="mb-0 text-white">Experiences</h6>
	</div>
   </div>
  </div>
 </div>
</section>

<section id="about_h" class="p_3 bg-light">
    <div class="container-xl">
	  <div class="row about_h1 text-center mb-4">
	   <div class="col-md-12">
	    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2">Welcome to GoGreen</h3>
		<h6 class="mt-3">MORE ABOUT US</h6>
		<p class="mb-0 mt-3">
GoGreen is a Family-owned company located in San Diego, California proudly serving <br> individuals and businesses in Southern California with their computers and electronics <br> upgrade needs, accepting computers and electronics waste in any conditions.</p>
	   </div>
	  </div>
	  <div class="row about_h2">
	   <div class="col-md-4">
	    <div class="about_h2i text-center position-relative bg-white">
		  <div class="about_h2i1  position-absolute w-100">
		    <span class="d-inline-block bg_green text-white rounded-circle text-center fs-2"><i class="fa fa-leaf"></i></span>
		  </div>
		  <div class="about_h2i2 p-5 px-4 rounded-3 border_1">
		   <h5 class="mb-3 mt-4"><a href="#">Corporate Services</a></h5>
		   <p class="mb-0">Guaranteed that all of your universal waste management is performed safely and responsibly.</p>
		  </div>
		</div>
	   </div>
	   <div class="col-md-4">
	    <div class="about_h2i text-center position-relative bg-white">
		  <div class="about_h2i1  position-absolute w-100">
		    <span class="d-inline-block bg_green text-white rounded-circle text-center fs-2"><i class="fa fa-inbox"></i></span>
		  </div>
		  <div class="about_h2i2 p-5 px-4 rounded-3 border_1">
		   <h5 class="mb-3 mt-4"><a href="#">Convenient Pickup</a></h5>
		   <p class="mb-0">We offer business pickup services to safely recycle your electronics in a safe manner.</p>
		  </div>
		</div>
	   </div>
	   <div class="col-md-4">
	    <div class="about_h2i text-center position-relative bg-white">
		  <div class="about_h2i1  position-absolute w-100">
		    <span class="d-inline-block bg_green text-white rounded-circle text-center fs-2"><i class="fa fa-calendar"></i></span>
		  </div>
		  <div class="about_h2i2 p-5 px-4 rounded-3 border_1">
		   <h5 class="mb-3 mt-4"><a href="#">E-waste Events</a></h5>
		   <p class="mb-0">We work with non-profits, businesses, and other organizations to host community e-waste events.</p>
		  </div>
		</div>
	   </div>
	  </div>
	</div>
</section>

<section id="testim" class="p_3 carousel_p">
    <div class="container-xl">
	  <div class="row about_h1 text-center mb-4">
	   <div class="col-md-12">
	    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2">Testimonials</h3>
		<h6 class="mt-3 mb-0">WHAT CLIENTS SAY</h6>
	   </div>
	  </div>
	  <div class="testim_1im1 clearfix">
		  <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
       <div class="testim_1im1i text-center">
		 <span class="d-inline-block  fs-1 col_green"><i class="fa fa-quote-left"></i></span><br>
		 <img src="{{Vite::asset('resources/assets/img/7.jpg')}}" alt="abc" class="rounded-circle mt-3">
		 <p class="mt-3 fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante <br> dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
		 <h3 class="text-uppercase mt-4">Lorem Nulla</h3>
		 <h6 class="mb-0">Director</h6>
	   </div>
    </div>
    <div class="carousel-item">
        <div class="testim_1im1i text-center">
		 <span class="d-inline-block  fs-1 col_green"><i class="fa fa-quote-left"></i></span><br>
		 <img src="{{Vite::asset('resources/assets/img/8.jpg')}}" alt="abc" class="rounded-circle mt-3">
		 <p class="mt-3 fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante <br> dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
		 <h3 class="text-uppercase mt-4">Ipsum Porta</h3>
		 <h6 class="mb-0">Ceo</h6>
	   </div>
    </div>
  </div>
</div>
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