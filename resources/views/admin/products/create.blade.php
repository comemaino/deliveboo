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


	<form class="p-4" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
		id="product-form">
		@csrf
		@method('POST')
		{{-- <div class="mb-3">
			<input type="number" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}" hidden>
	</div> --}}

		{{-- NOME PRODOTTO --}}
		<div class="mb-3">
			<label for="name" class="form-label">Nome prodotto *</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
				form="product-form" pattern="[a-zA-Z]{3,50}"
				placeholder="Può contenere solo lettere, maiuscole o minuscole. min=3 max=50" required autocomplete="name" autofocus
				@error('name') is-invalid @enderror>
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		{{-- IMMAGINE --}}
		<div class="mb-3">
			<label for="img" class="form-label">Immagine *</label>
			<input type="file" class="form-control" id="img" name="img" value="{{ old('img') }}"
				form="product-form" accept="image/*" required autofocus @error('img') is-invalid @enderror>
			@error('img')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		{{-- PREZZO --}}
		<div class="mb-3">
			<label for="price" class="form-label">Prezzo in € *</label>
			<input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}"
				min="00.01" max="99.99" placeholder="00.00" form="product-form" required autofocus
				@error('price') is-invalid @enderror>
			@error('price')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		{{-- INGREDIENTI --}}
		<div class="mb-3">
			<label for="ingredients" class="form-label">Ingredienti *</label>
			<input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients') }}"
				form="product-form" placeholder="Elencare gli ingredienti separati da una virgola" required autofocus
				@error('ingredients') is-invalid @enderror>
			@error('ingredients')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="mb-3">
			{{-- DESCRIZIONE --}}
			<label for="description" class="form-label">Descrizione</label>
			<input type="text" size="100" class="form-control" id="description" name="description"
				value="{{ old('description') }}" form="product-form" required autofocus @error('description') is-invalid @enderror>

			@error('description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div>
			<div class="mb-3 form-check d-flex p-0 ">
				{{-- <h6>Visibilità *</h6> --}}
				<label class="form-label" for="visibility">Visibilità *</label>
				<div class="form-check form-switch ms-2">
					<input class="form-check-input" type="hidden" name="visibility" data-toggle="switch" form="product-form"
						value="0">
					<input class="form-check-input" type="checkbox" id="visibility" name="visibility" data-toggle="switch"
						form="product-form" value="1">
					{{-- <label class="form-check-label" for="visibility">Visibile ai clienti</label>
				</div> --}}

					{{-- <div class="form-check" @error('description') is-invalid @enderror>
					<input class="form-check-input" type="radio" name="visibility" id="visibility" value="1">
					<label class="form-check-label" for="visibility">
						ON
					</label>
					<input class="form-check-input" type="radio" name="visibility" id="visibility" value="0">
					<label class="form-check-label" for="visibility">
						OFF
					</label>
				</div> --}}
				</div>
			</div>
			<small class=" text-black-50">* I campi indicati sono richiesti</small>
			<div class="btn-wrapper text-center text-md-start mt-3">
				<button type="submit" id="submit" class="btn btn-brand" disabled>Invia</button>
			</div>
	</form>

	<script type="text/javascript">
		const submitBtn = document.getElementById('submit')
		const productName = document.getElementById('name')
		const productImg = document.getElementById('img')
		const productPrice = document.getElementById('price')
		const productIngr = document.getElementById('ingredients')

		function updateSubmitBtn() {
			const productNameValue = productName.value.trim();
			const productImgValue = productImg.value.trim();
			const productIngrValue = productIngr.value.trim();
			const productPriceValue = productPrice.value.trim();

			if (productNameValue && productImgValue && productIngrValue && productPriceValue) {
				submitBtn.removeAttribute('disabled');
			} else {
				submitBtn.setAttribute('disabled', 'disabled');
			}
		}

		productName.addEventListener('input', updateSubmitBtn);
		productImg.addEventListener('input', updateSubmitBtn);
		productIngr.addEventListener('input', updateSubmitBtn);
		productPrice.addEventListener('input', updateSubmitBtn);
	</script>
@endsection
