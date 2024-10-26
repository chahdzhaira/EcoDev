<nav class="navbar navbar-expand-md navbar-light bg-white shadow_box" id="navbar_sticky">
    <div class="container-xl">
        <a class="text-black p-0 navbar-brand fw-bold me-0" href="{{route('index')}}">
            <i class="fa fa-recycle me-1 col_green align-middle"></i> EcoCycle
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- New Menu Items -->
            <ul class="navbar-nav mb-0 mt-1 nav_left ms-auto">
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
                        <li><a class="dropdown-item {{ Route::currentRouteNamed('Centers') ? 'active' : '' }}" href="{{route('team')}}"> Depot Centers </a></li>
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
            <ul class="navbar-nav mb-0 ms-auto mt-0">
                @if (Auth::check())
                    <!-- User is logged in -->
                    <li class="nav-item">
                        @if (Auth::user()->role != 0) <!-- If the role is not a normal user -->
                            <a class="btn btn-success mt-2" href="{{ route('dashboard') }}" role="button">Admin Panel</a>
                        @endif
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : Vite::asset('resources/assets/img/avatars/user-avatar.png') }}" 
                                 class="rounded-circle" alt="User Avatar" width="30" height="30"> <!-- Taille réduite ici -->
                            {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- User is not logged in -->
                    <li class="nav-item mt-2">
                        <a class="btn btn-success" href="{{ route('login') }}" role="button">Log in</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="btn btn-secondary ms-2" href="{{ route('register') }}" role="button">Sign up</a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
