@extends('layouts.dashboard')

@section('content')
	{{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}


	<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('POST')
		{{-- <div class="mb-3">
			<input type="number" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}" hidden>
		</div> --}}
		<div class="mb-3">
			<label for="name" class="form-label">Product Name</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="mb-3">
			<label for="img" class="form-label">Product Image</label>
			<input type="file" class="form-control" id="img" name="img">
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">Product Price</label>
			<input type="number" step='.01' class="form-control" id="price" name="price">
		</div>
		<div class="mb-3">
			<label for="ingredients" class="form-label">Product Ingredients</label>
			<input type="text" class="form-control" id="ingredients" name="ingredients">
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Product Description</label>
			<textarea class="form-control" id="description" name="description"></textarea>
		</div>
		{{-- <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="visibility" name="visibility" data-toggle="switch" value="1">
            <label class="form-check-label" for="visibility">Product Visibility</label>
        </div> --}}
		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input" type="radio" name="visibility" id="visibility" value="1">
				<label class="form-check-label" for="visibility">
					Visibility ON
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="visibility" id="visibility" value="0">
				<label class="form-check-label" for="visibility">
					Visibility OFF
				</label>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection