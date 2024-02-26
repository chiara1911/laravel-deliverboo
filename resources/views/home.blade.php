@extends('layouts.app')
@section('content')
<section class="bg-color-yellow">

        @guest
            <div class="container">
                <div class="text-center py-5 d-flex flex-column align-items-center">
                    <div class="w-25 mb-3">
                        <img id="logo" src="{{ Vite::asset('resources/img/logo_food_white.png') }}" alt="Deliveboo Logo">
                    </div>

                    <h1 class="color-secondary fw-bold">
                        Benvenuto in Deliveboo!
                    </h1>
                    <p class="fs-4">
                        Per cominciare,
                        <a href="{{ route('login') }}">accedi</a>
                         o <a href="{{ route('register') }}">registrati</a>.
                    </p>
                </div>
            </div>
        @else
            {{-- @include('partials.hero') --}}
            <div class="container">
                <div class="text-center py-5 d-flex flex-column align-items-center">
                    <div class="w-25 mb-3">
                        <img id="logo" src="{{ Vite::asset('resources/img/logo_food_white.png') }}" alt="Deliveboo Logo">
                    </div>
                    <h1 class="fw-bold mb-3">
                        Ciao <span class="color-tertiary-hover">{{ Auth::user()->name }}</span>, Benvenuto/a in Deliveboo!
                    </h1>
                    <p class="fs-4">Inizia subito a scoprire tutte le funzionalità a te riservate.</p>
                    @if (Auth::user()->restaurant)
                        @php
                            $restaurant = Auth::user()->restaurant;
                        @endphp
                    @else
                        {{-- <p>
                            Sei un nuovo utente ?
                        </p>
                        <a href="{{route('admin.restaurants.create')}}">
                            <button class="btn btn-primary rounded-3 mx-4 ">
                                Aggiungi il tuo ristorante
                            </button>
                        </a> --}}
                    @endif
                </div>
            </div>
        @endguest
    <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">

</section>

@endsection
