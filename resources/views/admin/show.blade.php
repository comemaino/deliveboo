@extends('layouts.dashboard')

@section('content')
	<div class="container">
		<div class="row row-cols-3">

			@foreach ($products as $product)
				<div class="card" style="width: 18rem">
					@if ($product->img)
						<img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="...">
					@endif
					<div class="card-body">
						<h5 class="card-title">{{ $product->name }}</h5>
						<p class="card-text">{{ $product->ingredients }}</p>
						<a href="{{ route('admin.products.show', ['id' => Crypt::encrypt($user->id), 'slug' => $product->slug]) }}"
							class="btn btn-primary">Dettagli Piatto</a>
					</div>
				</div>
			@endforeach

		</div>

	</div>
@endsection
