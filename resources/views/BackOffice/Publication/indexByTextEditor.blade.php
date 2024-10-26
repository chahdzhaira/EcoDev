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
    <title>Basic Tables - Vali Admin</title>
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
    <header class="app-header"><a class="app-header__logo" href="{{route('indexBack')}}" >EcoCycle</a>
    @include('BackOffice.partials.navbar')

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-file-earmark-post"></i> Publications </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#"> Publications </a></li>
        </ul>
      </div>
      <!-- <div>
        <a href="{{route('publication.create')}}">create publication </a>
        @foreach($Publications as $p)
          <div class="publication">
            <p><strong>ID: </strong>{{ $p->id }}</p>
            <p><strong>Title: </strong>{{ $p->title }}</p>
            <p><strong>Content: </strong>{{ $p->content }}</p>
            <p><strong>Category: </strong>{{ $p->category }}</p>
            <form action="{{route('publication.destroy', $p->id)}}" method="POST">
              <a href="{{route('publication.edit' , $p->id)}}">edit publication </a>
              @csrf
              @method('DELETE')
              <button type='submit'> delete publication </button>
            </form>
            <hr>
          </div>
        @endforeach
      </div> -->
      <!-- Alerte pour l'ajout -->
      @include('BackOffice.partials.alert', [
          'type' => 'add_success',
          'class' => 'success'
      ])
      <!-- Alerte pour la modification -->
      @include('BackOffice.partials.alert', [
          'type' => 'update_success',
          'class' => 'warning'
      ])

      <!-- Alerte pour la suppression -->
      @include('BackOffice.partials.alert', [
          'type' => 'delete_success',
          'class' => 'success'
      ])

      <div class="col-md-12">
          <div class="tile">
            <div class="d-flex justify-content-between align-items-center" >
              <h3 class="tile-title">All publications</h3>
              <div class="d-flex align-items-center">
              <form action="{{ route('search') }}" method="GET" class="me-2 d-flex align-items-center">
                <input class="form-control" id="inputDefault" type="text" name="query" placeholder="Search" value="{{ request('query') }}">
                <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
              </form>
              <button class="btn btn-primary ms-2" type="button" data-bs-toggle="modal" data-bs-target="#chooseModal"><i class="bi bi-plus"></i> Add publication </button>
            </div>
            </div>
            <div class="modal fade my-7" id="chooseModal" tabindex="-1" aria-labelledby="chooseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary " id="chooseModalLabel">What do you prefer ?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                              <a href="/create">
                                <div class="card text-primary">
                                  <div class="card-body text-center">
                                    <img src="{{Vite::asset('resources/assets/img/editor.png')}}" alt="abc" >
                                    <h5 class="card-title mt-4">Text editor</h5>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col">
                              <a href="{{route('publication.create')}}">
                                <div class="card text-primary">
                                  <div class="card-body text-center">
                                    <img src="{{Vite::asset('resources/assets/img/form.png')}}" alt="abc" >
                                    <h5 class="card-title mt-4">Standard form</h5>
                                  </div>
                                </div>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="table-responsive mt-4">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Category</th>
                    <th>Published at</th> <!-- created_at -->
                    <th>Updated at</th> <!-- updated_at -->
                    <!-- <th>Tag</th> water, plastic , glass -->
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($Publications as $p)
                  <tr>
                    <td>{{ $p->id }}</td>
                    <td class="truncateTitle">{{ $p->title }}</td>
                    <td>{{$p->user->name}}</td>
                    <td>{{ $p->category }}</td>
                    <!-- <td class="truncateText">{!! extractFirstLine($p->description) !!}</td> -->
                    <td>{{ $p->created_at->format('d-M-Y , H:i') }}</td>
                    <td>{{ $p->updated_at->format('d-M-Y , H:i') }}</td>
                    <td class="text-center">
                       <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight{{$p->id}}" aria-controls="offcanvasRight{{$p->id}}"> <!-- //on a mis le {{$p->id}} a coté du data-bs-target/aria-controls/aria-labelledby et dans l'id pour chaque offcanvas ne partage pas le même id -->
                        <i class="bi bi-binoculars"></i>
                      </button>
                      <div class="offcanvas offcanvas-end custom-offcanvas " tabindex="-1" id="offcanvasRight{{$p->id}}" aria-labelledby="offcanvasRightLabel{{$p->id}}">
                        <div class="offcanvas-header">
                          <h3 class="offcanvas-title text-primary fw-bold" id="offcanvasRightLabel{{$p->id}}">{{ $p->title }}</h3>
                          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body text-start">
                          <img src="{{ asset($p->content) }}" alt="{{ $p->title }}"  class="d-block mx-auto img-offcanvas mb-5">
                          <hr class="my-4 text-primary border-4 w-75 mx-auto">
                          <div>{!! $p->description !!}</div>
                        </div>
                      </div>
                      <!-- <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                      <button class="btn btn-danger" type="button"><i class="bi bi-trash-fill"></i></button> -->
                      <a href="edit/{{ $p->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <button  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $p->id }}" type='submit' ><i class="bi bi-trash-fill"></i></button>
                    </td>
                  </tr>
                  <div class="modal fade my-7" id="deleteModal-{{ $p->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Confirm deletion</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete the publication entitled ”<strong>{{ $p->title }}</strong>" ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <form id="delete-form-{{ $p->id }}" action="{{ route('publication.destroy', $p->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Confirm</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @php
                  function extractFirstLine($description) {
                    // Expression régulière pour capturer la première balise après <body> et son contenu
    if (preg_match('/<body[^>]*>\s*<([^>\s]+)[^>]*>(.*?)<\/\1>/is', $description, $matches)) {
        return trim(strip_tags($matches[2])); // Retourne le texte trouvé sans balises HTML
    }
    return ''; // Retourne une chaîne vide si rien n'est trouvé
}
                  @endphp
                </tbody>
              </table>
            </div>
            <div class="d-flex bs-component">
                  <div>
                      <ul class="pagination">
                          <li class="page-item {{ $Publications->onFirstPage() ? 'disabled' : '' }}">
                              <a class="page-link" href="{{ $Publications->previousPageUrl() }}">«</a>
                          </li>

                          @for ($i = 1; $i <= $Publications->lastPage(); $i++)
                              <li class="page-item {{ $Publications->currentPage() == $i ? 'active' : '' }}">
                                  <a class="page-link" href="{{ $Publications->url($i) }}">{{ $i }}</a>
                              </li>
                          @endfor

                          <li class="page-item {{ $Publications->hasMorePages() ? '' : 'disabled' }}">
                              <a class="page-link" href="{{ $Publications->nextPageUrl() }}">»</a>
                          </li>
                      </ul>
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