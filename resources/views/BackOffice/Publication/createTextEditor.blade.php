<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Summernote Text Editor CRUD and Image Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>

    <div class="container p-4 ">
      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <div class="text-center">
            <h1 class="">Summernote Text Editor CRUD and Image Upload in Laravel</h1>
           </div> 
          <form action ="{{route('publication.store')}}" method="POST">
              @csrf
              <label for="">Title:</label>
              <input type="text" class="form-control" name="title">
              <label for="">Description:</label>
              <textarea name="description" id="description" cols="30" rows="10"></textarea>
              <label for="">Category:</label>
              <input type="text" class="form-control" name="category">
              <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>

          </div>
      </div>
    </div>


    <script>
        $('#description').summernote({
            placeholder: 'description...',
            tabsize:2,
            height:300
        });
    </script>
    
  </body>
</html> -->

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

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <!--  -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                <h3 class="mb-4" style="margin-top: 0;"><strong>New publication</strong></h3>
                <div class="tile-body">
                <form action ="/post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                      <label for="" style="font-weight: 300;">Title</label>
                      <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name = "title"  value="{{ old('title') }}" placeholder="Enter the title">
                      @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label class="form-label"  style="font-weight: 300;" >Image</label>
                      <input class="form-control mb-4" type="file" name = "content" id="content" >
                    </div>
                    <div class="mb-4">
                      <label for="" style="font-weight: 300;">Category</label>
                      <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category">
                        <option value="Reducing waste">Reducing waste</option>
                        <option value="Recycling" selected>Recycling</option>
                      </select>
                    </div>
                    <div class="">
                      <label for="" style="font-weight: 300;">Description</label>
                      <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                      @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-success" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{url('/publication')}}" ><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
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
    <script>
        $('#description').summernote({
            placeholder: 'description...',
            tabsize:2,
            height:150
        });
    </script>
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