@extends('layouts.app')
@section('content')
    @include('partials.hero')

    <section class="hero-divider bg-color-yellow">
        <div class="container py-5">
            <div class="card border-0 p-2">
                <h3 class="my-4 text-center fw-bold">Statistiche ordini</h3>
                <p class="text-center">Esplora i trend, le preferenze dei clienti e le prestazioni del menu per ottimizzare
                    il
                    servizio,
                    massimizzare i profitti mensili e soddisfare al meglio i tuoi ospiti.</p>
                <div class="row p-2 justify-content-center">
                    <div class="col-12 col-lg-6 d-flex justify-content-center">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-center">
                        <canvas id="secondChart"></canvas>
                    </div>
                    <div class="d-none d-lg-flex col-lg-8 justify-content-center">
                        <canvas id="orderChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">

    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const myChart = document.getElementById('myChart');
        const data = @json($orders_earnings);
        let delayed;
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
                animations: {
                    onComplete: () => {
                        delayed = true;
                    },
                    delay: (context) => {
                        let delay = 10;
                        if (context.type === 'data' && context.mode === 'default' && !delayed) {
                            delay = context.dataIndex * 500 + context.datasetIndex * 50;
                        }
                        return delay;
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
                            text: 'Guadagni',
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
                            padding: 30,
                            callback: function(value, index, ticks) {
                                return value + '€';
                            }
                        }
                    }
                }
            },

        })

        const secondChart = document.getElementById('secondChart');
        const dataCount = @json($orders_month);
        console.log(dataCount);
        new Chart(secondChart, {
            type: 'line',
            data: {
                labels: dataCount.map(row => row.current_week),
                datasets: [{
                    data: dataCount.map(row => row.current_earnings),
                    label: 'Guadagni della settimana',
                    borderColor: 'rgba(54, 162, 235, 0.5)',
                    fill: false,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
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
                            text: 'Settimane',
                            font: {
                                size: 16,
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            },
                            color: 'rgba(54, 162, 235)'
                        },
                        ticks: {
                            callback: function(value, index, ticks) {
                                return 'week ' + value;
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Guadagni',
                            font: {
                                size: 16,
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            },
                            color: 'rgba(54, 162, 235)'
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

        const orderChart = document.getElementById('orderChart');
        const orderCount = @json($dishes_orders);
        console.log(orderCount);

        new Chart(orderChart, {
            type: 'bar',
            data: {
                labels: orderCount.map(row => row.dish_name),
                datasets: [{
                    data: orderCount.map(row => row.quantity_ordered),
                    label: 'Numero di ordini per piatto',
                    borderColor: 'rgba(75, 192, 192, 0.5)',
                    fill: false,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
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
                            text: 'Piatti',
                            font: {
                                size: 16,
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            },
                            color: 'rgba(75, 192, 192)'
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Ordini',
                            font: {
                                size: 16,
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            },
                            color: 'rgba(75, 192, 192)'
                        },
                        ticks: {
                            callback: function(value, index, ticks) {
                                if (Math.floor(value) === value) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            },
        })
    </script>
@endsection
