<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des Distributions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Historique des Distributions</h1>

    <table>
        <thead>
            <tr>
                <th>Déchet</th>
                <th>Quantité Distribuée</th>
                <th>Statut</th>
                <th>Centre de Recyclage</th>
                <th>Agence de Livraison</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wastes as $waste)
                @foreach($waste->distributions as $distribution)
                    <tr>
                        <td>{{ $waste->category }}</td>
                        <td>{{ $distribution->quantity_to_distribute }}</td>
                        <td>{{ $distribution->status }}</td>
                        <td>{{ $distribution->recyclingCenter->name ?? 'Non défini' }}</td>
                        <td>{{ $distribution->deliveryAgence->name ?? 'Non défini' }}</td>
                        <td>{{ $distribution->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
