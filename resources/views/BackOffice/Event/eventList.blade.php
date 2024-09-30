<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events - Vali Admin</title>
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
        @include('BackOffice.partials.navbar')
    </header>

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <!-- Main content -->
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-laptop"></i> Events</h1>
                <p>Manage your events here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Events</li>
                <li class="breadcrumb-item"><a href="#">List</a></li>
            </ul>
        </div>

        <!-- Button to Create New Event -->
        <div class="mb-4">
            <a href="{{ route('events.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Event
            </a>
        </div>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Bar -->
        <form method="GET" action="{{ route('events.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search by title..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <!-- Event Cards -->
        <div class="row">
    @foreach($events as $event)
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ $event->title }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $event->description }}</p>
                <p><strong>Date:</strong> {{ $event->date }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Organizer:</strong> {{ $event->organizer }}</p>
                <p><strong>Max Participants:</strong> {{ $event->max_participants }}</p>
                <p><strong>Image URL:</strong> <a href="{{ $event->image_url }}">{{ $event->image_url }}</a></p>
                <p><strong>Created At:</strong> {{ $event->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $event->updated_at }}</p>

                <!-- Boutons Modifier et Supprimer -->
                <div class="mt-3">
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Modifier
                    </a>

                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination pagination-sm">
                    {{-- Lien vers la page précédente --}}
                    @if ($events->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">«</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $events->previousPageUrl() }}">«</a>
                        </li>
                    @endif

                    {{-- Lien vers les pages numérotées --}}
                    @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                        @if ($page == $events->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Lien vers la page suivante --}}
                    @if ($events->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $events->nextPageUrl() }}">»</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#">»</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </main>

    <!-- Essential javascripts for application to work -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
