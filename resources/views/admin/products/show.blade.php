@extends('layouts.dashboard')

@section('content')
	@if (session()->has('message'))
		<div id="flash-message" class="alert alert-success">
			<h5 class="text-center">{{ session()->get('message') }}</h5>
		</div>
	@endif

	<div class="container p-3 ">
		<div class="img-title text-center">
			<h1>{{ $product->name }}</h1>

			@if ($product->img)
				<img style="max-width: 400px;" src="{{ asset('storage/' . $product->img) }}" alt="">
			@endif
		</div>

		{{-- <div>
			<small>SLUG: <strong>{{ $product->slug }}</strong></small>
		</div> --}}

		<div class="mt-3">
			<p><strong>Prezzo:</strong> € {{ $product->price }}</p>
			<p><strong>Descrizione:</strong> {{ $product->description }}</p>
			<p><strong>Ingredienti:</strong> {{ $product->ingredients }}</p>
			<p class="d-none">{{ $product->visibility }}</p>
		</div>

		<div class="d-flex py-1 justify-content-center">
			<a href="{{ route('admin.products.edit', ['slug' => $product->slug]) }}" class="btn btn-brand">Modifica Piatto</a>

			<button id="delete-btn" type="submit" class="btn btn-danger text-white ms-2">Elimina</button>

			<div id="delete-box"
				class="d-none position-absolute top-0 start-0 w-100 vh-100 d-flex justify-content-center align-items-center bg-dark text-white"
				style="--bs-bg-opacity: .8;">
				<div>
					<h1>Sei sicuro di voler eliminare questo prodotto?</h1>

					<div class="d-flex justify-content-center py-3">
						<button id="not-delete" class="btn btn-danger text-white">
							<span class="h3">Annulla</span>
						</button>
						<form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-success me-3 text-white">
								<span class="h3 px-1">Elimina</span>
							</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
