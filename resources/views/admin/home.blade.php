@extends('layouts.dashboard')

@section('content')
	<div class="user-page">
		<div class="container p-4">
			<h1>Benvenuto <strong>{{ $user->name }}</strong></h1>
			<h4 class="user-details">{{ $user->business_name }} {{ $user->address }}</h4>



			<div class="row-cols-md-2 row my-4 ">
				<div class="col">
					<img src="{{ asset('storage/' . $user->cover) }}" alt="">
				</div>
				<div class="container col">
					<h4>Negli ultimi 30 giorni hai ricevuto</h4>
					<h2><strong>N</strong> ordini </h2>
					<h4>per un totale di</h4>
					<h2>€ <strong>amount</strong></h2>


				</div>
			</div>

			<div class="best-sellers">
				<h2>Articoli più venduti</h2>
			</div>
		</div>
	</div>
@endsection
