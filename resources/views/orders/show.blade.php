@extends('layout')

@section('title', 'Détail de la commande')

@section('content')

    <header class="border-bottom mb-3">
        <h1 class="h3">Détail de la commande</h1>
    </header>

    <section>
        <h2 class="h6">{{ $customer->customerName }}</h2>
        <p>{{ $customer->contactFirstName }} {{ $customer->contactLastName }}</p>
        <p>{{ $customer->addressLine1 }}, {{ $customer->city }}</p>
    </section>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->productName }}</td>
                    <td>{{ number_format($detail->priceEach, 2) }}</td>
                    <td>{{ $detail->quantityOrdered }}</td>
                    <td>{{ number_format($detail->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Montant HT</th>
                <th>{{ number_format($totalOrder->total, 2, ',', ' ') }}€</th>
            </tr>
            <tr>
                <th colspan="3">Montant TVA</th>
                <th>{{ number_format($totalOrder->total * 0.2, 2, ',', ' ') }}€</th>
            </tr>
            <tr>
                <th colspan="3">Montant TTC</th>
                <th>{{ number_format($totalOrder->total * 1.2, 2, ',', ' ') }}€</th>
            </tr>
        </tfoot>
    </table>

@endsection