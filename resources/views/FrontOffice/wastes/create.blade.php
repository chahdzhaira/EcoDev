<!DOCTYPE html>
<html lang="fr">
    
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/blog.css'])
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    @vite(['resources/assets/js/bootstrap.bundle.min.js'])

</head>



<section id="top" class="bg_green pt-2 pb-2">
<div class="container-xl">
 <div class="row top_1">
  <div class="col-md-8">
   <div class="top_1l">
    <ul class="mb-0">
        <li class="text-white d-inline-block">Welcome to EcoCycle </li>
        <li class="text-white d-inline-block mx-2">| </li>
        <li class="d-inline-block"> <a class="text-white " href="#">How to Find Us</a> </li>
        <li class="text-white d-inline-block mx-2">| </li>
        <li class="d-inline-block"> <a class="text-white " href="#">Give Feedback</a> </li>
    </ul>
   </div>
  </div>
  <div class="col-md-4">
   <div class="top_1r text-end">
      <div class="input-group">
                <input type="text" class="form-control border-0 bg-transparent text-white" placeholder="Search Keyword">
                <span class="input-group-btn">
                    <button class="btn btn-primary col_green bg-transparent rounded-0 p-1 px-3 border-0" type="button">
                        <i class="fa fa-search"></i> </button>
                </span>
        </div>
   </div>
  </div>
 </div>
</div>
</section>

<section id="header">
@include('FrontOffice.partials.navbar')
</section>


<section id="center" class="center_team">
   <div class="center_om bg_back">
     <div class="container-xl">
  <div class="row center_o1 text-center">
     <div class="col-md-12">
        <h2 class="text-white text-uppercase font_50">Gérer les déchets</h2>
        <h6 class="col_green  fw-bold mb-0 mt-3"><a class="text-light" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Gérer les déchets</h6>
     </div>
  </div>
 </div>
   </div>   
 </section>
    
    <style>
        /* Ajoutez ce CSS pour centrer le formulaire */
        .form-container {
            max-width: 600px;
            margin: 50px auto; /* Centrage horizontal et marge supérieure */
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <main>
        <div class="container">
            <!-- Ajout d'un conteneur pour centrer le formulaire -->
            <div class="form-container">
                
                <!-- Titre du formulaire -->
                <h2 class="form-title">Créer un déchet</h2>

                <form action="{{ route('wastes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- Hidden input for depot_id -->
                            <input type="hidden" name="depot_id" value="{{ $depotId }}">

                        <!-- Static user ID -->
                        <input type="hidden" name="user_id" value="1">
                    
                    <div class="form-group">
                        <label for="quantity">Quantité <span class="text-danger">*</span></label>
                        <input type="number" name="quantity" class="form-control" placeholder="Quantité de déchet" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="collection_date">Date de Collecte <span class="text-danger">*</span></label>
                        <input type="date" name="collection_date" class="form-control" value="{{ old('collection_date') }}" required>
                        @error('collection_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> -->

                    <div class="form-group">
                        <label for="collection_location">Lieu de Collecte <span class="text-danger">*</span></label>
                        <input type="text" name="collection_location" class="form-control" placeholder="Lieu de collecte" value="{{ old('collection_location') }}" required>
                        @error('collection_location')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Catégorie <span class="text-danger">*</span></label>
                        <select name="category" class="form-control" required>
                            <option value="" disabled selected>Sélectionnez une catégorie</option>
                            <option value="papier" {{ old('category') == 'papier' ? 'selected' : '' }}>Papier</option>
                            <option value="bois" {{ old('category') == 'bois' ? 'selected' : '' }}>Bois</option>
                            <option value="plastique" {{ old('category') == 'plastique' ? 'selected' : '' }}>Plastique</option>
                            <option value="verre" {{ old('category') == 'verre' ? 'selected' : '' }}>Verre</option>
                            <option value="métal" {{ old('category') == 'métal' ? 'selected' : '' }}>Métal</option>
                            <option value="autre" {{ old('category') == 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label for="user_name">Nom de l'Utilisateur <span class="text-danger">*</span></label>
                        <input type="text" name="user_name" class="form-control" placeholder="Nom de l'utilisateur" value="{{ old('user_name') }}" required>
                        @error('user_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deposit_center">Centre de Dépôt <span class="text-danger">*</span></label>
                        <input type="text" name="deposit_center" class="form-control" placeholder="Centre de dépôt" value="{{ old('deposit_center') }}" required>
                        @error('deposit_center')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> -->

                    <div class="form-group">
                        <label for="image">Image du déchet</label>
                        <input type="file" name="image" class="form-control-file">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <button type="button" class="btn btn-success ms-2" onclick="window.history.back();">
                    <i class="fa fa-arrow-left">Retour</i>
                </button>
                </form>

                <!-- <a href="{{ route('depot_center.index') }}" class="btn btn-secondary mt-3">Retour</a> -->
                
            </div>
        </div>
    </main>

</body>
</html>
