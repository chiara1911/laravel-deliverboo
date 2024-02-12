@extends('layouts.app')
@section('content')
    <section class="container">
        @guest
            <div class="text-center">
                <h1>
                    Benvenuto in Deliverboo
                </h1>
                <p>
                    Per cominciare, accedi o registrati.
                </p>
            </div>
        @else
            <div class="text-center">
                <h1>
                    Ciao {{ Auth::user()->name }}, Benvenuto/a in Deliverboo.
                </h1>
                @if (Auth::user()->restaurant)
                @php
                    $restaurant = Auth::user()->restaurant;
                @endphp
                {{-- <div class="card">

                    <h5>{{$restaurant->name}}</h5>
                </div> --}}
                    @else
                    <p>
                        Sei un nuovo utente ?
                    </p>
                    <a href="{{route('admin.restaurants.create')}}">
                        <button class="btn btn-primary rounded-3 mx-4 ">
                            Aggiungi il tuo ristorante
                        </button>
                    </a>
                @endif

            </div>
        @endguest
    </section>
@endsection
