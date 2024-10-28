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
    <!-- Font Awesome 5 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
	    <h2 class="text-white text-uppercase font_50">Recycled Products</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="{{route('index')}}">Home</a> <span class="mx-2 text-white-50">/</span> Recycled Products </h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
 
 <section id="team" class="p_3">
    <!-- Adjusted Search Form centered and with appropriate width -->
    <form method="GET" action="{{ route('FrontOffice.RecycledProduct.index', $salesCenter->id) }}" class="mb-4 d-flex justify-content-center" id="searchForm">
    <div class="row w-100 justify-content-center">
        <!-- Search Section -->
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="input-group shadow-sm">
            <span class="input-group-text bg-success text-white"><i class="fas fa-search"></i></span>
            <input type="text" name="searchQuery" class="form-control border-0" placeholder="Search by Name or Description or Price" value="{{ request('searchQuery') }}" id="searchInput">
            </div>
        </div>

        <!-- Sort Section -->
        <div class="col-md-4 mb-3">
            <select name="sortBy" class="form-select shadow-sm border-0" id="sortSelect">
                <option value="" disabled {{ request('sortBy') ? '' : 'selected' }}>Sort By</option>
                <option value="name" {{ request('sortBy') === 'name' ? 'selected' : '' }}>Name</option>
                <option value="quantity" {{ request('sortBy') === 'quantity' ? 'selected' : '' }}>Quantity</option>
                <option value="price" {{ request('sortBy') === 'price' ? 'selected' : '' }}>Price</option>
                <option value="created_at" {{ request('sortBy') === 'created_at' ? 'selected' : '' }}>Date Added</option>
            </select>
        </div>

      
    </div>
</form>

<script>
    // Automatically submit the form when the sorting option is changed
    document.getElementById('sortSelect').addEventListener('change', function() {
        document.getElementById('searchForm').submit();
    });
    
    // Submit the form when the search input changes only if it contains a full word
    document.getElementById('searchInput').addEventListener('input', function() {
        const inputValue = this.value.trim();
        
        // Check if the input contains a full word (minimum of 3 characters)
        if (inputValue.length >= 10 && inputValue.split(' ').length > 0) { // Change 3 to the desired minimum length
            document.getElementById('searchForm').submit();
        }
    });
</script>


 <div class="container-xl">
        <div class="row team_1">
        @foreach ($recycledProducts as $product)
        <div class="col-md-4">
                <div class="team_1m text-center">
                    <div class="team_1m1 position-relative">
                        <div class="team_1m1i">
                        <img src="{{ asset('images/' . $product->image) }}" alt="Image actuelle" class="center-img" >
                        </div>
                        <div class="team_1m1i1 bg_back w-100 h-100 position-absolute top-0">
                            <ul class="mb-0">
                                <li class="text-white d-inline-block">
                                <a class="btn btn-outline-light text-uppercase font-weight-bold text-nowrap px-5 py-1 w-100" 
   href="{{ route('FrontOffice.RecycledProduct.show', ['salesCenterId' => $salesCenter->id, 'productId' => $product->id]) }}" 
   role="button" 
   aria-label="View details for {{ $product->name }}">
    Details
</a>


                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="team_1m2 p-4 shadow_box">
    <h4 class="text-uppercase"><a href="{{ route('detail') }}">{{ $product->name }}</a></h4>
    <p class="mb-0 text-black">
    <strong>Quantity:</strong> <span class="text-muted">{{$product->quantity }}</span>
</p>
<p class="col_green">
    <strong>Price:</strong> <span class="col_green text-muted">${{ $product->price  }} </span>
</p>

</div>

                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <a href="{{ route('FrontOffice.salesCenters.index')}}" class="btn btn-success  ms-5">Back to Sales Centers</a>
</section>

    <!-- Pagination -->
<div class="col-lg-12 d-flex justify-content-center">
    <div class="bs-component">
        <ul class="pagination ">
            <li class="page-item {{ $recycledProducts->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $recycledProducts->previousPageUrl() }}">«</a>
            </li>
            @for ($i = 1; $i <= $recycledProducts->lastPage(); $i++)
                <li class="page-item {{ $recycledProducts->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $recycledProducts->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $recycledProducts->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $recycledProducts->nextPageUrl() }}">»</a>
            </li>
        </ul>
    </div>
</div>
<!-- End Pagination -->
    
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