<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Lockscreen - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="lockscreen-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="lock-box"><img class="rounded-circle user-image" src="https://randomuser.me/api/portraits/men/1.jpg">
        <h4 class="text-center user-name">John Doe</h4>
        <p class="text-center text-muted">Account Locked</p>
        <form class="unlock-form" action="{{ route('indexBack') }}">
          <div class="mb-3">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" autofocus>
          </div>
          <div class="mb-3 btn-container d-grid">
            <button class="btn btn-primary btn-block" type="submit"><i class="bi bi-unlock me-2 fs-5"></i>UNLOCK </button>
          </div>
        </form>
        <p><a href="{{route('page-login')}}" >Not John ? Login Here.</a></p>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    @vite(['resources/assets/js/jquery-3.7.0.min.js'])
    @vite(['resources/assets/js/bootstrap.min.js'])
    @vite(['resources/assets/js/main - Back.js'])
  </body>
</html>