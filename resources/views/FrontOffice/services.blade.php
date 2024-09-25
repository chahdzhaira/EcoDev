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
@include('partials.navbar')
</section>

<section id="center" class="center_serv">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50">Services</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Services</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="overview" class="p_3">
 <div class="container-xl">
  <div class="row overview_1">
   <div class="col-md-6">
    <div class="overview_1l">
	 <h2>Services Overview</h2>
	 <p class="mt-3">Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicingelit, sed do eiumdod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
	 <h5 class="mb-2"><i class="fa fa-long-arrow-right color_1"></i> Insurgent Mindset</h5>
	 <h5 class="mb-2"><i class="fa fa-long-arrow-right color_1"></i> Enduring Results</h5>
	  <h5 class="mb-4"><i class="fa fa-long-arrow-right color_1"></i> Passionate People</h5>
	  <h6 class="mb-0"><a href="#" class="button">About Our Team</a></h6>
	</div>
   </div>
   <div class="col-md-6">
    <div class="overview_1r">
	  <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/13.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
	</div>
   </div>
  </div>
 </div>
</section>
 
 <section id="serv_h" class="p_3 bg-light">
    <div class="container-xl">
	  <div class="row serv_h1">
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/3.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Swine Biltong Mignon &amp; Leberkas	</a></h5>
			<p class="mb-0 mt-3">Clients can simply schedule their hard drive destruction online and through our website.</p>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/4.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Hard Drive, Flash Drive &amp; SSD Destruction	</a></h5>
			<p class="mb-0 mt-3">Turkey ball tip rump, alcatra swine bresaola jerky. Cow andouille alcatra, pork loin capicola.</p>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/5.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Electronic Waste Collection &amp; Recycling		</a></h5>
			<p class="mb-0 mt-3">Users quickly replace their electronic devices with newer, faster &amp; stronger gadgets on the market.</p>
		   </div>
		 </div>
	   </div>
	  </div>
	  <div class="row serv_h1 mt-4">
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/9.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Swine Biltong Mignon &amp; Leberkas	</a></h5>
			<p class="mb-0 mt-3">Clients can simply schedule their hard drive destruction online and through our website.</p>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/10.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Hard Drive, Flash Drive &SSD Destruction	</a></h5>
			<p class="mb-0 mt-3">Turkey ball tip rump, alcatra swine bresaola jerky. Cow andouille alcatra, pork loin capicola.</p>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/11.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Electronic Waste Collection &amp; Recycling		</a></h5>
			<p class="mb-0 mt-3">Users quickly replace their electronic devices with newer, faster &amp; stronger gadgets on the market.</p>
		   </div>
		 </div>
	   </div>
	  </div>
	</div>
</section>
    
<section id="footer" class="p_3 bg-dark">
@include('partials.footer')
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