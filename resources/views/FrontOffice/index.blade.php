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
    @vite(['resources/assets/css/index.css'])
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
					<button class="btn btn-primary col_blue bg-transparent rounded-0 p-1 px-3 border-0" type="button">
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

<section id="center" class="center_h">
<div class="center_hm bg_back">
<div class="container-xl">
  <div class="row center_h1">
    <div class="col-md-9">
	 <div class="center_h1l">
	   <div class="center_h1li row">
	    <div class="col-md-6">
		 <div class="center_h1lil">
		  <div class="center_h1lili row">
		   <div class="col-md-2">
		    <div class="center_h1lilil">
			  <span class="d-inline-block bg-white col_green rounded-circle text-center fs-3"><i class="fa fa-phone"></i></span>
			</div>
		   </div>
		   <div class="col-md-10">
		    <div class="center_h1lilir">
			 <h5 class="text-white">+(123) 456-7890 </h5>
			 <h6 class="mb-0 text-light font_14">110 LOREM CIRCLE, TAN FIEGO, DA</h6>
			</div>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-md-6">
		 <div class="center_h1lil">
		  <div class="center_h1lili row">
		   <div class="col-md-2">
		    <div class="center_h1lilil">
			  <span class="d-inline-block bg-white col_green rounded-circle text-center fs-3"><i class="fa fa-clock-o"></i></span>
			</div>
		   </div>
		   <div class="col-md-10">
		    <div class="center_h1lilir">
			 <h5 class="text-white">Open Hours</h5>
			 <h6 class="mb-0 text-light font_14">WEEKDAYS 9.00-17.00, SAT: CLOSED</h6>
			</div>
		   </div>
		  </div>
		 </div>
		</div>
	   </div>
	 </div>
	</div>
	<div class="col-md-3">
	 <div class="center_h1r text-end">
	  <h6 class="mb-0"><a class="button" href="#">SCHEDULE PICKUP</a></h6>
	 </div>
	</div>
  </div>
  <div class="row center_h2 pt-5  mt-5 text-center">
   <div class="col-md-12">
    <h1 class="text-white">Save Your Planet</h1>
	<h4 class="text-light">SAVE YOUR COMMUNITY</h4>
	<p class="text-white-50 mt-4">We can solve your corporate IT disposition needs quickly and professionally. <br>
Save Your community, Save Your planet</p>
<h6 class="mb-0 mt-4"><a class="button" href="#">OUR SERVICES</a></h6>
   </div>
  </div>
</div>
</div>
</section>

<section id="about_h" class="p_3">
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
	    <div class="about_h2i text-center position-relative">
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
	    <div class="about_h2i text-center position-relative">
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
	    <div class="about_h2i text-center position-relative">
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

<section id="sched">
<div class="schedm bg_back pt-5 pb-5">
<div class="container-xl-1 col-md-6 ps-5">
  <div class="row about_h1 text-center mb-4">
	   <div class="col-md-12">
	    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2 text-white">Schedule Pickup</h3>
		<h6 class="mt-3 mb-0 text-white-50">FOR OLD EQUIPMENT</h6>
	   </div>
	  </div>
	  <div class="row sched_1">
	   <div class="col-md-6">
        <div class="sched_1i">
		  <div class="input-group bg-white">
		        <span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent  p-3 px-4 border-0" type="button">
						<i class="fa fa-user fs-4"></i> </button>
				</span>
				<input type="text" class="form-control border-0" placeholder="Full Name">
				
		</div>
		</div>
	   </div>
	   <div class="col-md-6">
        <div class="sched_1i">
		  <div class="input-group bg-white">
		        <span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent  p-3 px-4 border-0" type="button">
						<i class="fa fa-phone fs-4"></i> </button>
				</span>
				<input type="text" class="form-control border-0" placeholder="Phone Number">
				
		</div>
		</div>
	   </div>
	  </div>
	  
	  <div class="row sched_1 mt-3">
	   <div class="col-md-6">
        <div class="sched_1i">
		  <div class="input-group bg-white">
		        <span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent  p-3 px-4 border-0" type="button">
						<i class="fa fa-calendar fs-4"></i> </button>
				</span>
				<input type="text" class="form-control border-0" placeholder="Date">
				
		</div>
		</div>
	   </div>
	   <div class="col-md-6">
        <div class="sched_1i">
		  <div class="input-group bg-white">
		        <span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent  p-3 px-4 border-0" type="button">
						<i class="fa fa-clock-o fs-4"></i> </button>
				</span>
				<input type="text" class="form-control border-0" placeholder="Time">
				
		</div>
		</div>
	   </div>
	  </div>
	  
	  <div class="row sched_1 mt-3 text-center">
	   <div class="col-md-12">
        <div class="sched_1i">
		  <textarea placeholder="Message" class="form-control form_text border-0"></textarea>
		  <h6 class="mb-0 mt-4"><a class="button" href="#">ORDER PICKUP</a></h6>
		</div>
	   </div>

	  </div>
</div>
</div>
</section>

<section id="serv_h" class="p_3 bg-light">
    <div class="container-xl">
	  <div class="row about_h1 text-center mb-4">
	   <div class="col-md-12">
	    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2">Our Services</h3>
		<h6 class="mt-3 mb-0">WHAT WE DO</h6>
	   </div>
	  </div>
	  <div class="row serv_h1">
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/3.jpg')}}"class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Swine Biltong Mignon & Leberkas	</a></h5>
			<p class="mb-0 mt-3">Clients can simply schedule their hard drive destruction online and through our website.</p>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/4.jpg')}}"class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Hard Drive, Flash Drive & SSD Destruction	</a></h5>
			<p class="mb-0 mt-3">Turkey ball tip rump, alcatra swine bresaola jerky. Cow andouille alcatra, pork loin capicola.</p>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	     <div class="serv_h1i">
		   <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/5.jpg')}}"class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
		   <div class="serv_h1i1  p-4 bg-white">
		    <h5><a href="#">Electronic Waste Collection & Recycling		</a></h5>
			<p class="mb-0 mt-3">Users quickly replace their electronic devices with newer, faster & stronger gadgets on the market.</p>
		   </div>
		 </div>
	   </div>
	  </div>
	  <div class="row sched_1 mt-4 text-center">
	   <div class="col-md-12">
        <div class="sched_1i">
		  <h6 class="mb-0"><a class="button_1" href="#">ALL SERVICES</a></h6>
		</div>
	   </div>

	  </div>
	</div>
</section>

<section id="mission">
    <div class="container-fluid px-0">
	  <div class="row mission_1 mx-0">
	   <div class="col-md-6 p-0">
        <div class="mission_1l">
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/6-1.jpg')}}"class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
		</div>
	   </div>
	   <div class="col-md-6 p-0">
        <div class="mission_1r p-5">
		    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2">Our Mission</h3>
		<h6 class="mt-3 mb-3">ABOUT US</h6>
		<p>Our mission is to keep as much electronic waste from ending up in local landfills as we can</p>
		<div class="accordion" id="accordionExample">
  <div class="accordion-item">
   <h2 class="accordion-header" id="headingOne">
     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       <i class="fa fa-check-circle me-2"></i> REDUCING WASTE
     </button>
   </h2>
   <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
     <div class="accordion-body">
     <p class="mb-0">Stet clita kasd gubergren, no sea takimata sanctus est lorem ipsum dolor sit amet ipsum dolor sit amet, consetetur elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
     </div>
   </div>
  </div>
   
  <div class="accordion-item">
   <h2 class="accordion-header" id="headingTwo">
     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       <i class="fa fa-check-circle me-2"></i> REDUSE PROGRAM
     </button>
   </h2>
   <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
     <div class="accordion-body">
       <p class="mb-0">Stet clita kasd gubergren, no sea takimata sanctus est lorem ipsum dolor sit amet ipsum dolor sit amet, consetetur elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
     </div>
   </div>
 </div>
  
  <div class="accordion-item">
   <h2 class="accordion-header" id="headingThree">
     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       <i class="fa fa-check-circle me-2"></i> RECYCLE MORE
     </button>
   </h2>
   <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
     <div class="accordion-body">
        <p class="mb-0">Stet clita kasd gubergren, no sea takimata sanctus est lorem ipsum dolor sit amet ipsum dolor sit amet, consetetur elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
     </div>
   </div>
 </div>
 
 
</div>
		</div>
	   </div>
	  </div>
	</div>
</section>

<section id="faq" class="p_3 bg-light">
    <div class="container-xl">
	  <div class="row about_h1 text-center mb-4">
	   <div class="col-md-12">
	    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2">FAQ</h3>
		<h6 class="mt-3 mb-0">FREQUENTLY ASKED QUESTIONS</h6>
	   </div>
	  </div>
	  <div class="row about_h2">
	    <div class="col-md-4">
	    <div class="about_h2i text-center position-relative">
		  <div class="about_h2i1  position-absolute w-100">
		    <span class="d-inline-block bg_green text-white rounded-circle text-center fs-2"><i class="fa fa-question"></i></span>
		  </div>
		  <div class="about_h2i2 p-5 px-4 rounded-3 border_1 bg-white">
		   <h5 class="mb-3 mt-4"><a href="#">Consetetur sadipscing elitr, sed diam nonumy?</a></h5>
		   <p class="mb-0">Lorem ipsum dolamet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
		  </div>
		</div>
	   </div>
	   <div class="col-md-4">
	    <div class="about_h2i text-center position-relative">
		  <div class="about_h2i1  position-absolute w-100">
		    <span class="d-inline-block bg_green text-white rounded-circle text-center fs-2"><i class="fa fa-question"></i></span>
		  </div>
		  <div class="about_h2i2 p-5 px-4 rounded-3 border_1 bg-white">
		   <h5 class="mb-3 mt-4"><a href="#">Eirmod tempor invidunt ut labore et?</a></h5>
		   <p class="mb-0">Invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</p>
		  </div>
		</div>
	   </div>
	   <div class="col-md-4">
	    <div class="about_h2i text-center position-relative">
		  <div class="about_h2i1  position-absolute w-100">
		    <span class="d-inline-block bg_green text-white rounded-circle text-center fs-2"><i class="fa fa-question"></i></span>
		  </div>
		  <div class="about_h2i2 p-5 px-4 rounded-3 border_1 bg-white">
		   <h5 class="mb-3 mt-4"><a href="#">Dolore magna aquyam erat, sed diam voluptua?</a></h5>
		   <p class="mb-0">Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
		  </div>
		</div>
	   </div>
	  </div>
	  <div class="row sched_1 mt-4 text-center">
	   <div class="col-md-12">
        <div class="sched_1i">
		  <h6 class="mb-0"><a class="button_1" href="#">TO FAQ PAGE</a></h6>
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
    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
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

<section id="faq" class="p_3 bg-light">
    <div class="container-xl">
	  <div class="row about_h1 text-center mb-4">
	   <div class="col-md-12">
	    <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
		<h3 class="mt-2">Latest News</h3>
		<h6 class="mt-3 mb-0">BLOG POSTS</h6>
	   </div>
	  </div>
	  <div class="row blog_h1">
	 <div class="col-md-4">
	   <div class="blog_h1i shadow_box  position-relative">
	    <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/9.jpg')}}" class="w-100" alt="abc"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4">Go Green</h6>
		   </div>
	    </div>
	     <div class="blog_h1i2 p-4 bg-white">
	     <ul>
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="#">Ante Quis</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="#">28 July, 2021 </a> </li>
		 </ul>
		 <h5><a href="#">Chuck alcatra short ribs strip steak shoulder jowl</a></h5>
		 <p>Andouille ball tip turducken landjaeger cupim tail. Ball tip shankle shank kevin, bacon…</p>
		 <h6 class="mb-0 fw-bold"><a href="#">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6>
	    </div>
	  </div>
	 </div>
	 <div class="col-md-4">
	   <div class="blog_h1i shadow_box position-relative">
	    <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/10.jpg')}}" class="w-100" alt="abc"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4">Go Green</h6>
		   </div>
	    </div>
	     <div class="blog_h1i2 p-4 bg-white">
	     <ul>
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="#">Lorem Amet</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="#">25 July, 2021 </a> </li>
		 </ul>
		 <h5><a href="#">Short loin pork chop kielbasa chicken bacon meatloaf</a></h5>
		 <p>Andouille ball tip turducken landjaeger cupim tail. Ball tip shankle shank kevin, bacon…</p>
		 <h6 class="mb-0 fw-bold"><a href="#">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6>
	    </div>
	  </div>
	 </div>
	 <div class="col-md-4">
	   <div class="blog_h1i shadow_box position-relative">
	    <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/11.jpg')}}" class="w-100" alt="abc"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4">Go Green</h6>
		   </div>
	    </div>
	     <div class="blog_h1i2 p-4 bg-white">
	     <ul>
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="#">Dolor Porta</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="#">29 July, 2021 </a> </li>
		 </ul>
		 <h5><a href="#">Chuck alcatra short ribs strip steak shoulder jowl</a></h5>
		 <p>Andouille ball tip turducken landjaeger cupim tail. Ball tip shankle shank kevin, bacon…</p>
		 <h6 class="mb-0 fw-bold"><a href="#">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6>
	    </div>
	  </div>
	 </div>
	</div>
	  
	  <div class="row sched_1 mt-4 text-center">
	   <div class="col-md-12">
        <div class="sched_1i">
		  <h6 class="mb-0"><a class="button_1" href="#">OUR BLOG</a></h6>
		</div>
	   </div>

	  </div>
	</div>
</section>

<section id="subs" class="pt-5 pb-5 bg_green">
    <div class="container-xl">
	    <div class="row center_h1">
    <div class="col-md-9">
	 <div class="center_h1l">
	   <div class="center_h1li row">
	    <div class="col-md-6">
		 <div class="center_h1lil">
		  <div class="center_h1lili row">
		   <div class="col-md-2">
		    <div class="center_h1lilil">
			  <span class="d-inline-block bg-white col_green rounded-circle text-center fs-3"><i class="fa fa-phone"></i></span>
			</div>
		   </div>
		   <div class="col-md-10">
		    <div class="center_h1lilir">
			 <h5 class="text-white">+(123) 456-7890 </h5>
			 <h6 class="mb-0 text-light font_14">110 LOREM CIRCLE, TAN FIEGO, DA</h6>
			</div>
		   </div>
		  </div>
		 </div>
		</div>
		<div class="col-md-6">
		 <div class="center_h1lil">
		  <div class="center_h1lili row">
		   <div class="col-md-2">
		    <div class="center_h1lilil">
			  <span class="d-inline-block bg-white col_green rounded-circle text-center fs-3"><i class="fa fa-clock-o"></i></span>
			</div>
		   </div>
		   <div class="col-md-10">
		    <div class="center_h1lilir">
			 <h5 class="text-white">Open Hours</h5>
			 <h6 class="mb-0 text-light font_14">WEEKDAYS 9.00-17.00, SAT: CLOSED</h6>
			</div>
		   </div>
		  </div>
		 </div>
		</div>
	   </div>
	 </div>
	</div>
	<div class="col-md-3">
	 <div class="center_h1r text-end">
	  <div class="input-group bg-white">
				<input type="text" class="form-control border-0" placeholder="Email Address">
				<span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent rounded-0 p-3 px-4 border-0" type="button">
						<i class="fa fa-pencil"></i> </button>
				</span>
		</div>
	 </div>
	</div>
  </div>
	</div>
</section>

<section id="gallery">
    <div class="container-fluid p-0">
	  <div class="contact_2 row mx-0">
      <div class="col-md-12 p-0">
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114964.53925916665!2d-80.29949920266738!3d25.782390733064336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b0a20ec8c111%3A0xff96f271ddad4f65!2sMiami%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1530774403788" height="400" style="border:0; width:100%;" allowfullscreen=""></iframe>
	  </div>
  </div>
	 <div class="homei row mx-0">
	     <div class="col-md-2 p-0">
		  <div class="homei1">
		   <div class="homei1i position-relative">
		    <div class="homei1i1">
			    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/12.jpg')}}" class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
			</div>
			<div class="homei1i2 text-center position-absolute w-100 top-0">
			  <ul class="mb-0">
		  <li class="d-inline-block me-1"><a data-bs-target="#exampleModal" data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a></li>
		  <li class="d-inline-block"><a data-bs-target="#exampleModal" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a></li>
		 </ul>
			</div>
		   </div>
		  </div>
		  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title text-black" id="exampleModalLabel">Recycling</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<img src="{{Vite::asset('resources/assets/img/12.jpg')}}" class="w-100" alt="abc"> 
			  </div>
			</div>
		  </div>
		</div>
		 </div>
		 <div class="col-md-2 p-0">
		  <div class="homei1">
		   <div class="homei1i position-relative">
		    <div class="homei1i1">
			    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/13.jpg')}}"class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
			</div>
			<div class="homei1i2 text-center position-absolute w-100 top-0">
			  <ul class="mb-0">
		  <li class="d-inline-block me-1"><a data-bs-target="#exampleModal1" data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a></li>
		  <li class="d-inline-block"><a data-bs-target="#exampleModal1" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a></li>
		 </ul>
			</div>
		   </div>
		  </div>
		  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title text-black" id="exampleModalLabel">Recycling</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<img src="{{Vite::asset('resources/assets/img/13.jpg')}}" class="w-100" alt="abc"> 
			  </div>
			</div>
		  </div>
		</div>
		 </div>
		 <div class="col-md-2 p-0">
		  <div class="homei1">
		   <div class="homei1i position-relative">
		    <div class="homei1i1">
			    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/14.jpg')}}" class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
			</div>
			<div class="homei1i2 text-center position-absolute w-100 top-0">
			  <ul class="mb-0">
		  <li class="d-inline-block me-1"><a data-bs-target="#exampleModal6" data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a></li>
		  <li class="d-inline-block"><a data-bs-target="#exampleModal6" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a></li>
		 </ul>
			</div>
		   </div>
		  </div>
		  <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title text-black" id="exampleModalLabel">Recycling</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<img src="{{Vite::asset('resources/assets/img/14.jpg')}}" class="w-100" alt="abc"> 
			  </div>
			</div>
		  </div>
		</div>
		 </div>
		 <div class="col-md-2 p-0">
		  <div class="homei1">
		   <div class="homei1i position-relative">
		    <div class="homei1i1">
			    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/15.jpg')}}" class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
			</div>
			<div class="homei1i2 text-center position-absolute w-100 top-0">
			  <ul class="mb-0">
		  <li class="d-inline-block me-1"><a data-bs-target="#exampleModal3" data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a></li>
		  <li class="d-inline-block"><a data-bs-target="#exampleModal3" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a></li>
		 </ul>
			</div>
		   </div>
		  </div>
		  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title text-black" id="exampleModalLabel">Recycling</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<img src="{{Vite::asset('resources/assets/img/15.jpg')}}" class="w-100" alt="abc"> 
			  </div>
			</div>
		  </div>
		</div>
		 </div>
		 <div class="col-md-2 p-0">
		  <div class="homei1">
		   <div class="homei1i position-relative">
		    <div class="homei1i1">
			    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/16.jpg')}}" class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
			</div>
			<div class="homei1i2 text-center position-absolute w-100 top-0">
			  <ul class="mb-0">
		  <li class="d-inline-block me-1"><a data-bs-target="#exampleModal4" data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a></li>
		  <li class="d-inline-block"><a data-bs-target="#exampleModal4" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a></li>
		 </ul>
			</div>
		   </div>
		  </div>
		  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title text-black" id="exampleModalLabel">Recycling</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<img src="{{Vite::asset('resources/assets/img/16.jpg')}}" class="w-100" alt="abc"> 
			  </div>
			</div>
		  </div>
		</div>
		 </div>
		 <div class="col-md-2 p-0">
		  <div class="homei1">
		   <div class="homei1i position-relative">
		    <div class="homei1i1">
			    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="#"><img src="{{Vite::asset('resources/assets/img/17.jpg')}}" class="w-100" alt="abc"> </a>
				  </figure>
			  </div>
			</div>
			<div class="homei1i2 text-center position-absolute w-100 top-0">
			  <ul class="mb-0">
		  <li class="d-inline-block me-1"><a data-bs-target="#exampleModal5" data-bs-toggle="modal" href="#"><i class="fa fa-link"></i></a></li>
		  <li class="d-inline-block"><a data-bs-target="#exampleModal5" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a></li>
		 </ul>
			</div>
		   </div>
		  </div>
		  <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title text-black" id="exampleModalLabel">Recycling</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<img src="{{Vite::asset('resources/assets/img/17.jpg')}}"class="w-100" alt="abc"> 
			  </div>
			</div>
		  </div>
		</div>
		 </div>
	   </div>	
	</div>
   </section>
   
<section id="footer" class="p_3">
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