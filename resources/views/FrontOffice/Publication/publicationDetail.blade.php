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
    @vite(['resources/assets/css/awareness.css'])
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
	    <h2 class="text-white text-uppercase font_50">Publication Detail</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="{{route('index')}}">Home</a> <span class="mx-2 text-white-50">/</span> Publication Detail</h6>
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
                        @if(isset($publication))
                            <div class="blog_h1i1 position-relative">
                                <div class="blog_h1i1i">
                                    <div class="grid clearfix">
                                        <figure class="effect-jazz mb-0">
                                            <img src="{{ asset($publication->content) }}" alt="{{ $publication->title }}" class="w-100 fixed-size-img">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <ul class="mt-3">
                                <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i>{{$publication->user->name}}<span class="text-muted mx-2">|</span></li>
                                <li class="d-inline-block"><i class="fa fa-comments me-1 col_green"></i> {{ $commentCount }} Comment<span class="text-muted mx-2">|</span></li>
                                <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> {{ $publication->created_at->format('d F, Y') }} </li>
                            </ul>
                            <h3 class="mt-3 mb-5">{{ $publication->title }}</h3>
                            <hr class="my-4 text-primary border-4 w-100 mx-auto">
                            <p>{!! $publication->description !!}</p>
                            <hr class="my-4 text-primary border-4 w-100 mx-auto mt-4">
                            
                            <h3 class="mt-3 mb-5"> <i class="fa fa-solid fa-comments "></i> Comment...</h3>
                            @include('FrontOffice.Comments.index')    

                            <div class="col-md-6 mt-4">
                            <div class="sched_1i">
                                <form action="{{ route('comment.store', ['publication' => $publication->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3  textarea-large">
                                    <textarea name="content" placeholder="Add a comment" rows="4" class="form-control border-4"></textarea>
                                    <span class="input-group-append">
                                        <button class="btn btn-primary col_green bg-transparent p-3 mt-3 px-4 border-0" type="submit">
                                            <i class="fa fa-regular fa-paper-plane fa-2x"></i>
                                        </button>
                                    </span>
                                </div>
                                </form>
                            </div>
                        </div>
                  
                        @else
                            <p>Publication non trouvée.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog_1r1 p-4 shadow_box bg-white mt-4">
                    <h4>Latest Posts</h4>
                    <hr class="line mb-4">
                    @include('FrontOffice.Publication.latestPublication', ['latestPublications' => $latestPublications])
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