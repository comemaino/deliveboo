@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header text-center text-uppercase">{{ __('Form di registrazione') }}</div>

					<div class="card-body">
						<form id="register-form"" method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
							class="sign-up-form needs-validation" novalidate>
							@csrf
							@method('POST')

							{{-- @if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif --}}
							{{-- NOME UTENTE --}}
							<div class="form-group row">
								<label for="name" class="col-md-3 col-form-label text-md-right">Nome utente *</label>

								<div class="col-md-9">
									<input form="register-form" id="name" type="text"
										class="form-control @error('name') is-invalid @enderror" pattern="[a-zA-Z0-9]{4,50}"
										placeholder="Può contenere solo caratteri alfanumerici" name="name" value="{{ old('name') }}" required
										autocomplete="name" autofocus>

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- NOME ATTIVITà --}}
							<div class="form-group row mt-3">
								<label for="business_name" class="col-md-3 col-form-label text-md-right">Nome attività *</label>

								<div class="col-md-9">
									<input form="register-form" id="business-name" type="text"
										class="form-control  @error('business_name') is-invalid @enderror" pattern="[^#./$%_*+^]{1,50}"
										name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name" autofocus>

									@error('business_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- INDIRIZZO --}}
							<div class="form-group row mt-3">
								<label for="address" class="col-md-3 col-form-label text-md-right">Indirizzo *</label>

								<div class="col-md-9">
									<input form="register-form" id="address" type="text"
										class="form-control @error('address') is-invalid @enderror" name="address"
										placeholder="es.: Via Roma, 1 10100, Roma (RM)  " value="{{ old('address') }}" required autocomplete="address"
										autofocus>

									@error('address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- CATEGORIE --}}
							<div class="row mt-4">
								<div class="label col-md-3">
									<h6>Categorie *</h6>
								</div>
								<div class=" row col-md-9 mx-auto checkbox-group form-check d-flex flex-wrap">
									@foreach ($categories as $category)
										<div id="checkbox-container" class="form-check d-inline-block col col-6 col-lg-3">
											<input form="register-form" name="categories[]"
												class=" form-check-input @error('category_id') is-invalid @enderror" type="checkbox"
												value="{{ $category->id }}" id="category-{{ $category->id }}"
												{{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
											<label class="form-check-label text-capitalize" for="category-{{ $category->id }}">

												{{ $category->name }}
											</label>
										</div>
									@endforeach
								</div>
							</div>
							{{-- P. IVA --}}
							<div class="form-group row mt-3">
								<label for="vat" class="col-md-3 col-form-label text-md-right">P. IVA*</label>

								<div class="col-md-9">
									<input form="register-form" id="vat" type="text" inputmode="numeric" maxlength="11"
										class="form-control @error('vat') is-invalid @enderror" pattern="[0-9]{11}" name="vat"
										value="{{ old('vat') }}" required autocomplete="vat" autofocus>

									@error('vat')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>


							{{-- COVER --}}
							<div class="form-group row mt-3">
								<label for="cover" class="col-md-3 col-form-label text-md-right">{{ __('Immagine di copertina *') }}</label>

								<div class="col-md-9">
									<input form="register-form" id="cover" type="file"
										class="form-control @error('cover') is-invalid @enderror" name="cover" value="{{ old('cover') }}"
										accept="image/*" required autocomplete="cover" autofocus>

									@error('cover')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- EMAIL --}}
							<div class="form-group row mt-3">
								<label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Indirizzo e-mail *') }}</label>

								<div class="col-md-9">
									<input form="register-form" id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
										placeholder="example@email.com" class="form-control @error('email') is-invalid @enderror" name="email"
										value="{{ old('email') }}" required autocomplete="email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- PASSWORD --}}
							<div class="form-group row mt-3">
								<label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password *') }}</label>

								<div class="col-md-9">
									<input form="register-form" id="password" type="password"
										class="form-control @error('password') is-invalid @enderror" name="password" required
										autocomplete="new-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row mt-3">
								<label for="password-confirm"
									class="col-md-3 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

								<div class="col-md-9">
									<input form="register-form" id="password-confirm" type="password" class="form-control"
										name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="form-group row mt-3 text-center">
								<small class=" text-black-50">* I campi indicati sono richiesti</small>
								<div class="col-md-6 offset-md-3 mt-3">
									<button type="submit" class="btn brand-btn text-bold text-uppercase" id="submit" disabled>
										Registrati
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		const submitBtn = document.getElementById('submit')
		const userName = document.getElementById('name')
		const businessName = document.getElementById('business-name')
		const address = document.getElementById('address')
		const categories = document.querySelectorAll('input[type="checkbox"]')
		const vat = document.getElementById('vat')
		const cover = document.getElementById('cover')
		const email = document.getElementById('email')
		const password = document.getElementById('password')
		const pswConfirm = document.getElementById('password-confirm')
		console.log(categories);

		function updateSubmitBtn() {
			const userNameValue = userName.value.trim();
			const businessNameValue = businessName.value.trim();
			const addressValue = address.value.trim();
			// const categoriesValue = categories.value;
			const vatValue = vat.value.trim();
			const coverValue = cover.value.trim();
			const emailValue = email.value.trim();
			const passwordValue = password.value.trim();
			const pswConfirmValue = pswConfirm.value.trim();
			let pswMatch = false;
			if (passwordValue === pswConfirmValue) {
				pswMatch = true;
			}
			const checkArray = Array.prototype.slice.call(categories).some(x => x.checked)
			// debugger;
			if (userNameValue && businessNameValue && addressValue && checkArray && vatValue && coverValue && emailValue &&
				passwordValue &&
				pswConfirmValue && pswMatch) {
				submitBtn.removeAttribute('disabled');
			} else {
				submitBtn.setAttribute('disabled', 'disabled');
			}

			console.log(checkArray);
		}

		userName.addEventListener('input', updateSubmitBtn);
		businessName.addEventListener('input', updateSubmitBtn);
		address.addEventListener('input', updateSubmitBtn);
		vat.addEventListener('input', updateSubmitBtn);
		cover.addEventListener('input', updateSubmitBtn);
		email.addEventListener('input', updateSubmitBtn);
		password.addEventListener('input', updateSubmitBtn);
		pswConfirm.addEventListener('input', updateSubmitBtn);

		categories.forEach(element => {
			element.addEventListener('input', updateSubmitBtn)
		});
	</script>
@endsection
