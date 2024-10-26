<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centres de Recyclage</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Liste des Centres de Recyclage</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Nom du Responsable</th>
                <th>Heures d'Ouverture</th>
                <th>Heures de Fermeture</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recyclingCenters as $centre)
                <tr>
                    <td>{{ $centre->name }}</td>
                    <td>{{ $centre->address }}</td>
                    <td>{{ $centre->phoneNumber }}</td>
                    <td>{{ $centre->email }}</td>
                    <td>{{ $centre->manager_name }}</td>
                    <td>{{ $centre->opening_hours }}</td>
                    <td>{{ $centre->closing_hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
