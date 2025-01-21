<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Centres de Dépôt</title>
    <style>
        /* Add styles for your PDF here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des Centres de Dépôt</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Capacité</th>
                <th>Nom du Responsable</th>
                <th>Heures d'ouverture</th>
                <th>Heures de fermeture</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($depotCenters as $centre)
                <tr>
                    <td>{{ $centre->name }}</td>
                    <td>{{ $centre->address }}</td>
                    <td>{{ $centre->capacity }}</td>
                    <td>{{ $centre->manager_name }}</td>
                    <td>{{ $centre->opening_hours }}</td>
                    <td>{{ $centre->closing_hours }}</td>
                    <td>{{ $centre->phoneNumber }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
