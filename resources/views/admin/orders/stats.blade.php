@extends('layouts.app')
@section('content')
@include('partials.hero')

<div class="container">
    <h3 class="mb-3">Statistiche ordini</h3>
    <div style="width: 600px; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
</div>




@endsection
