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
        <p class="d-none">{{ $product->visibility }}</p>
    </div>



    {{-- <p>{{ $product->content }}</p> --}}

    <a href="{{ route('admin.products.edit', ['slug' => $product->slug]) }}"
        class="btn btn-primary">Modifica Piatto</a>

    <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Cancella</button>
    </form>
@endsection
