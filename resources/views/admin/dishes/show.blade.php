@extends('layouts.app')
@section('content')
    <section class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="page-title">{{ $dish->name }}</h1>
            <div class="d-flex align-items-center">
                <h6 class="me-3">Modifica il piatto</h6>
                <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                    class="btn btn-edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
        <div class="row justify-content-between mb-4">
            <div id="dish-show-img" class="col-12 col-lg-6 px-0">
                <img src="{{asset('storage/'. $dish->image) }}" alt="{{ $dish->name }}">
            </div>
            <div class="p-4 col-12 col-lg-6">
                <div class="mb-4">
                    <h4 class="dish-section-title">Ingredienti</h4>
                    <p class="ps-2">{{ $dish->ingredients }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="dish-section-title">Prezzo</h4>
                    <p class="ps-2">€ {{ $dish->price }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="dish-section-title">Descrizione</h4>
                    @if($dish->description)
                        <p class="ps-2">{{ $dish->description }}</p>
                    @else
                    <p class="text-danger ps-2">Al momento questa sezione è vuota</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="text-center">

            <button class="btn btn-yellow">
                <a href="{{ route('admin.dishes.index') }}">
                    Torna al menù
                </a>
            </button>
        </div>

    </section>
@endsection
