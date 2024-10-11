{{-- resources/views/FrontOffice/RecycledProduct/show.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/team.css'])
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/assets/js/bootstrap.bundle.min.js'])
</head>
<body>

<section id="header">
    @include('FrontOffice.partials.navbar')
</section>
<section id="center" class="center_team">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
	    <h2 class="text-white text-uppercase font_50">Product Details</h2>
	    <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="{{route('index')}}">Home</a> <span class="mx-2 text-white-50">/</span> Recycled Products Details</h6>
	 </div>
  </div>
 </div>
   </div>   
 </section>
<section id="product-details" class="p-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">  <!-- Utilisez col-md-6 pour réduire la largeur de la carte -->
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-5"> <!-- Réduit la taille de l'image -->
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img" alt="{{ $product->name }}">
                        </div>
                        <div class="col-md-7"> <!-- Ajuste la largeur du texte -->
                            <div class="card-body">
                            <h5 class="card-title text-success">{{ $product->name }}</h5> <!-- Ajout de la classe text-success -->
                            <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><strong>Quantity:</strong> <span class="text-muted">{{ $product->quantity }}</span></p>
                                <p class="card-text"><strong>Price:</strong> <span class="text-muted">${{ $product->price }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('FrontOffice.RecycledProduct.index', $salesCenter->id) }}" class="btn btn-success">Back to Products</a>

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
// Your sticky navbar code here, if necessary
</script>

</body>
</html>
