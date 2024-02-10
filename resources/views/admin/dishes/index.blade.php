@extends('layouts.app')
@section('content')

    <section class="container-fluid mt-5">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <h3>Lista dei Piatti</h3>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi Piatto</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Tutti i piatti
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome Piatto</th>
                                <th class="text-center">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishes as $dish)
                                <tr>
                                    <td>
                                        <p class="text-uppercase text-black ">
                                            {{ $dish->name }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-evenly">
                                            <a href="{{ route('admin.dishes.show', $dish->id) }}"
                                                class="text-decoration-none btn btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                                class="text-decoration-none btn btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="cancel-btn btn btn-danger ms-3"
                                                    data-item-title="{{ $dish->name }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="card">
                    <div class="card-header">
                        Tutti i piatti cancellati
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome Piatto</th>
                                <th class="text-center">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deletedDishes as $dish)
                                <tr>
                                    <td>
                                        <p class="text-uppercase text-black ">
                                            {{ $dish->name }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-evenly">
                                            <a href="{{ route('admin.dishes.show', $dish->id) }}"
                                                class="text-decoration-none btn btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                             </a>

                                            <form action="{{ route('admin.dishes.restore', $dish->id) }}" method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <button type="submit" class="btn btn-danger ms-3"
                                                    data-item-title="{{ $dish->name }}"><i
                                                        class="fa-solid fa-rotate-left"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="removeModalLabel">ATTENZIONE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicur* di voler eliminare <span id="modal-item-title"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Si</button>
                    <button type="button" class="btn btn-primary">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection
