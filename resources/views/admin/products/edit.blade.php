@extends('layouts.dashboard')

@section('content')
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('admin.products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data"
		id="product-form">
		@csrf
		@method('PUT')
		{{-- NOME PRODOTTO --}}
		<div class="mb-3">
			<label for="name" class="form-label">Nome prodotto *</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
				form="product-form" required autocomplete="name" autofocus @error('name') is-invalid @enderror>
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		{{-- IMAMGINE --}}
		@if ($product->img)
			<div class="mb-3">
				<h5>Immagine attuale</h5>
				<img width="200px" src="{{ asset('storage/' . $product->img) }}" alt="">
			</div>
		@endif
		<div class="mb-3">
			<label for="img" class="form-label">Nuova immagine </label>
			<input type="file" class="form-control" id="img" name="img" value="{{ $product->img }}">
		</div>

		{{-- PREZZO --}}
		<div class="mb-3">
			<label for="price" class="form-label">Prezzo *</label>
			<input type="number" step='.01' class="form-control" id="price" name="price" value="{{ $product->price }}"
				max="99.99" placeholder="00.00" form="product-form" required autofocus @error('price') is-invalid @enderror>
			@error('price')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		{{-- INGREDIENTI --}}
		<div class="mb-3">
			<label for="ingredients" class="form-label">Ingredienti</label>
			<input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ $product->ingredients }}"
				form="product-form" required autofocus @error('ingredients') is-invalid @enderror>
			@error('ingredients')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		{{-- DESCRIZIONE --}}
		<div class="mb-3">
			<label for="description" class="form-label">Descrizione</label>
			<input type="text" size="100" class="form-control" id="description" name="description"
				value="{{ $product->description }}" form="product-form" autofocus @error('description') is-invalid @enderror>

			@error('description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		{{-- VISIBILITà --}}
		<div class="mb-3">
			<h6>Visibilità *</h6>
			<div class="form-check">

				<div class="form-check form-switch mb-3">
					<input class="form-check-input" type="hidden" name="visibility" data-toggle="switch" form="product-form"
						value="0">
					<input class="form-check-input" type="checkbox" id="visibility" name="visibility" data-toggle="switch"
						form="product-form" value="1" {{ $product->visibility ? 'checked' : '' }}>

					@if ($product->visibility)
						<label class="form-check-label" for="visibility">Visibile ai clienti</label>
					@else
						<label class="form-check-label" for="visibility">Non visibile ai clienti</label>
					@endif
				</div>


				{{-- <input class="form-check-input" type="radio" name="visibility" id="visibility" value="1"
					{{ $product->visibility ? 'checked' : '' }} />
				<label class="form-check-label" for="visibility">
					ON
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="visibility" id="visibility" value="0"
					{{ !$product->visibility ? 'checked' : '' }}>
				<label class="form-check-label" for="visibility">
					OFF
				</label> --}}
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
