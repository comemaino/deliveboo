@extends('layouts.dashboard')

@section('content')
    @if (session()->has('message'))
        <div id="flash-message" class="alert alert-success">
            <h5 class="text-center">{{ session()->get('message') }}</h5>
        </div>
    @endif


    @if (count($products) !== 0)
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
                            <a href="{{ route('admin.products.show', ['slug' => $product->slug]) }}"
                                class="btn btn-primary">Dettagli Piatto</a>
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
