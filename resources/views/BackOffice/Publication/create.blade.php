<!-- <form action ="{{route('publication.store')}}" method="POST">
    @csrf
    title : <input type="text" name = "title" >
    image : <input type="text" name = "image" >
    content : <input type="text" name = "content"  placeholder="Content">
    category : <input type="text" name = "category">
    <button type ='submit'> add publication</button>
</form> -->

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
 <header class="app-header"><a class="app-header__logo" href="{{route('indexBack')}}">EcoCycle</a>
    @include('BackOffice.partials.navbar')

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')
    <main class="app-content">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">New publication</h3>
                <div class="tile-body">
                    <form action ="{{route('publication.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name = "title"  value="{{ old('title') }}" placeholder="Enter the title">
                            @error('title')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input class="form-control" type="file" name = "content" id="content" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" rows="6"   placeholder="Enter the description ">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name = "category"  value="{{ old('category') }}"  placeholder="recycling, reducing waste ... ">
                            @error('category')
                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Category</label>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="category">recycling
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="category">reducing waste
                            </label>
                        </div> -->
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{url('/publication')}}" ><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                        </div>
                    </form>
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