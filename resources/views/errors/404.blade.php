@extends('layouts.app')

@section('content')
    <section>

        <div class="container">
            <div class="card mt-1">
                <div class="text-center pb-2">
                    <h2>Purtroppo questo piatto non è presente nel tuo ristorante</h2>
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-yellow">torna al tuo menù</a>
                </div>
               
                <img src="{{ asset('storage/restaurants/sad-dish.jpg') }}" alt="sad-dish.jpg" class="w-75h-75">
               
            </div>
        </div>
    </section>
@endsection
