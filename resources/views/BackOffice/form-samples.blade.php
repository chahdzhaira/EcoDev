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
    <title>Form Samples - Vali Admin</title>
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
    <header class="app-header"><a class="app-header__logo" href="{{route('indexBack')}}">Vali</a>
    @include('BackOffice.partials.navbar')

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Form Samples</h1>
          <p>Sample forms</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Vertical Form</h3>
            <div class="tile-body">
              <form>
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter full name">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input class="form-control" type="email" placeholder="Enter email address">
                </div>
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Female
                    </label>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Identity Proof</label>
                  <input class="form-control" type="file">
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox">I accept the terms and conditions
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="button"><i class="bi bi-check-circle-fill me-2"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Register</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="email" placeholder="Enter email address">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Gender</label>
                  <div class="col-md-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender">Female
                      </label>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="form-label col-md-3">Identity Proof</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file">
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-8 col-md-offset-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox">I accept the terms and conditions
                      </label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="button"><i class="bi bi-check-circle-fill me-2"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Subscribe</h3>
            <div class="tile-body">
              <form class="row">
                <div class="mb-3 col-md-3">
                  <label class="form-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter your name">
                </div>
                <div class="mb-3 col-md-3">
                  <label class="form-label">Email</label>
                  <input class="form-control" type="text" placeholder="Enter your email">
                </div>
                <div class="mb-3 col-md-4 align-self-end">
                  <button class="btn btn-primary" type="button"><i class="bi bi-check-circle-fill me-2"></i>Subscribe</button>
                </div>
              </form>
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