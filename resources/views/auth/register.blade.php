@extends('layouts.app')

{{-- @php
dd($categories);
@endphp --}}

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Register') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
										value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="business_name" class="col-md-4 col-form-label text-md-right">Business name</label>

								<div class="col-md-6">
									<input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror"
										name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name" autofocus>

									@error('business_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

								<div class="col-md-6">
									<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
										value="{{ old('address') }}" required autocomplete="address" autofocus>

									@error('address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<h5>Categories</h5>
							<div class="form-check row">
								@foreach ($categories as $category)
									<div class="form-check">
										<input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}"
											id="category-{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
										<label class="form-check-label" for="category-{{ $category->id }}">

											{{ $category->name }}
										</label>
									</div>
								@endforeach
							</div>

							<div class="form-group row">
								<label for="vat" class="col-md-4 col-form-label text-md-right">Vat</label>

								<div class="col-md-6">
									<input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat"
										value="{{ old('vat') }}" required autocomplete="vat" autofocus>

									@error('vat')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<!-- Restaurant Cover

																						<div class="form-group row">
																							<label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant cover') }}</label>

																							<div class="col-md-6">
																								<input id="cover" type="text" class="form-control @error('cover') is-invalid @enderror" name="cover"
																									value="{{ old('cover') }}" required autocomplete="cover" autofocus>

																								@error('cover')
		<span class="invalid-feedback" role="alert">
																																									<strong>{{ $message }}</strong>
																																								</span>
	@enderror
																							</div>
																						</div> -->

							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
										value="{{ old('email') }}" required autocomplete="email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
										name="password" required autocomplete="new-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm"
									class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
										autocomplete="new-password">
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
