<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribution Statistics</title>
    @vite(['resources/assets/css/main.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .app-title {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        #statusChart {
            max-width: 600px; /* Adjust the max width according to your needs */
            height: auto; /* To maintain the aspect ratio of the chart */
        }
    </style>
</head>
<body class="app sidebar-mini">
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('dashboard') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="container mt-4">
            <div class="app-title">
                <h1><i class="bi bi-graph-up"></i> Distribution Statistics</h1>
                <p>Visualize the statuses of distributions:</p>
            </div>

            <!-- Statistics as a list -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Status Counts</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Pending: {{ $pendingCount }}</li>
                        <li class="list-group-item">Completed: {{ $completedCount }}</li>
                        <li class="list-group-item">Canceled: {{ $canceledCount }}</li>
                    </ul>
                </div>
            </div>

            <!-- Pie chart for statistics -->
            <div class="card">
                <div class="card-body">
                    <canvas id="statusChart" width="400" height="400"></canvas>
                </div>
            </div>

            <!-- Back to Dashboard Button -->
          

            <!-- Back to Distributions List Button -->
            <div class="mb-3">
                <a href="{{ route('distributions.index') }}" class="btn btn-secondary">Back to Distributions List</a>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Script to display the pie chart with Chart.js
        const ctx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Completed', 'Canceled'],
                datasets: [{
                    data: [{{ $pendingCount }}, {{ $completedCount }}, {{ $canceledCount }}],
                    backgroundColor: ['#ffc107', '#28a745', '#dc3545'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Allows the chart to take the size of the container
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
</body>
</html>