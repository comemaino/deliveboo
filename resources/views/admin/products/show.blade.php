@extends('layouts.dashboard')

@section('content')
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
		<p>{{ $product->visibility }}</p>
	</div>



	<p>{{ $product->content }}</p>
@endsection
