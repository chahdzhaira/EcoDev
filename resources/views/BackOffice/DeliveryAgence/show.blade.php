@extends('DeliveryAgence.index') {{-- If you don't have a layout, omit this line --}}

@section('content')
<div class="container">
    <h1>Agency Details</h1>

    <p><strong>Name:</strong> {{ $agence->name }}</p>
    <p><strong>Address:</strong> {{ $agence->address }}</p>
    <p><strong>Phone:</strong> {{ $agence->phoneNumber }}</p>
    <p><strong>Opening Hours:</strong> {{ $agence->opening_hours }}</p>
    <p><strong>Closing Hours:</strong> {{ $agence->closing_hours }}</p>

    <a href="{{ route('delivery-agences.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('delivery-agences.edit', $agence->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
