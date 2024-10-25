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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @vite(['resources/assets/js/bootstrap.bundle.min.js'])

    <style>
        .framed-background {
            background-color: #f9f9f9; /* Light background */
            padding: 20px; /* Space between the content and the border */
            /* border: 1px solid #ccc; Light gray border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            margin-bottom: 40px; /* Space below each section */
        }

        .title-section {
            background-color: #f0f0f0; 
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px; 
        }

        .title-section h2, .title-section h5 {
            margin: 0; 
        }

        .card-container {
            margin-top: 20px; 
        }

        .blog_h1i {
            transition: transform 0.3s; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            overflow: hidden; 
            height: 100%; 
            margin-bottom: 30px; 
        }

        .blog_h1i:hover {
            transform: scale(1.05); 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
        }

        .blog_h1i1 img {
            width: 100%; 
            height: 200px; 
            object-fit: cover; 
        }

        .blog_h1i2 {
            padding: 20px; 
            display: flex; 
            flex-direction: column; 
            flex-grow: 1; 
        }


.col_red {
    color: red;
}


    </style>
</head>
<body>

<section id="top" class="bg_green pt-2 pb-2">
    <div class="container-xl">
        <div class="row top_1">
            <div class="col-md-8">
                <div class="top_1l">
                    <ul class="mb-0">
                        <li class="text-white d-inline-block">Welcome to EcoCycle</li>
                        <li class="text-white d-inline-block mx-2">|</li>
                        <li class="d-inline-block"><a class="text-white" href="#">How to Find Us</a></li>
                        <li class="text-white d-inline-block mx-2">|</li>
                        <li class="d-inline-block"><a class="text-white" href="#">Give Feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top_1r text-end">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 bg-transparent text-white" placeholder="Search Keyword">
                        <span class="input-group-btn">
                            <button class="btn btn-primary col_green bg-transparent rounded-0 p-1 px-3 border-0" type="button">
                                <i class="fa fa-search"></i>
                            </button>
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

<section id="delivery-agencies" class="p_3 framed-background">
    <div class="container-xl">
        <div class="row title-section text-center">
            <div class="col-md-12">
                <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
                <h2 class="mt-2">Our Delivery Agencies</h2>
                <h5 class="mt-3 mb-0">Choose an agency that suits you best</h5>
            </div>
        </div>
        <div class="row card-container">
            @foreach($agences as $agence)
            <div class="col-md-4 mb-4"> 
            <div class="blog_h1i shadow_box position-relative">
    <div class="blog_h1i1 position-relative">
        <div class="blog_h1i1i">
            <div class="grid clearfix">
                <figure class="effect-jazz mb-0">
                    <a href="{{ route('delivery-agences.show', $agence->id) }}">
                        <img src="{{ asset($agence->image) }}" class="w-100" alt="{{ $agence->name }}">
                    </a>
                </figure>
            </div>
        </div>
        <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
            <h6 class="mb-0 d-inline-block bg_green p-2 text-white px-4">{{ $agence->name }}</h6>
        </div>
    </div>

    <div class="blog_h1i2 bg-white" style="padding: 15px;">
        
    <ul class="d-flex align-items-start justify-content-between">
    <div class="d-inline-block">
        
     <!-- <li class="d-inline-block text-end  " >
        <i class="fa fa-clock-o me-1 col_green"></i> 
        <span>{{ $agence->opening_hours }}</span>
    </li> -->
        <li class="d-block">
            <i class="fa fa-map-marker me-1 col_green"></i> 
            {{ $agence->address }}
        </li>
        <li class="d-inline-block">
        <i class="fa fa-phone me-1 col_green"></i> 
        {{ $agence->phoneNumber }}
    </li>
    <span class="mx-1 text-muted">|</span> 
    <li class="d-inline-block">
        <i class="fa fa-clock-o me-1 col_green"></i> 
        <span>{{ $agence->opening_hours }}</span>
    </li>
    <span class="mx-1 text-muted">|</span> 
    <li class="d-inline-block">
    <i class="fa fa-clock-o me-1 col_red"></i> 
    <span>{{ $agence->closing_hours }}</span>
    </li>
  
    </div>
</ul>



        <p style="margin-bottom: 5px;">{{ Str::limit($agence->description, 100) }}</p>

        <!-- Nouvelle disposition des heures -->
        <!-- <div class="new-hours-box mt-0">
    <div class="time-block">
        <i class="fas fa-clock me-1"></i>
        <span>{{ $agence->opening_hours }}</span>
    </div>
    <div class="arrow-icon">
        <i class="fa fa-arrow-right"></i>
    </div>
    <div class="time-block">
        <span>{{ $agence->closing_hours }}</span>
    </div>
</div> -->

        <!-- <h6 class="mb-0 fw-bold mt-2"><a href="{{ route('delivery-agences.show', $agence->id) }}">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6> -->
        <h6 class="mb-0 fw-bold mt-2">
    <a href="{{ route('front.deliveryagence.special-services', $agence->id) }}">View Services <i class="fa fa-chevron-right ms-1 font_12"></i></a>
</h6>


    </div>

                </div>
            </div>
            @endforeach
        </div>

        <div class="row sched_1 mt-4 text-center">
            <div class="col-md-12">
                <div class="sched_1i">
                    <h6 class="mb-0"><a class="button_1" href="#">Explore More</a></h6>
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


    <!-- Scripts JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
