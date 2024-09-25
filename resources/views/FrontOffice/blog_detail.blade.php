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

<section id="center" class="center_blog_dt">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50">Blog Detail</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Blog Detail</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="row blog_1">
	   <div class="col-md-8">
	     <div class="blog_1dt">
		   <div class="blog_1dt1">
		       <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/20.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1  position-absolute w-100 top-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4 rounded_30">Recycling</h6>
		   </div>
	    </div>
		     <ul class="mt-3">
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="#">Dolor Porta</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-comments me-1 col_green"></i> <a href="#">3 Comments</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="#">29 July, 2021 </a> </li>
		 </ul>
		 <h3 class="mt-3">Chuck alcatra short ribs strip steak shoulder jowl</h3>
		 <p class="mt-3">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. quis nostrud exercitation laboris nisi ut aliquip extra consequat as opposed to using ‘Content here, content here’, making it look like readable English Many desktop publishing packages sometimes.</p>
		 <p>Combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humor procure him some great pleasure.</p>
		   <div class="blog_1dt1i px-4">
		    <span><i class="fa fa-quote-right"></i></span>
			<p class="fst-italic mt-3">“Enabling global enterprises to better manage information the power innovation Quality &amp; Customer Experience It is a long established fact that a reader will be distracted”</p>
			<h6 class="mb-0 font_14"><span class="fw-bold col_green fs-5"> - Lorem Porta</span> CEO lab director</h6>
		   </div>
		   <h4 class="mt-4 mb-3">What do recruiters look for?</h4>
		   <p>Lorem ipsum dolor sit, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. quis nostrud exercitation laboris nisi ut aliquip extra consequat as opposed to using ‘Content here, content here’, making it look like readable English Many desktop publishing packages sometimes.</p>
		   <p>Combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humor procure him some great pleasure.</p>
		   <div class="list_1dt2i row">
		 <div class="col-md-6">
		   <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/9.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		 </div>
		 <div class="col-md-6">
		   <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="{{Vite::asset('resources/assets/img/10.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		 </div>
		</div>
		<ul class="mt-3 ps-3">
		<li><i class="fa fa-check me-1 align-middle col_green"></i> We help digital companies to volume their self-interest</li>
		<li class="mt-2"><i class="fa fa-check me-1 align-middle col_green"></i> Preparing for your success we provide truly Develop and Propose</li>
		<li class="mt-2"><i class="fa fa-check me-1 align-middle col_green"></i> Assess your business opportunities for bigger success</li>
		<li class="mt-2"><i class="fa fa-check me-1 align-middle col_green"></i> Cost savings is crucial, and the innovative technology</li>
		</ul>
		<p class="mt-3">That it has a more-or-less normal distribution of letters, as opposed to using Content here, making it look like readable English and a search for will uncover many web sites still in their infancy. Technology strategy and the roadmap to implement that? The leaders are owning their data, refreshing it constantly and, more importantly, using it to inform the business they’re making the technology that underpins that’s impacting these In World.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. quis nostrud exercitation laboris nisi ut aliquip extra consequat as opposed to using ‘Content here, content here’, making it look like readable English Many desktop publishing packages sometimes by accident, sometimes on purpose.</p>
		<h5 class="mb-3 col_green center_sm">Tags :</h5>
		<ul class="mb-0 tags center_sm">
		 <li class="d-inline-block"><a href="blog_detail.html">Biology</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Design</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Employee</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Engineer</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Research</a></li>
		</ul>
		<h5 class="mb-3 mt-3 col_green center_sm">Share :</h5>
		<ul class="social-network social-circle mb-0 social_tag center_sm">
					<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-dribbble"></i></a></li>
				</ul>
		   </div>
		   <div class="blog_1dt2 mt-4">
		    <h3>3 Replies to “Methods of the recruitment”</h3>
			<div class="blog_1dt2i row mt-4">
			 <div class="col-md-2">
			  <div class="blog_1dt2il">
			   <span class="d-inline-block text-center bg-white col_green rounded-circle font_50"><i class="fa fa-user"></i></span>
			  </div>
			 </div>
			 <div class="col-md-10">
			  <div class="blog_1dt2ir bg-white p-4">
			   <h6 class="fw-bold">Lorem Amet <a class="col_green  float-end" href="#">Reply <i class="fa fa-long-arrow-right  ms-1 align-middle"></i></a></h6>
			   <h6 class="font_14 mt-3 mb-3"><i class="fa fa-clock-o col_green me-1"></i> November 22, 2019 at 9:26 am</h6>
			   <p class="mb-0">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			  </div>
			 </div>
			</div>
			<div class="blog_1dt2i row mt-4">
			 <div class="col-md-2">
			  <div class="blog_1dt2il">
			   <span class="d-inline-block text-center bg-white col_green rounded-circle font_50"><i class="fa fa-user"></i></span>
			  </div>
			 </div>
			 <div class="col-md-10">
			  <div class="blog_1dt2ir bg-white p-4">
			   <h6 class="fw-bold">Nulla Quis <a class="col_green  float-end" href="#">Reply <i class="fa fa-long-arrow-right  ms-1 align-middle"></i></a></h6>
			   <h6 class="font_14 mt-3 mb-3"><i class="fa fa-clock-o col_green me-1"></i> November 27, 2019 at 9:29 am</h6>
			   <p class="mb-0">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			  </div>
			 </div>
			</div>
			<div class="blog_1dt2i row mt-4">
			 <div class="col-md-2">
			  <div class="blog_1dt2il">
			   <span class="d-inline-block text-center bg-white col_green rounded-circle font_50"><i class="fa fa-user"></i></span>
			  </div>
			 </div>
			 <div class="col-md-10">
			  <div class="blog_1dt2ir bg-white p-4">
			   <h6 class="fw-bold">Sem Ipsum <a class="col_green  float-end" href="#">Reply <i class="fa fa-long-arrow-right  ms-1 align-middle"></i></a></h6>
			   <h6 class="font_14 mt-3 mb-3"><i class="fa fa-clock-o col_green me-1"></i> November 30, 2019 at 9:36 am</h6>
			   <p class="mb-0">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			  </div>
			 </div>
			</div>
		   </div>
		   <div class="blog_1dt3 mt-4">
		    <h3>Leave a Reply</h3>
			<p>Your email address will not be published. Required fields are marked *</p>
			<div class="row blog_1dt3i">
			 <div class="col-md-4">
			  <div class="blog_1dt3il">
			    <input class="form-control" placeholder="Name" type="text">
			  </div>
			 </div>
			 <div class="col-md-4">
			  <div class="blog_1dt3il">
			    <input class="form-control" placeholder="Email" type="text">
			  </div>
			 </div>
			 <div class="col-md-4">
			  <div class="blog_1dt3il">
			    <input class="form-control" placeholder="Website" type="text">
			  </div>
			 </div>
			</div>
			<div class="row blog_1dt3i mt-3">
			 <div class="col-md-12">
			  <div class="blog_1dt3il">
			    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="customCheck1">
        <label class="form-check-label" for="customCheck1">Save my name, email, and website in this browser for the next time I comment.</label>
    </div>
	            <textarea placeholder="Enter Your Comment" class="form-control mt-3 form_text"></textarea>
				<h6 class="mb-0 center_sm mt-4"><a class="button_1" href="#"> SEND COMMENT </a></h6>
			  </div>
			 </div>
			 
			</div>
		   </div>
		 </div>
	   </div>
	   <div class="col-md-4">
	    <div class="blog_1r">
		  <div class="blog_1r1 p-4 shadow_box bg-white">
		  <h4>Filter</h4>
		  <hr class="line mb-4">
		  <div class="input-group border_1">
				<input type="text" class="form-control border-0" placeholder="Search Here">
				<span class="input-group-btn">
					<button class="btn btn-primary col_green bg-transparent rounded-0 p-3 px-4 border-0" type="button">
						<i class="fa fa-search"></i> </button>
				</span>
		</div>
		 </div>
		 <div class="blog_1r1 p-4 shadow_box bg-white  mt-4">
		  <h4>Latest Posts</h4>
		  <hr class="line mb-4">
		  <div class="blog_1r1i row">
		 <div class="col-md-3 pe-0 col-3">
		  <div class="blog_1r1il">
		    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="blog_detail.html"><img src="{{Vite::asset('resources/assets/img/13.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		  </div>
		 </div>
		 <div class="col-md-9 col-9">
		  <div class="blog_1r1ir">
		   <h6 class="fw-bold lh-1"><a href="blog_detail.html">6 Ideas To Help You Become The Manager</a></h6>
		   <h6 class="text-muted font_14 mb-0"><i class="fa fa-calendar col_green me-1"></i> Feb 21, 2022</h6>
		  </div>
		 </div>
		</div><hr>
		   <div class="blog_1r1i row">
		 <div class="col-md-3 pe-0 col-3">
		  <div class="blog_1r1il">
		    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="blog_detail.html"><img src="{{Vite::asset('resources/assets/img/14.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		  </div>
		 </div>
		 <div class="col-md-9 col-9">
		  <div class="blog_1r1ir">
		   <h6 class="fw-bold lh-1"><a href="blog_detail.html">How To Sell Yourself In A Job Interview</a></h6>
		   <h6 class="text-muted font_14 mb-0"><i class="fa fa-calendar col_green me-1"></i> Feb 22, 2022</h6>
		  </div>
		 </div>
		</div><hr>
		<div class="blog_1r1i row">
		 <div class="col-md-3 pe-0 col-3">
		  <div class="blog_1r1il">
		    <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
					<a href="blog_detail.html"><img src="{{Vite::asset('resources/assets/img/15.jpg')}}" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		  </div>
		 </div>
		 <div class="col-md-9 col-9">
		  <div class="blog_1r1ir">
		   <h6 class="fw-bold lh-1"><a href="blog_detail.html">Tech Products That Makes Its Easier to Stay at Home</a></h6>
		   <h6 class="text-muted font_14 mb-0"><i class="fa fa-calendar col_green me-1"></i> Feb 23, 2022</h6>
		  </div>
		 </div>
		</div>
		
		 </div>
		 <div class="blog_1r1 p-4 shadow_box bg-white mt-4">
		  <h4>Categories</h4>
		  <hr class="line mb-4">
		  <h6><a href="blog_detail.html">Construction <span class="pull-right">(03)</span></a></h6><hr>
		  <h6><a href="blog_detail.html">Development <span class="pull-right">(05)</span></a></h6><hr>
		  <h6><a href="blog_detail.html">Human Resources <span class="pull-right">(04)</span></a></h6><hr>
		  <h6><a href="blog_detail.html">Manufacturing <span class="pull-right">(07)</span></a></h6><hr>
		  <h6><a href="blog_detail.html">Production <span class="pull-right">(09)</span></a></h6><hr>
		  <h6 class="mb-0"><a href="blog_detail.html">Web Development <span class="pull-right">(02)</span></a></h6>
		 </div>
		 <div class="blog_1r1 p-4 shadow_box bg-white mt-4">
		  <h4>Tags</h4>
		  <hr class="line mb-4">
		<ul class="mb-0">
		 <li class="d-inline-block"><a href="blog_detail.html">Biology</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Design</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Employee</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Engineer</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Industry</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Machinery</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Tools</a></li>
		 <li class="d-inline-block"><a href="blog_detail.html">Research</a></li>
		</ul>
		 </div>
		 <div class="blog_1r1 p-4 shadow_box bg-white mt-4">
		  <h4>Newsletter</h4>
		  <hr class="line mb-4">
		  <p class="center_sm">Sign Up for Our Newsletter!</p>
		  <input class="form-control" placeholder="Subscribe" type="text">
		  <h6 class="mb-0 mt-3 center_sm"><a class="button" href="blog_detail.html">Subscribe</a></h6>
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