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

<section id="center" class="center_team_dt">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50"> Member Detail</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Member Detail</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="team_dt" class="p_3">
<div class="container-xl">
  <div class="team_dt1 row">
    <div class="col-md-5">
	 <div class="team_dt1l">
	   <div class="team_1m text-center">
	    <div class="team_1m1 position-relative">
	     <div class="team_1m1i">
	       <img src="{{Vite::asset('resources/assets/img/34.jpg')}}" class="w-100" alt="abc">
	     </div>
		 <div class="team_1m1i1 bg_back w-100 h-100 position-absolute top-0">
	       <ul class="mb-0">
		<li class="text-white d-inline-block"><a class="bg-white d-block rounded-circle text-center col_purp font_14" href="#"><i class="fa fa-facebook"></i></a>  </li>
		<li class="text-white d-inline-block"><a class="bg-white d-block rounded-circle text-center col_purp font_14" href="#"><i class="fa fa-twitter"></i></a>  </li>
		<li class="text-white d-inline-block"><a class="bg-white d-block rounded-circle text-center col_purp font_14" href="#"><i class="fa fa-linkedin"></i></a>  </li>
		<li class="text-white d-inline-block"><a class="bg-white d-block rounded-circle text-center col_purp font_14" href="#"><i class="fa fa-youtube-play"></i></a>  </li>
	</ul>
	     </div>
	     </div>
	    <div class="team_1m2 p-4 shadow_box">
		 <h4 class="text-uppercase"><a href="#">Ipsum Porta</a></h4>
	     <h6 class="col_green mb-0">DIRECTOR</h6>
	   </div>
	 </div>
	 </div>
	</div>
	<div class="col-md-7">
	 <div class="team_dt1r">
	  <p>Hamburger brisket cupim meatloaf ham frankfurter turducken ham hock kevin fatback andouille chuck capicola bacon. Jerky tenderloin t-bone venison, strip steak chuck short ribs kielbasa beef. Bresaola cupim ham hock, shoulder beef ribs kielbasa short ribs. Kevin beef ribeye burgdoggen.</p>
	  <ul>
	   <li><i class="fa fa-check col_green me-1"></i> Ham brisket bresaola meatloaf</li>
	   <li class="mt-2"><i class="fa fa-check col_green me-1"></i> Strip steak chicken pastrami</li>
	   <li class="mt-2"><i class="fa fa-check col_green me-1"></i> Tri-tip meatloaf hamburger</li>
	  </ul>
	  <p class="mt-3">Frankfurter pancetta kevin short loin pork belly. Filet mignon corned beef tri-tip, landjaeger pancetta capicola short ribs cow ham hock swine shoulder. Sirloin strip steak short ribs corned beef porchetta biltong.</p>
	  <ul class="nav nav-tabs mb-0">
    <li class="nav-item d-inline-block">
        <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
            <span class="d-md-block">BIOGRAPHY</span>
        </a>
    </li>
	<li class="nav-item d-inline-block mx-2">
        <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
            <span class="d-md-block">SKILLS</span>
        </a>
    </li>
    <li class="nav-item d-inline-block">
        <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
            <span class="d-md-block">SEND MESSAGE</span>
        </a>
    </li>
	
</ul>
     <div class="tab-content border_1 border-top-0">
    <div class="tab-pane active" id="home">
      <div class="homei p-4">
	   <h4 class="mb-3">Biography:</h4>
		<p>Pork loin picanha leberkas meatball salami strip steak pork belly pastrami. Meatball chuck capicola pastrami strip steak. Pig jowl tri-tip turkey andouille jerky brisket drumstick. Leberkas alcatra andouille t-bone rump, shank jerky pork loin ground round beef ribs bacon strip steak corned beef.</p>
		<h4 class="mb-3">Professional Life:</h4>
		<p class="mb-0">Tri-tip short loin boudin, alcatra kielbasa tenderloin ribeye pork frankfurter flank salami pastrami fatback. Pancetta sirloin leberkas rump tail ground round alcatra andouille.</p>
	  </div>
    </div>
	<div class="tab-pane" id="profile1">
       <div class="profile1i p-4">
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
		<h6 class="fw-bold mt-3">Other   <span class="float-end fw-normal">70%</span></h6>
	   <div class="progress-bar mt-3">
			<div class="progress" style="width:70%;">
			</div>
		</div>
	 </div>
	   </div>
    </div>
    <div class="tab-pane" id="profile">
       <div class="profile_i p-4">
		  <input class="form-control rounded-3 bg-light border-0" placeholder="Full Name" type="text">
		  <input class="form-control rounded-3 bg-light border-0 mt-3" placeholder="Email Address" type="text">
		  <textarea placeholder="Message" class="form-control rounded-3 bg-light border-0 mt-3 form_text"></textarea>
		  <h6 class="mb-0 mt-3"><a class="button_1" href="#">SEND MESSAGE</a></h6>
	   </div>
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