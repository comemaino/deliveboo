<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Hai effettuato un nuovo ordine</h1>
    <div>
        <p>Ordine effettuato in data: {{ $new_order->created_at }}</p>
        <p>Nome sul campanello: {{ $new_order->customer_fullname }}</p>
        <p>Indirizzo di spedizione: {{ $new_order->address }}</p>
        <h3>Hei acquistato:</h3>
        <table class=" table table-light table-striped">
				<thead class="px-2">
					<tr>
						<th scope="col">Nome Prodotto</th>
						<th scope="col">Quantità</th>
						<th scope="col">Prezzo (€)</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
						<tr>
							<th class="card-title">{{ $product->name }}</th>
							<td class="card-text">{{ $product->quantity }}</td>
							<td class="card-text">{{ $product->price }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
        <p>Totale dell'ordine: {{ $new_order->amount }}</p>
    </div>

</body>

</html>