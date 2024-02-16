@extends('layouts.app')

@section('content')
    <section>

        <div class="container">
            <div class="my-4">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h2 class="fw-bold fs-1">Oops!</h2>
                    <p class="fs-5 ">Non abbiamo trovato ciò che stai cercando.</p>
                    <div class="w-50 mb-5 rounded-4 overflow-hidden">
                        <img src="{{ Vite::asset('resources/img/sad-dish.jpg') }}" alt="sad-dish.jpg">
                    </div>

                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-edit fw-bold">Torna al tuo menù</a>
                </div>

            </div>
        </div>
    </section>
@endsection
