@extends('layouts.app')

@section('content')
@include('partials.hero')

    <section>
        <div id="menu" class="container">


            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="">Lista dei Piatti</h3>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-edit">Aggiungi Piatto</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-card card mb-5">
                        <div class="card-header">
                            Tutti i piatti
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome Piatto</th>
                                    <th class="text-center">Modifica</th>
                                    <th class="text-center">Elimina</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dishes as $dish)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.dishes.show', $dish->id) }}">
                                                {{ $dish->name }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                                class="btn btn-edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">

                                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="cancel-btn btn btn-trash ms-3"
                                                    data-item-title="{{ $dish->name }}"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Visualizza i piatti cancellati
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                @if ($deletedDishes->count() > 0)
                                    <div class="table-card card">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nome Piatto</th>
                                                    <th class="text-center">Ripristina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deletedDishes as $dish)
                                                    <tr>
                                                        <td>
                                                            <p >
                                                                {{ $dish->name }}
                                                            </p>
                                                        </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('admin.dishes.restore', $dish->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-restore restore-btn ms-3"
                                                                data-item-title="{{ $dish->name }}">
                                                                <i class="fa-solid fa-rotate-left"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                @else
                                    <p class="p-2">Non ci sono piatti cancellati</p>
                                @endif

                            </div>
                        </div>

                    </div>





            </div>
        </div>

    </section>

    <!--Delete Modal -->
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="removeModalLabel">ATTENZIONE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicur* di voler eliminare <span id="modal-item-title"></span>? <br> Il piatto verrà rimosso dal tuo menù</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-edit" data-bs-dismiss="modal">Si</button>
                    <button type="button" class="btn btn-trash">No</button>
                </div>
            </div>
        </div>
    </div>

     <!--Restore Modal -->
     <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="restoreModalLabel">ATTENZIONE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicur* di voler ripristinare <span id="modal-item-title"></span>? <br> Il piatto verrà aggiunto di nuovo al tuo menù</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-edit" data-bs-dismiss="modal">Si</button>
                    <button type="button" class="btn btn-trash">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection
