@extends('layouts.app')
@section('content')
@include('partials.hero')

<section class="hero-divider bg-color-yellow">
    <div class="container py-5">
        <div class="card border-0">
            <h3 class="mb-3 text-center fw-bold">Statistiche ordini</h3>
            <div style="width: 600px; margin: auto;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">

</section>




@endsection
