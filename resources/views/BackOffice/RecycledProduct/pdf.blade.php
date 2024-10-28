<!-- resources/views/BackOffice/RecycledProduct/productsPDF.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recycled Products for {{ $salesCenter->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
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
        .statistics {
            margin-top: 20px;
            font-size: 14px;
        }
        /* Chart Container */
        .chart-container {
            position: relative;
            width: 300px; /* Adjust the width as needed */
            height: 300px; /* Adjust the height as needed */
            margin-top: 20px;
        }
    </style>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Recycled Products for {{ $salesCenter->name }}</h1>
    <p>List of recycled products available at this sales center.</p>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recycledProducts as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
               
                <td>{{ $product->quantity }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
