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
                    Ciao {{ Auth::user()->name }}, Benvenuto in Deliverboo.
                </h1>
                <p>
                    Sei un nuovo utente ?
                </p>
                <a href="{{route('admin.restaurants.create')}}">
                    <button class="btn btn-primary rounded-3 mx-4 ">
                        Aggiungi il tuo ristorante
                    </button>
                </a>
            </div>
        @endguest
    </section>
@endsection
