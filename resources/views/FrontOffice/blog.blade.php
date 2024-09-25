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

<section id="center" class="center_blog">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50">Blog</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Blog</h6>
	    
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="row blog_1">
	   <div class="col-md-8">
	    <div class="blog_1l">
		  <div class="blog_1l1">
		    <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="blog_detail.html"><img src="{{Vite::asset('resources/assets/img/19.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1  position-absolute w-100 top-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4 rounded-3">Recycling</h6>
		   </div>
	    </div>
		     <ul class="mt-3">
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="blog_detail.html">Dolor Porta</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-comments me-1 col_green"></i> <a href="blog_detail.html">3 Comments</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="blog_detail.html">29 July, 2021 </a> </li>
		 </ul>
		 <h3 class="mt-3">Chuck alcatra short ribs strip steak shoulder jowl</h3>
		 <p class="mt-3">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. quis nostrud exercitation laboris nisi ut aliquip extra consequat as opposed to using ‘Content here, content here’, making it look like readable English Many desktop publishing packages sometimes.</p>
		  <div class="blog_1l1i row mt-4">
		   <div class="col-md-4">
		    <div class="blog_1l1il">
			  <h6 class="mb-0"><a class="button_2" href="blog_detail.html">Read Continue <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
			</div>
		   </div>
		   <div class="col-md-8">
		    <div class="blog_1l1ir text-end">
			  <ul class="social-network social-circle mb-0">
					<li><a href="blog_detail.html" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="blog_detail.html" class="icoGoogle" title="Google +"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="blog_detail.html" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="blog_detail.html" class="icoRss" title="Rss"><i class="fa fa-dribbble"></i></a></li>
				</ul>
			</div>
		   </div>
		  </div>
		  </div><hr class="mt-4 mb-4">
		  <div class="blog_1l1">
		    <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="blog_detail.html"><img src="{{Vite::asset('resources/assets/img/20.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1  position-absolute w-100 top-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4 rounded-3">Recycling</h6>
		   </div>
	    </div>
		     <ul class="mt-3">
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="blog_detail.html">Dolor Porta</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-comments me-1 col_green"></i> <a href="blog_detail.html">3 Comments</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="blog_detail.html">29 July, 2021 </a> </li>
		 </ul>
		 <h3 class="mt-3">Tail doner short ribs meatball jowl pork loin biltong</h3>
		 <p class="mt-3">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. quis nostrud exercitation laboris nisi ut aliquip extra consequat as opposed to using ‘Content here, content here’, making it look like readable English Many desktop publishing packages sometimes.</p>
		  <div class="blog_1l1i row mt-4">
		   <div class="col-md-4">
		    <div class="blog_1l1il">
			  <h6 class="mb-0"><a class="button_2" href="blog_detail.html">Read Continue <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
			</div>
		   </div>
		   <div class="col-md-8">
		    <div class="blog_1l1ir text-end">
			  <ul class="social-network social-circle mb-0">
					<li><a href="blog_detail.html" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="blog_detail.html" class="icoGoogle" title="Google +"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="blog_detail.html" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="blog_detail.html" class="icoRss" title="Rss"><i class="fa fa-dribbble"></i></a></li>
				</ul>
			</div>
		   </div>
		  </div>
		  </div><hr class="mt-4 mb-4">
		  <div class="blog_1l1">
		    <div class="blog_h1i1 position-relative">
	       <div class="blog_h1i1i">
		    <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="blog_detail.html"><img src="{{Vite::asset('resources/assets/img/21.jpg')}}" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		   </div>
		   <div class="blog_h1i1i1  position-absolute w-100 top-0 p-3">
		     <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4 rounded-3">Recycling</h6>
		   </div>
	    </div>
		     <ul class="mt-3">
		  <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> <a href="blog_detail.html">Dolor Porta</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-comments me-1 col_green"></i> <a href="blog_detail.html">3 Comments</a> <span class="text-muted mx-2">|</span></li>
		  <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> <a href="blog_detail.html">29 July, 2021 </a> </li>
		 </ul>
		 <h3 class="mt-3">Short loin pork chop kielbasa chicken bacon meatloaf</h3>
		 <p class="mt-3">Lorem ipsum dolor sit, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. quis nostrud exercitation laboris nisi ut aliquip extra consequat as opposed to using ‘Content here, content here’, making it look like readable English Many desktop publishing packages sometimes.</p>
		
		  <div class="blog_1l1i row mt-4">
		   <div class="col-md-4">
		    <div class="blog_1l1il">
			  <h6 class="mb-0"><a class="button_2" href="blog_detail.html">Read Continue <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
			</div>
		   </div>
		   <div class="col-md-8">
		    <div class="blog_1l1ir text-end">
			  <ul class="social-network social-circle mb-0">
					<li><a href="blog_detail.html" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="blog_detail.html" class="icoGoogle" title="Google +"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="blog_detail.html" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="blog_detail.html" class="icoRss" title="Rss"><i class="fa fa-dribbble"></i></a></li>
				</ul>
			</div>
		   </div>
		  </div>
		  </div><hr class="mt-4 mb-4">
		  <div class="pages  text-center mt-4">
		 <ul class="mb-0">
			<li><a href="blog_detail.html"><i class="fa fa-chevron-left"></i></a></li>
			<li><a class="act" href="blog_detail.html">1</a></li>
			<li><a href="blog_detail.html">2</a></li>
			<li><a href="blog_detail.html">3</a></li>
			<li><a href="blog_detail.html">4</a></li>
			<li><a href="blog_detail.html">5</a></li>
			<li><a href="blog_detail.html">6</a></li>
			<li><a href="blog_detail.html"><i class="fa fa-chevron-right"></i></a></li>
		   </ul>    
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