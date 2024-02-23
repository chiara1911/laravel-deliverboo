@extends('layouts.app')
@section('content')
@include('partials.hero')
    <section class="hero-divider bg-color-yellow">
        <div class="container py-5">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h3 class="text-center mb-3 fw-bold ">Lista degli ordini</h3>
            <div class="row">
                <div class="col-12">
                    <div class="table-card card border-0 ">
                        <div class="card-header">
                            Tutti gli ordini
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell">Nome</th>
                                    <th class="d-none d-md-table-cell">Cognome</th>
                                    <th class="d-none d-lg-table-cell">Indirizzo</th>
                                    <th class="d-none d-xl-table-cell">Email</th>
                                    <th class="d-none d-xl-table-cell">Telefono</th>
                                    <th>Totale Ordine</th>
                                    <th>Data e ora</th>
                                    <th class="text-center">Dettaglio Ordine</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>

                                        <td class="d-none d-md-table-cell">
                                            {{ $order->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            {{ $order->surname }}
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            {{ $order->address }}
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            {{ $order->email }}
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            {{ $order->phone }}
                                        </td>
                                        <td>
                                            <span class="me-1">{{(str_replace('.',',',$order->total_price)) }}</span> <span>€</span>
                                        </td>
                                        <td>
                                            <p>
                                                {{ date('d/m/Y - H:i', strtotime($order->created_at)) }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.orders.show', $order->id) }}">
                                                <button class="btn btn-edit">Apri</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>

    <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">

    </section>
@endsection
