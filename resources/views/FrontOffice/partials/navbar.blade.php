<nav class="navbar navbar-expand-md navbar-light bg-white shadow_box" id="navbar_sticky">
  <div class="container-xl">
    <a class="text-black p-0 navbar-brand fw-bold me-0" href="{{route('index')}}"><i class="fa fa-recycle me-1 col_green align-middle"></i> Recycling</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	   <ul class="navbar-nav mb-0 nav_left ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('index')}}">Home</a>
        </li>
		 
		<li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}" href="{{route('about')}}">About </a>
        </li>
		
		<li class="nav-item">
          <a class="nav-link {{ Route::currentRouteNamed('services') ? 'active' : '' }}" href="{{route('services')}}">Services </a>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Team
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item {{ Route::currentRouteNamed('team') ? 'active' : '' }}" href="{{route('team')}}" > Team</a></li>
            <li><a class="dropdown-item border-0 {{ Route::currentRouteNamed('detail') ? 'active' : '' }}" href="{{route('detail')}}"> Team Detail</a></li>
          </ul>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Blog
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item {{ Route::currentRouteNamed('blog') ? 'active' : '' }}" href="{{route('blog')}}" > Blog</a></li>
            <li><a class="dropdown-item border-0 {{ Route::currentRouteNamed('blog_detail') ? 'active' : '' }}"  href="{{route('blog_detail')}}" > Blog Detail</a></li>
          </ul>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pages
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item {{ Route::currentRouteNamed('faq') ? 'active' : '' }}" href="{{route('faq')}}" > Faq</a></li>
            <li><a class="dropdown-item border-0 {{ Route::currentRouteNamed('contact') ? 'active' : '' }}" href="{{route('contact')}}" > Contact Us</a></li>
          </ul>
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
    </div>
  </div>
</nav>