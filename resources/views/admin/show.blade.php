@extends('layouts.dashboard')

@section('content')
	@if (session()->has('message'))
		<div id="flash-message" class="alert alert-success">
			<h5 class="text-center">{{ session()->get('message') }}</h5>
		</div>
	@endif


	@if (count($products) !== 0)
		<div class="container pb-4">
			<div class="row row-cols-2  row-cols-lg-4  px-2 justify-content-between gx-3">
				@foreach ($products as $product)
					<div class="wrapper">
						<div class="card" style="height: 400px;">
							@if ($product->img)
								<img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="..." style="height: 50%; object-fit:cover;" >
							@endif
							<div class="card-body">
								<div class="name d-flex justify-content-between">
									<h5 class="card-title">{{ $product->name }}</h5>
									<p class="">
										@if ($product->visibility)
											<i class="fa-solid fa-eye" style="color: green"></i>
										@else
											<i class="fa-sharp fa-solid fa-eye-slash" style="color: red"></i>
										@endif
									</p>
								</div>
								<p class="card-text">€ {{ $product->price }}

								</p>

								<div class="text-center">
									<a href="{{ route('admin.products.show', ['slug' => $product->slug]) }}" class="btn btn-brand ">Dettagli
										Prodotto</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>

		</div>
	@else
		<div class="text-center py-5">
			<h3>Il tuo menù è vuoto, <a class="link-primary text-decoration-none"
					href="{{ route('admin.products.create') }}">aggiungi il tuo
					primo prodotto</a></h3>
		</div>
	@endif


@endsection
