<nav class="navbar navbar-expand-md navbar-light bg-white shadow_box" id="navbar_sticky">
  <div class="container-xl">
    <a class="text-black p-0 navbar-brand fw-bold me-0" href="{{route('index')}}"><i class="fa fa-recycle me-1 col_green align-middle"></i> EcoCycle</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <!-- New Menu Items -->

	  <ul class="navbar-nav mb-0 nav_left ms-auto">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}" href="{{route('about')}}">About </a>
    </li>
    
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Centers
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item {{ Route::currentRouteNamed('Centers') ? 'active' : '' }}" href="{{route('team')}}" > Depot Centers </a></li>
            <li><a class="dropdown-item border-0 {{ Route::currentRouteNamed('detail') ? 'active' : '' }}" href="{{route('detail')}}"> Delivery Centers</a></li>
            <li><a class="dropdown-item border-0 {{ Route::currentRouteNamed('detail') ? 'active' : '' }}" href="{{route('detail')}}"> Recycling Centers</a></li>
            <li><a class="dropdown-item border-0 {{ Route::currentRouteNamed('detail') ? 'active' : '' }}" href="{{route('detail')}}"> Sales Centers</a></li>

          </ul>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteNamed('events') ? 'active' : '' }}" href="{{route('services')}}">Events</a>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteNamed('awareness') ? 'active' : '' }}" href="{{route('services')}}">Awareness</a>
    </li>
</ul>

      <ul class="navbar-nav mb-0 ms-auto mt-1">
		<li class="nav-item">
          <a class="nav-link social_link" href="#"><i class="fa fa-facebook"></i></a>
        </li>
		<li class="nav-item">
          <a class="nav-link social_link mx-2" href="#"><i class="fa fa-instagram"></i></a>
        </li>
		<li class="nav-item">
          <a class="nav-link social_link" href="#"><i class="fa fa-linkedin"></i></a>
        </li>
      </ul>
      
       <!-- Admin Panel Button -->
       <ul class="navbar-nav mb-0 ms-auto mt-1">
        <li class="nav-item">
        <a class="btn btn-success" href="{{route('dashboard')}}" role="button">Admin Panel</a>
        </li>
      </ul>
    </div>
  </div>
</nav>