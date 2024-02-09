@extends('layouts.app')
@section('content')
    <section class="container mt-5">
        <h1>{{ $dish->name }}</h1>
        <p>{{ $dish->description }}</p>
        <p>Ingredienti: {{ $dish->ingredients }}</p>
        <p>Prezzo: {{ $dish->price }}</p>
    </section>
@endsection
