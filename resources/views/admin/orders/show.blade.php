@extends('layouts.app')
@section('content')
@include('partials.hero')
    <section class="hero-divider bg-color-yellow">
        <div class="container py-5 mb-3">
            <div class="card border-0 p-2">
                <div class="d-flex flex-column flex-md-row justify-content-between px-4 mb-4">
                    <h3 class="my-4 text-center fw-bold">Dettagli ordine</h3>
                    <div class="text-end my-4 ">
                        <p class="card-text"><span class="fw-bold">Numero ordine:</span> {{ $order->id }}</p>
                        <p class="card-text"><span class="fw-bold">Data ordine:</span>  {{ $order->created_at }}</p>
                    </div>

                </div>

                <div class="card-body row">
                    <div class="col-12 col-md-8 mb-3">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="fw-bold">Piatti Ordinati</h4>
                            </div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Piatto</th>
                                            <th>Quantità</th>
                                            <th>Prezzo unitario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->dishes as $dish)
                                            <tr>
                                                <td>
                                                    {{ $dish->name }}
                                                </td>
                                                <td>
                                                    {{ $dish->pivot->quantity }}
                                                </td>
                                                <td>
                                                    <span class="me-1">{{ $dish->price }}</span>
                                                    <span>€</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p class="card-text fw-bold bg-color-pink px-3">Totale: {{ $order->total_price }} €</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card p-2">
                            <div class="card-header bg-white">
                                <h4 class="fw-bold">Dati dell'Utente</h4>

                            </div>

                            <div class="card-body">
                                <p class="card-text"><span class="fw-bold">Nome:</span> {{ $order->name }}</p>
                                <p class="card-text"><span class="fw-bold">Cognome:</span> {{ $order->surname }}</p>
                                <p class="card-text"><span class="fw-bold">Indirizzo:</span> {{ $order->address }}</p>
                                <p class="card-text"><span class="fw-bold">Email:</span> {{ $order->email }}</p>
                                <p class="card-text"><span class="fw-bold">Telefono:</span> {{ $order->phone }}</p>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
        <div class="text-center mb-5">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-edit fw-bold">Torna alla lista degli ordini</a>
        </div>


    <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">

    </section>
@endsection
