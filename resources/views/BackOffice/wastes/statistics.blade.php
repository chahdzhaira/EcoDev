<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Déchets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/assets/css/main.css'])
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="app sidebar-mini">
    
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
    @include('BackOffice.partials.navbar')
    </header>
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <!-- Main Content -->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-building"></i> Statistiques des Déchets</h1>
          <p>Répartition des déchets par catégorie et par centre de dépôt</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door"></i></li>
          <li class="breadcrumb-item"><a href="#">Statistiques</a></li>
        </ul>
      </div>

      <!-- Message de succès -->
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="row">
          @foreach($statistics as $depot => $categories)
          <div class="col-md-6 mb-4">
              <div class="card">
                  <div class="card-header">
                      <h5>{{ $depot }}</h5>
                  </div>
                  <div class="card-body">
                      <canvas id="chart-{{ $depot }}" class="my-4" style="height: 400px;"></canvas>
                      <ul class="list-group">
                          @foreach($categories as $category)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              {{ $category->category }} <!-- Afficher la catégorie -->
                              <span class="badge bg-primary rounded-pill">{{ number_format(($category->total / $categories->sum('total')) * 100, 2) }}%</span> <!-- Pourcentage par rapport au total -->
                          </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>

          <script>
              // Data for the chart
              const labels = @json($categories->pluck('category'));
              const data = {
                  labels: labels,
                  datasets: [{
                      label: 'Pourcentage des catégories',
                      data: @json($categories->pluck('total')),
                      backgroundColor: [
                          '#FF6384', // Red
                          '#36A2EB', // Blue
                          '#FFCE56', // Yellow
                          '#4BC0C0', // Teal
                          '#9966FF', // Purple
                          '#FF9F40', // Orange
                      ],
                      hoverOffset: 4
                  }]
              };

              // Configurations for the chart
              const config = {
                  type: 'pie',
                  data: data,
                  options: {
                      responsive: true,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          title: {
                              display: true,
                              text: 'Répartition des déchets'
                          }
                      }
                  },
              };

              // Render the chart
              const myChart = new Chart(
                  document.getElementById('chart-{{ $depot }}'),
                  config
              );
          </script>
          @endforeach
      </div>
    </main>

    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
</body>
</html>