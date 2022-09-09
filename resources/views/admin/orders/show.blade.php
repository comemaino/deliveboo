@extends('layouts.dashboard')

@section('content')
    <div>
        <h2>Riepilogo ordine</h2>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Nome Prodotto</th>
                    <th scope="col">Quantità</th>
                    <th scope="col">Prezzo (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result_order as $single_product)
                    <tr>
                        <td class="card-text">{{ $single_product["product"]->name }}</td>
                        <td class="card-text">{{ $single_product['quantity'] }}</td>
                        <td class="card-text">€ {{ $single_product["product"]->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th class="card-title">Totale Ordine:</th>
                    <th></th>
                    <td class="card-text">€ {{ $amount }}</td>
                </tr>
                {{-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endsection
