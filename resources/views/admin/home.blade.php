@extends('layouts.dashboard')

@section('content')
    <div class="user-page">
        <div class="container p-4">
            <h1>Benvenuto <strong>{{ $user->name }}</strong></h1>
            <h4 class="user-details">{{ $user->business_name }} {{ $user->address }}</h4>


            <div class="row-cols-md-2 row my-4 ">
                <div class="col">
                    <img src="{{ asset('storage/' . $user->cover) }}" alt="">
                </div>
                <div class="container col">
                    <h4>Negli ultimi 30 giorni hai ricevuto</h4>
                    <h2><strong>{{ $number_of_last_30_days_orders }}</strong> ordini </h2>
                    <h4>per un totale di</h4>
                    <h2>€ <strong>{{ $amount_of_last_30_days_orders }}</strong></h2>


                </div>
            </div>

            <div class="best-sellers">
                <h2>Articoli più venduti</h2>
                <div class="d-flex">
                    @foreach ($final_rank_data as $index => $item)
                        <div class="card me-2 my_card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $item->img) }}" class="card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
								<p class="card-text">N° di volte presente in ordine: {{ $final_rank[$index]->top_3 }}</p>
                                <a href="{{ route('admin.products.show',['slug' => $item->slug] ) }}" class="btn btn-brand">Dettaglio del prodotto</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
