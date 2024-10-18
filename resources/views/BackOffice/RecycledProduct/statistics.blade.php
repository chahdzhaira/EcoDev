<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS, and PUG.js. It's fully customizable and modular.">
    <title>Recycled Products Statistics - EcoCycle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS -->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart.js Plugin for Percentage Labels -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body class="app sidebar-mini">
    <!-- Navbar -->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-bar-chart-line"></i> Price Categories for {{ $salesCenter->name }}</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Price Categories</a></li>
            </ul>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('recycledProducts.download', $salesCenter->id) }}" class="btn btn-secondary">
                <i class="bi bi-file-earmark-pdf"></i> Generate PDF
            </a>

            <a href="{{ route('BackOffice.RecycledProduct.create', $salesCenter->id) }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Product
            </a>
            
            <!-- Button for statistics -->
            <a href="{{ route('recycledProducts.statistics', $salesCenter->id) }}" class="btn btn-info">
                <i class="bi bi-bar-chart-line"></i> View Price Statistics
            </a>
        </div>

        <!-- Back Button -->
        <div class="mb-3">
            <a href="{{ route('BackOffice.RecycledProduct.index', $salesCenter->id) }}" class="btn btn-light">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <!-- Pie Chart Container -->
        <div class="d-flex justify-content-center">
            <canvas id="priceChart" style="max-width: 400px;"></canvas> <!-- Adjust size here -->
        </div>
    </main>

    <script>
        // Total number of products for percentage calculation
        const totalProducts = {{ $lowPrices + $mediumPrices + $highPrices }};

        // Chart.js Pie Chart for Low, Medium, and High Prices with percentages
        const priceChart = new Chart(document.getElementById('priceChart'), {
            type: 'pie',
            data: {
                labels: ['Low Prices', 'Medium Prices', 'High Prices'],
                datasets: [{
                    data: [{{ $lowPrices }}, {{ $mediumPrices }}, {{ $highPrices }}], // Data for each category
                    backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384'],
                    hoverBackgroundColor: ['#36A2EB', '#FFCE56', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Allows resizing
                plugins: {
                    legend: {
                        position: 'top', // Puts legend on top
                    },
                    datalabels: {
                        formatter: function(value, context) {
                            const percentage = (value / totalProducts * 100).toFixed(1) + '%'; // Calculate percentage
                            return percentage; // Return percentage for display
                        },
                        color: '#fff', // Color of the percentage text
                        font: {
                            weight: 'bold',
                            size: '16'
                        }
                    }
                },
                layout: {
                    padding: 10 // Adds padding for smaller chart
                }
            },
            plugins: [ChartDataLabels] // Use the Chart.js plugin for data labels
        });
    </script>

    <!-- Essential javascripts for application to work -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>
