@extends('layouts.dashboard')

@section('content')
	<div class="container">
		<h1>Benvenuto {{ $user->name }}</h1>
		<h2>La tua attività: {{ $user->business_name }}</h2>
		<h2>Indirizzo della tua attività: {{ $user->address }}</h2>
	</div>
	<div class="container row-cols-2 row">
		<div class="col">
			<img src="{{ asset('storage/' . $user->cover) }}" alt="">
		</div>
		<div class="container col ">
			<h4>Hai ricevuto X ordini per un incasso totale di € Y</h4>
			<div class="row row-cols-2">
				<div class="col">
					<h5>Articoli più venduti</h5>
				</div>
			</div>

		</div>
	</div>
@endsection