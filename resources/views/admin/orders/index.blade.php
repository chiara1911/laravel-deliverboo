@extends('layouts.app')
@section('content')
@include('partials.hero')

    <section class="container mt-5">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <h3 class="text-center mb-3">Lista degli ordini</h3>
        <div class="row">
            <div class="col-12">
                <div class="table-card card">
                    <div class="card-header">
                        Tutti gli ordini
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Indirizzo</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Prezzo totale</th>
                                <th>Data e ora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <p>
                                            {{ $order->name }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $order->surname }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $order->address }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $order->email }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $order->phone }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $order->total_price }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ date('d/m/Y - H:i', strtotime($order->created_at)) }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

    </section>
@endsection
