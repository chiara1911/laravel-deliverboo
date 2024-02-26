@extends('layouts.app')
@section('content')
<section class="bg-color-yellow pt-5">
    <div class="container">
        <div class="card mb-5 p-4">
            <div class="d-flex justify-content-between mb-4">
                <h1 class="page-title">{{ $dish->name }}</h1>
                <div class="d-flex align-items-center">
                    <h6 class="d-none d-md-block">Modifica il piatto</h6>
                    <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="ms-3 btn btn-edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
            </div>
            <div class="row justify-content-between mb-4">
                @if ($dish->image)
                    <div id="dish-show-img" class="col-12 col-lg-6 px-0">
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                    </div>
                @else
                    <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="no-image d-flex flex-column justify-content-center align-items-center p-3">
                            <img src="{{ Vite::asset('resources/img/deliveboo-logo.png') }}" alt="no image">
                            <div class="text-white text-uppercase fs-2 fw-bold">Nessuna immagine</div>
                        </div>
                    </div>
                @endif
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
                        <h4 class="dish-section-title">Visibile</h4>
                        @if (!$dish->visible)
                        <p class="ps-2 text-danger">No</p>
                        @else
                        <p class=" ps-2">Si</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h4 class="dish-section-title">Descrizione</h4>
                        @if ($dish->description)
                            <p class="ps-2">{{ $dish->description }}</p>
                        @else
                            <p class="text-danger ps-2">Al momento questa sezione è vuota</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-center mb-5">
                <button class="btn btn-edit">
                    <a href="{{ route('admin.dishes.index') }}">
                        Torna al menù
                    </a>
                </button>
            </div>
        </div>
    </div>
    <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">
</section>

@endsection
