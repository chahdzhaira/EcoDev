<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Event - Vali Admin</title>
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">Vali</a>
        @include('BackOffice.partials.navbar')
    </header>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-pencil"></i> Edit Event</h1>
                <p>Edit your event details below</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>

        <!-- Edit Event Form -->
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
            </div>
              <!-- Date -->
              <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input class="form-control" type="date" name="date" required>
                            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
            </div>
            <div class="form-group">
                <label for="organizer">Organizer</label>
                <input type="text" class="form-control" id="organizer" name="organizer" value="{{ $event->organizer }}" required>
            </div>
            <div class="form-group">
                <label for="max_participants">Max Participants</label>
                <input type="number" class="form-control" id="max_participants" name="max_participants" value="{{ $event->max_participants }}" required>
            </div>
               <!-- Image Upload -->
               <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <input class="form-control" type="file" name="image"  required>
                            </div>
            <button type="submit" class="btn btn-success mt-3">Update Event</button>
        </form>
    </main>

    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
