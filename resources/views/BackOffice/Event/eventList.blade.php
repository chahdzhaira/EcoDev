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

        <!-- Event Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Organizer</th>
                        <th>Max Participants</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <!-- Image -->
                            <td>
                                <img src="{{ asset('storage/' . $event->image_url) }}" alt="Event Image" style="width: 100px; height: auto;">
                            </td>
                            <!-- Title -->
                            <td>{{ $event->title }}</td>
                            <!-- Description -->
                            <td>{{ \Illuminate\Support\Str::limit($event->description, 50) }}</td>
                            <!-- Date -->
                            <td>{{ $event->date }}</td>
                            <!-- Location -->
                            <td>{{ $event->location }}</td>
                            <!-- Organizer -->
                            <td>{{ $event->organizer }}</td>
                            <!-- Max Participants -->
                            <td>{{ $event->max_participants }}</td>
                            <!-- Actions -->
                            <td>
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination pagination-sm">
                    @if ($events->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">«</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $events->previousPageUrl() }}">«</a>
                        </li>
                    @endif

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
