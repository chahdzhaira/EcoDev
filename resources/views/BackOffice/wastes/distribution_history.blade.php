<!-- distribution_history.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historique des Distributions pour le Déchet: {{ $waste->category }}</h1>

    @if($distributions->isEmpty())
        <p>Aucune distribution effectuée pour ce déchet.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Agence de Livraison</th>
                    <th>Centre de Recyclage</th>
                    <th>Quantité Distribuée</th>
                    <th>Statut</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($distributions as $distribution)
                    <tr>
                        <td>{{ $distribution->deliveryAgency->name }}</td>
                        <td>{{ $distribution->recyclingCenter->name }}</td>
                        <td>{{ $distribution->quantity_to_distribute }}</td>
                        <td>{{ $distribution->status }}</td>
                        <td>{{ $distribution->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('wastes.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
