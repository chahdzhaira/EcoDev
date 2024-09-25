<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 5 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 5, SASS and PUG.js. It's fully customizable and modular.">
    <title>Cards - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{route('indexBack')}}" >Vali</a>
    @include('BackOffice.partials.navbar')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-laptop"></i> Cards</h1>
          <p>Material design inspired cards</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">UI</li>
          <li class="breadcrumb-item"><a href="#">Cards</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Card Title</h3>
            <div class="tile-body">Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.</div>
            <div class="tile-footer"><a class="btn btn-primary" href="#">Link</a></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">All Items</h3>
              <p><a class="btn btn-primary icon-btn" href=""><i class="bi bi-plus-square me-2"></i>Add Item	</a></p>
            </div>
            <div class="tile-body">
              <b>Card with action button </b><br>
              Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.
              
              
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">All Items</h3>
              <div class="btn-group"><a class="btn btn-primary" href="#"><i class="bi bi-plus-square fs-5"></i></a><a class="btn btn-primary" href="#"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-primary" href="#"><i class="bi bi-trash fs-5"></i></a></div>
            </div>
            <div class="tile-body">
              <b>Card with button group </b><br>
              Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.
              
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <div class="overlay">
              <div class="m-loader mr-4">
                <svg class="m-circular" viewBox="25 25 50 50">
                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
                </svg>
              </div>
              <h3 class="l-text">Loading</h3>
            </div>
            <div class="tile-title-w-btn">
              <h3 class="title">All Items</h3>
              <p><a class="btn btn-primary icon-btn" href=""><i class="bi bi-plus-square"></i>Add Item	</a></p>
            </div>
            <div class="tile-body">
              <b>Card with action button </b><br>
              Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>