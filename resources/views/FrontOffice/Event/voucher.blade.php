<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher d'Inscription - ecodev</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f8f3;
            color: #4f5d2f;
        }
        .voucher-container {
            background-color: #ffffff;
            border: 2px solid #b3c6a9;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            padding: 20px;
            text-align: center;
            margin: 20px;
        }

        /* Titres et textes */
        h1 {
            color: #3a5f40;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            margin: 8px 0;
            color: #4f5d2f;
        }
        strong {
            color: #3a5f40;
        }

        /* Boutons */
        .button {
            margin-top: 10px;
            background-color: #6ea965;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        .button:hover {
            background-color: #578e4d;
        }

        /* Footer ecodev */
        .footer-ecodev {
            margin-top: 15px;
            font-size: 14px;
            color: #7d8a6c;
        }
    </style>
</head>
<body>
    <div class="voucher-container">
        <h1>Félicitations, vous êtes inscrit à l'événement !</h1>
        <p>Nom de l'événement : <strong>{{ $event->name }}</strong></p>
        <p>Nom du participant : <strong>{{ $participation->name }}</strong></p>
        <p>Email : <strong>{{ $participation->email }}</strong></p>
        <p>Date d'inscription : <strong>{{ $participation->registration_date }}</strong></p>

        <form action="{{ route('voucher.download', ['eventId' => $event->id, 'participationId' => $participation->id]) }}" method="POST">
            @csrf
            <button type="submit" class="button">Télécharger en PDF</button>
        </form>

        <a href="{{ route('event.index') }}" class="button">Retour aux événements</a>
        
        <div class="footer-ecodev">
            <p>Merci de soutenir notre mission pour un avenir durable avec ecodev.</p>
        </div>
    </div>
</body>
</html>
