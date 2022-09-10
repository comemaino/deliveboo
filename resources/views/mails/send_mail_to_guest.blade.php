<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <h1>Hai effettuato un nuovo ordine</h1>
    <div>
        <p>Ordine effettuato in data: {{ $new_order->created_at }}</p>
        <p>Nome sul campanello: {{ $new_order->customer_fullname }}</p>
        <p>Indirizzo di spedizione: {{ $new_order->customer_address }}</p>
        <h3>Hai acquistato:</h3>
        <table class=" table table-light table-striped">
				<thead>
					<tr style="padding: 1rem 0;">
						<th scope="col">Nome Prodotto</th>
						<th scope="col">Quantità</th>
						<th scope="col">Prezzo (€)</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
						<tr style="padding: .5rem 0; text-align: center;">
							<td class="card-title">{{ $product->name }}</td>
							<td class="card-text">{{ $product->quantity }}</td>
							<td class="card-text">{{ $product->price }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
        <p>Totale dell'ordine: € {{ $new_order->amount }}</p>
    </div>

</body>

</html>