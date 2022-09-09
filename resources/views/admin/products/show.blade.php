@extends('layouts.dashboard')

@section('content')
	@if (session()->has('message'))
		<div id="flash-message" class="alert alert-success">
			<h5 class="text-center">{{ session()->get('message') }}</h5>
		</div>
	@endif

	<div class="container p-3 ">
		<div class="img-title text-center text-md-start ">
			<h1>{{ $product->name }}
				<span style="font-size: 1.2rem">
					@if ($product->visibility)
						<i class="fa-solid fa-eye" style="color: green"></i>
					@else
						<i class="fa-sharp fa-solid fa-eye-slash" style="color: red"></i>
					@endif
				</span>
			</h1>

			@if ($product->img)
				<img style="max-width: 400px; border-radius:30px;" src="{{ asset('storage/' . $product->img) }}" alt="">
			@endif
		</div>

		{{-- <div>
			<small>SLUG: <strong>{{ $product->slug }}</strong></small>
		</div> --}}

		<div class=" mt-3 row row-cols-1">
			<p class="text-center text-md-start"><strong>Prezzo:</strong> €
				{{ $product->price }}</p>
			<p class="text-center text-md-start"><strong class="d-block d-md-inline-block ">Descrizione:</strong>
				{{ $product->description }}</p>
			<p class="text-center text-md-start"><strong class="d-block d-md-inline-block ">Ingredienti:</strong>
				{{ $product->ingredients }}</p>
			<p class="d-none">{{ $product->visibility }}</p>
		</div>

		<div class="d-flex justify-content-center justify-content-md-start py-1">
			<a href="{{ route('admin.products.edit', ['slug' => $product->slug]) }}" class="btn btn-brand">Modifica Prodotto</a>

			<button id="delete-btn" type="submit" class="btn btn-danger text-white ms-2">Elimina</button>

			<div id="delete-box"
				class="d-none position-absolute top-0 start-0 w-100 vh-100 d-flex justify-content-center align-items-center bg-dark text-white"
				style="--bs-bg-opacity: .8;">
				<div>
					<h2 class="text-center">Sei sicuro di voler eliminare questo prodotto?</h2>

					<div class="d-flex justify-content-center py-3">
						<button id="not-delete" class="btn btn-danger text-white me-1">
							<span class="h4">Annulla</span>
						</button>
						<form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-brand ms-1 text-white">
								<span class="h4 px-1">Elimina</span>
							</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
