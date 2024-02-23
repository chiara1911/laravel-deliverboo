@extends('layouts.app')
@section('content')
    @include('partials.hero')

    <section class="hero-divider bg-color-yellow">
        <div class="container py-5">
            <div class="card border-0">
                <h3 class="mb-3 text-center fw-bold">Statistiche ordini</h3>
                <div class="row">
                    <canvas id="myChart" class="col-12 col-lg-6"></canvas>
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
                    data: data.map(row => row.earnings),
                    label: 'Guadagni al mese',
                    borderColor: 'rgba(255, 99, 132, 0.5)',
                    fill: false,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    tension: 0.2

                }]

            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 16
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Mesi',
                            font: {
                                size: 16,
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            },
                            color: 'rgb(255, 99, 132)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Guadagni in euro',
                            font: {
                                size: 16,
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            },
                            color: 'rgb(255, 99, 132)'
                        },
                        ticks: {
                            callback: function(value, index, ticks) {
                                return value + '€';
                            }
                        }
                    }
                }
            },

        })
    </script>
@endsection
