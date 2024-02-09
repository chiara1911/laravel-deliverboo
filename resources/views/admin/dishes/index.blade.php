@extends('layouts.app')
@section('content')
    <section class="container-fluid mt-5">
{{-- <h1>{{$restaurant->name}}</h1> --}}
        <h3 class="text-center">Lista dei Piatti</h3>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        Tutti i piatti
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome Piatto</th>
                                <th>Prezzo</th>
                                <th>Ingredienti</th>
                                <th>Modifica</th>
                                <th>Cancella</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishes as $dish)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.dishes.show', $dish->id) }}" class="text-decoration-none">
                                            <p class="text-uppercase text-black ">Nome piatto :
                                                {{ $dish->name }}</p>
                                        </a>
                                    </td>
                                    <td><p>&euro; {{ $dish->price }}</p></td>
                                    <td><p>Ingredienti : {{ $dish->ingredients }}</p></td>
                                    <td>
                                        <a href="{{ route('admin.dishes.show', $dish->id) }}" class="text-decoration-none btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.dishes.show', $dish->id) }}" class="text-decoration-none btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
    </section>
  @endsection
