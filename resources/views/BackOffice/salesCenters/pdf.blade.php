<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Centers List</title>
    <style>
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
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Sales Centers List</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Opening Hours</th>
                <th>Closing Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesCenters as $center)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $center->name }}</td>
                <td>{{ $center->address }}</td>
                <td>{{ $center->phoneNumber }}</td>
               
                <td>{{ $center->opening_hours }}</td>
                <td>{{ $center->closing_hours }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
