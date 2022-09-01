@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header">{{ __('Register') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
										pattern="[a-zA-Z0-9]{4,50}" placeholder="Può contenere solo caratteri alfanumerici. min=4" name="name"
										value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- NOME ATTIVITà --}}
							<div class="form-group row">
								<label for="business_name" class="col-md-3 col-form-label text-md-right">Nome attività *</label>

								<div class="col-md-9">
									<input id="business_name" type="text" class="form-control  @error('business_name') is-invalid @enderror"
										pattern="[^#./$%_*+^]{1,50}" name="business_name" value="{{ old('business_name') }}" required
										autocomplete="business_name" autofocus>

									@error('business_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- INDIRIZZO --}}
							<div class="form-group row">
								<label for="address" class="col-md-3 col-form-label text-md-right">Indirizzo *</label>

								<div class="col-md-9">
									<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
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
							<h6>Categorie *</h6>
							<div class="checkbox-group form-check d-flex flex-wrap">
								@foreach ($categories as $category)
									<div class="form-check d-inline-block w-25">
										<input name="categories[]" class=" form-check-input @error('category_id') is-invalid @enderror" type="checkbox"
											value="{{ $category->id }}" id="category-{{ $category->id }}"
											{{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
										<label class="form-check-label text-capitalize" for="category-{{ $category->id }}">

											{{ $category->name }}
										</label>
									</div>
								@endforeach
							</div>
							{{-- P. IVA --}}
							<div class="form-group row">
								<label for="vat" class="col-md-4 col-form-label text-md-right">P. IVA*</label>

								<div class="col-md-6">
									<input id="vat" type="text" maxlength="11" class="form-control @error('vat') is-invalid @enderror"
										pattern="[0-9]{11}" name="vat" value="{{ old('vat') }}" required autocomplete="vat" autofocus>

									@error('vat')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>


							{{-- COVER --}}
							<div class="form-group row">
								<label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Immagine di copertina') }}</label>

								<div class="col-md-6">
									<input id="cover" type="file" class="form-control @error('cover') is-invalid @enderror" name="cover"
										value="{{ old('cover') }}" accept="image/*" required autocomplete="cover" autofocus>

									@error('cover')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							{{-- EMAIL --}}
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail*') }}</label>

								<div class="col-md-6">
									<input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
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
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

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
									class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

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
