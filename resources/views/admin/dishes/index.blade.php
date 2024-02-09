@extends('layouts.app')
@section('content')
    <section class="container-fluid mt-5">

        <h1 class="text-center">Lista dei Piatti</h1>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header ">
                        Tutti i piatti
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome Piatto</th>
                                <th>Modifica</th>
                                <th>Cancella</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishes as $dish)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.dishes.show', $dish->id) }}" class="text-decoration-none">
                                            <p class="text-uppercase text-black ">Nome piatto :
                                                {{ $dish->name }}</p>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
    </section>
  @endsection
