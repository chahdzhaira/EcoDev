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
    <title>Mailbox - Vali Admin</title>
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
    <header class="app-header"><a class="app-header__logo"href="{{route('indexBack')}}">Vali</a>
    @include('BackOffice.partials.navbar')

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-envelope-at"></i> Mailbox</h1>
          <p>A Mailbox page sample</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="#">Mailbox</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="d-grid"><a class="mb-2 btn btn-primary btn-block" href="">Compose Mail</a></div>
          <div class="tile p-0">
            <h4 class="tile-title folder-head">Folders</h4>
            <div class="tile-body">
              <ul class="nav nav-pills flex-column mail-nav">
                <li class="nav-item"><a class="nav-link d-flex justify-content-between align-items-start" href="#"><span><i class="bi bi-inbox me-1 fs-5"></i> Inbox</span><span class="badge bg-primary rounded-pill">12</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-envelope me-1 fs-5"></i> Sent</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-journal-text me-1 fs-5"></i> Drafts</a></li>
                <li class="nav-item"><a class="nav-link d-flex justify-content-between align-items-start" href="#"><span><i class="bi bi-funnel me-1 fs-5"></i> Junk </span><span class="badge bg-primary rounded-pill">8</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-trash me-1 fs-5"></i> Trash</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tile">
            <div class="mailbox-controls">
              <div class="form-check">
                <label>
                  <input class="form-check-input" type="checkbox"><span class="label-text"></span>
                </label>
              </div>
              <div class="btn-group">
                <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-trash fs-5"></i></button>
                <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-reply fs-5"></i></button>
                <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-share fs-5"></i></button>
                <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-arrow-clockwise fs-5"></i></button>
              </div>
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td><i class="bi bi-paperclip"></i></td>
                    <td>8 mins ago</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star-fill"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td><b>A report on some good project</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td></td>
                    <td>15 mins ago</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td><i class="bi bi-paperclip"></i></td>
                    <td>30 mins ago</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star-fill"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td></td>
                    <td>25 December</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td><i class="bi bi-paperclip"></i></td>
                    <td>20 December</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star-fill"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td></td>
                    <td>20 December</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star-fill"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td><i class="bi bi-paperclip"></i></td>
                    <td>20 December</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label>
                          <input class="form-check-input" type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="bi bi-star"></i></a></td>
                    <td><a href="#">John Doe</a></td>
                    <td class="mail-subject"><b>A report on project almanac</b> - Lorem ipsum dolor sit amet adipisicing elit...</td>
                    <td></td>
                    <td>20 December</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="text-end"><span class="text-muted mr-2">Showing 1-15 out of 60</span>
              <div class="btn-group ms-3">
                <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-chevron-left"></i></button>
                <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-chevron-right"></i></button>
              </div>
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