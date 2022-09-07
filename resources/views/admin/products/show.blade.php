@extends('layouts.dashboard')

@section('content')
    @if (session()->has('message'))
        <div id="flash-message" class="alert alert-success">
            <h5 class="text-center">{{ session()->get('message') }}</h5>
        </div>
    @endif

    <h1>{{ $product->name }}</h1>

    @if ($product->img)
        <img style="max-width: 400px;" src="{{ asset('storage/' . $product->img) }}" alt="">
    @endif

    <div>
        <small>SLUG: <strong>{{ $product->slug }}</strong></small>
    </div>

    <div>
        <p>Prezzo: €{{ $product->price }}</p>
        <p>Descrizione: {{ $product->description }}</p>
        <p>Ingredienti: {{ $product->ingredients }}</p>
        <p class="d-none">{{ $product->visibility }}</p>
    </div>

    <div class="d-flex py-1">
        <a href="{{ route('admin.products.edit', ['slug' => $product->slug]) }}" class="btn btn-primary">Modifica Piatto</a>

        <button id="delete-btn" type="submit" class="btn btn-danger ms-2">Elimina</button>

        <div id="delete-box" class="d-none position-absolute top-0 start-0 w-100 vh-100 d-flex justify-content-center align-items-center bg-dark text-white" style="--bs-bg-opacity: .8;">
			<div>
				<h1>Sei sicuro di voler eliminare questo prodotto?</h1>

				<div class="d-flex justify-content-center py-3">
					<form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger me-3 text-white">
							<span class="h3 px-1">Si</span>
						</button>
					</form>
					<button id="not-delete" class="btn btn-success text-white">
						<span class="h3">No</span>
					</button>
				</div>
			</div>
        </div>
    </div>
@endsection
