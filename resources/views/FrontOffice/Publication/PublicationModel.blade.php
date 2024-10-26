<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/assets/css/awareness.css'])
    <title>Document</title>
</head>
<body>
@foreach($publications as $publication)
               <div class="blog_1l1">
                  <div class="blog_h1i1 position-relative">
                     <div class="blog_h1i1i">
                        <div class="grid clearfix">
                           <figure class="effect-jazz mb-0">
                                <a href="{{ route('awareness.show', $publication->id) }}">
                                    <img src="{{ $publication->content }}" class="w-100 fixed-size-img" alt="{{ $publication->title }}">
                                </a>
                           </figure>
                        </div>
                     </div>
                  </div>
                  <ul class="mt-3">
                     <li class="d-inline-block"><i class="fa fa-user me-1 col_green"></i> Admin admin <span class="text-muted mx-2">|</span></li>
                     <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_green"></i> {{ $publication->created_at->format('d F, Y') }} </li>
                  </ul>
                  <h3 class="mt-3">{{$publication->title}}</h3>
                  <p class="mt-3">{!! Str::limit(strip_tags($publication->description), 300) !!}</p>
                  <div class="blog_1l1i row mt-4">
                     <div class="col-md-4">
                        <div class="blog_1l1il">
                           <h6 class="mb-0"><a class="button_2" href="{{ route('awareness.show', $publication->id) }}">Read Continue <i class="fa fa-long-arrow-right ms-1"></i></a></h6>
                        </div>
                     </div>
                  </div>
                  <hr class="mt-4 mb-4">
               </div>
@endforeach
</body>
</html>
