<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Hai ricevuto un nuovo ordine</h1>
    <div>
        <p>Totale dell'ordine: {{ $new_order->amount }}</p>
        <p>Ordine effettuato in data: {{ $new_order->created_at }}</p>
        <p>Nome completo cliente: {{ $new_order->customer_fullname }}</p>
        <p>Email cliente: {{ $new_order->customer_email }}</p>
        <p>Indirizzo cliente: {{ $new_order->customer_address }}</p>
    </div>
    <a href="{{ route('admin.orders.index') }}">Accedi alla tua area riservata per visualizzare il dettaglio ordini</a>

</body>

</html>