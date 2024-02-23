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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const myChart = document.getElementById('myChart');
        const data = @json($orders_earnings);
        console.log(data);
        new Chart(myChart, {
            type: 'line',

            data: {
                labels: data.map(row => row.months),
                datasets: [{
                    label: 'Guadagni al mese',
                    data: data.map(row => row.earnings),
                    fill: false,
                    borderColor: 'pink',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    tension: 0.2

                }]

            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Mesi'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Guadagni'
                        }
                    }
                }
            },

        })
    </script>
@endsection
