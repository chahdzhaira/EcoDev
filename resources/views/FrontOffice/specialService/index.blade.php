<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoCycle</title>
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/team.css'])
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @vite(['resources/assets/js/bootstrap.bundle.min.js'])

    <style>
        .framed-background {
            background-image: url('{{ Vite::asset("resources/assets/img/image.png") }}');

            background-size: cover; /* Pour que l'image couvre tout l'arrière-plan */
    background-position: center; /* Pour centrer l'image */
    /* background-repeat: no-repeat; / */
            background-color: #f9f9f9; /* Light background */
            padding: 20px; /* Space between the content and the border */
            /* border: 1px solid #ccc; Light gray border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            margin-bottom: 40px; /* Space below each section */
        }

        .title-section {
            background-color: #f0f0f0; 
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px; 
        }

        .title-section h2, .title-section h5 {
            margin: 0; 
        }

        .card-container {
            margin-top: 20px; 
        }

        .card {
    height: 200px; /* Ajuste cette valeur selon tes besoins */
    display: flex;
    flex-direction: column; /* Assure que les éléments intérieurs s'empilent */
    justify-content: space-between; /* Espace entre les éléments */
    margin-bottom: 20px; /* Optionnel, ajuste si nécessaire */

}
.our-services {
    margin-top: 40px;
    padding: 0 60px;
    min-height: 198px;
    text-align: center;
    border-radius: 10px;
    background-color: #fff;
    transition: all .4s ease-in-out;
    box-shadow: 0 0 25px 0 rgba(20, 27, 202, .17);
    overflow: hidden; /* Assure que le contenu ne dépasse pas la carte */
        height: 240px; /* Taille fixe pour les cartes */
        position: relative; /* Pour positionner le bouton par rapport à la carte */
        display: flex;
    flex-direction: column;
    justify-content: space-between; /* Espace entre le titre et le bouton */
}
/* Centrer le bouton */
.form-check {
    display: flex; /* Utilisation de flexbox pour centrer le bouton */
    justify-content: center; /* Centre le bouton horizontalement */
    margin-top: 10px; /* Espace réduit entre la carte et le bouton */

}
/* Optionnel : ajouter plus d'espace entre la carte et le bouton */
.form-check-input {
    margin-top: 15px; /* Ajoute un espace supplémentaire en haut du bouton */
}

.our-services .icon {
    margin-bottom: -21px;
    transform: translateY(-50%);
    text-align: center;
}
.our-services h4 {
    font-size: 1.75rem; /* Réduis légèrement la taille si le nom est trop long */
    margin-bottom: 15px; /* Espace réduit entre le nom du service et les autres éléments */
    font-weight: bold;
}
.our-services:hover p {
    color: #fff;
    margin-bottom: 10px; 
}

.settings:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(-45deg, #d0e8d0 0%, #a2c2a2 100%); /* Vert très pâle à vert moyen */
}



* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background: #eee;
    font-family: 'Ubuntu', sans-serif;
}

.box {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
  /* Style pour cacher la case à cocher par défaut */
  .form-check-input {
        display: none;
    }

    .form-check-label {
    display: inline-block;
    padding: 10px 15px;
    background-color: #f1f1f1;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    font-size: 12px;
    font-weight: 600;
}

    /* Icône de la case à cocher personnalisée */
    .form-check-label::before {
        content: '\f00c'; /* Icône de check */
        font-family: "Font Awesome 5 Free"; 
        font-weight: 900; 
        margin-right:5px;
        opacity: 0; /* Caché par défaut */
        transition: opacity 0.3s;
    }

    /* Quand la case est cochée */
    .form-check-input:checked + .form-check-label {
        background-color: #28a745; /* Couleur verte */
        color: white;
    }

    /* Effet hover */
    .form-check-label:hover {
        background-color: #d4edda; /* Vert pâle */
        color: #28a745;
    }

    </style>
</head>
<body>


<section id="header">
    @include('FrontOffice.partials.navbar')
</section>
<section id="delivery-agencies" class="p_3 framed-background">
    <div class="container-xl">
        <div class="row title-section text-center">
            <div class="col-md-12">
                <span class="col_green fs-1 lh-1"><i class="fa fa-recycle"></i></span>
                <h2 class="text-center mb-4">Services Offered by {{ $agency->name }}</h2>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @if($specialServices->isEmpty())
                <div class="col-12 text-center">
                    <p>No special services available for this agency.</p>
                </div>
                
            @else
            @foreach($specialServices as $service)
                <div class="col-md-4">
                    <div class="box">
                        <div class="our-services settings">
                       
                        <h4>{{ $service->name }}</h4>
                        <p class="card-text">Additional Cost: <span class="text-success">{{ $service->additional_cost }} TND</span></p>
                   <p class="card-text">Expiration Date: <span class="text-success">{{ $service->expiration_date }}</span></p>
                   <div class="form-check">
    <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" id="service-{{ $service->id }}">

</div>                      
                </div>
                    </div>
                </div>
            @endforeach


            @endif
        </div>
       

        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('front.deliveryagence.index') }}" class="btn btn-secondary">Back to Agencies</a>
            </div>
        </div>
    </div>
</section>

<section id="footer">
    @include('FrontOffice.partials.footer') <!-- Include ton pied de page -->
</section>

</body>
</html>
