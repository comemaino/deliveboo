@extends('layouts.dashboard')

@section('content')
    <div class="bg-white h-100 px-2">

        <div class="container-fluid">
            <div class="row row-cols-3 bg-white">


                <table class=" table table-light table-striped">
                    <thead class="px-2">
                        <tr>
                            <th scope="col">Stato</th>
                            <th scope="col">Totale</th>
                            <th scope="col">Nome_cliente</th>
                            <th scope="col">Email_cliente</th>
                            <th scope="col">Indirizzo_cliente</th>
                            <th scope="col">Data</th>
                            <th scope="col">Altro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th class="card-title">{{ $order->state }}</th>
                                <td class="card-text">{{ $order->amount }}</td>
                                <td class="card-text">{{ $order->customer_fullname }}</td>
                                <td class="card-text">{{ $order->customer_email }}</td>
                                <td class="card-text">{{ $order->customer_address }}</td>
                                <td class="card-text">{{ $order->created_at }}</td>
                                <td class="card-text"><a
                                        href="{{ route('admin.orders.show', ['id' => $order->id]) }}">Visualizza
                                        dettaglio...</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
