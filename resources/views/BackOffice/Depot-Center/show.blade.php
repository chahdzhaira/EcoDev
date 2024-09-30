<!-- resources/views/depot_centers/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <div class="container">
        <h1>Depot Center Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $depot->name }}</h3>
                <p><strong>Address:</strong> {{ $depot->address }}</p>
                <p><strong>Capacity:</strong> {{ $depot->capacity }}</p>
                <p><strong>Manager Name:</strong> {{ $depot->manager_name }}</p>
                <p><strong>Phone Number:</strong> {{ $depot->phoneNumber }}</p>
                <p><strong>Total Quantity Available:</strong> {{ $depot->total_quantity_available }}</p>
                <p><strong>Opening Hours:</strong> {{ $depot->opening_hours }}</p>
                <p><strong>Closing Hours:</strong> {{ $depot->closing_hours }}</p>
            </div>
        </div>

        <a href="{{ route('depot_centers.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
</html>
