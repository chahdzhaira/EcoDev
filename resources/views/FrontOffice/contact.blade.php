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

<section id="center" class="center_cont">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50">Contact Us</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Contact Us</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="contact" class="p_3">
 <div class="container-xl">
   <div class="contact_2 row clearfix">
    <div class="col-md-8">
      <div class="contact_2l clearfix">
	    <div class="blog_dt1l35">
		<div class="row quote_2">
       <div class="col-md-6">
	    <div class="quote_2l">
		 <input placeholder="Name" class="form-control" type="text">
		</div>
	   </div>
	   <div class="col-md-6">
	    <div class="quote_2l">
		 <input placeholder="Email Address" class="form-control" type="text">
		</div>
	   </div>
     </div>
	    <div class="row quote_2 mt-4 text-center">
       <div class="col-md-6">
	    <div class="quote_2l">
		 <input placeholder="Phone Number" class="form-control" type="text">
		</div>
	   </div>
	   <div class="col-md-6">
	    <div class="quote_2l">
		 <input placeholder="Website" class="form-control" type="text">
		</div>
	   </div>
     </div>
	    <div class="row quote_2 mt-4 text-center">
	   <div class="col-md-12">
	    <div class="quote_2l">
		 <textarea  placeholder="Write a Message" class="form-control form_text"></textarea>
		</div>
	   </div>
     </div>
	    <div class="row quote_2 mt-4">
	   <div class="col-md-12">
	    <div class="quote_2l">
		  <h6 class="d-inline-block mt-2 mb-0"><a class="button_1" href="#"> Post Comment <i class="fa fa-paper-plane ms-1"></i> </a></h6>
		</div>
	   </div>
     </div>
	   </div>
	  </div>
	</div>
	<div class="col-md-4">
      <div class="contact_2r row clearfix">
	    <div class="col-md-2">
		 <div class="contact_2rl clearfix">
		  <span class="font_50 lh-1"><i class="fa fa-map-marker col_green"></i></span>
		 </div>
		</div>
		<div class="col-md-10">
		 <div class="contact_2rr clearfix">
		  <h4 class="mgt">Location</h4>
		  <hr class="line">
		  <p>Lorem ipsum dolor sit amet, consectetur isicing elit. Recusandae repudiandae dolores...</p>
		  <hr>
		 </div>
		</div>
	  </div>
	  <div class="contact_2r row clearfix">
	    <div class="col-md-2">
		 <div class="contact_2rl clearfix">
		  <span class="fs-1 lh-1"><i class="fa fa-phone col_green"></i></span>
		 </div>
		</div>
		<div class="col-md-10">
		 <div class="contact_2rr clearfix">
		  <h4 class="mgt">Phone | Email</h4>
		  <hr class="line">
		  <p><span class="fw-bold">IND - </span> +123-456 7899</p>
		  <p><span class="fw-bold">USA -</span>  +123-456 7899</p>
		  <p><span class="fw-bold">E-Mail -</span> <a href="#">info@gmail.com</a></p>
		  <hr>
		 </div>
		</div>
	  </div>
	  <div class="contact_2r row clearfix">
	    <div class="col-md-2">
		 <div class="contact_2rl clearfix">
		  <span class="fs-1 lh-1"><i class="fa fa-clock-o col_green"></i></span>
		 </div>
		</div>
		<div class="col-md-10">
		 <div class="contact_2rr clearfix">
		  <h4 class="mgt">Working Hours</h4>
		  <hr class="line">
		  <p><span class="fw-bold">Mon - Sat -</span>  10am - 5pm</p>
		 </div>
		</div>
	  </div>
	</div>
   </div>
   <div class="row contact_3 mt-4">
    <div class="col-md-12">
	  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114964.53925916665!2d-80.29949920266738!3d25.782390733064336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b0a20ec8c111%3A0xff96f271ddad4f65!2sMiami%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1530774403788" height="450" style="border:0; width:100%;" allowfullscreen=""></iframe>
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