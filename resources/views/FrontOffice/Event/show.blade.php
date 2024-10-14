<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $event->title }} - EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css', 
           'resources/assets/css/font-awesome.min.css', 
           'resources/assets/css/global.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    @vite(['resources/assets/js/bootstrap.bundle.min.js'])
</head>
<body>

<section id="header">
    @include('FrontOffice.partials.navbar')
</section>

<div class="container mt-5">
    <h1 class="text-center mb-4">{{ $event->title }}</h1>
    <div class="text-center mb-4">
        <img src="{{ asset('storage/' . $event->image_url) }}" alt="{{ $event->title }}" class="img-fluid" style="max-height: 400px; object-fit: cover;">
    </div>
    <div class="event-details">
        <h4>Description</h4>
        <p>{{ $event->description }}</p>

        <h5>Date:</h5>
        <p>{{ $event->date }}</p>

        <h5>Location:</h5>
        <p>{{ $event->location }}</p>

        <a href="{{ route('event.participate', $event->id) }}" class="btn btn-success mt-2">Participate</a>
    </div>
</div>

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

</body>
</html>
