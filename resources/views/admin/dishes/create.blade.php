@extends('layouts.app')
@section('content')
    <section class="bg-color-pink pt-5">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0">
                        <div class="card-header bg-color-orange text-white fw-bold">
                            Aggiungi un nuovo piatto
                        </div>
                        <div class="card-body">
                            <small class="mb-3">
                                I campi obbligatori sono contrassegnati con *
                            </small>
                            <form class="needs-validation py-2" action="{{ route('admin.dishes.store') }}" method="POST"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="name" class="mb-2">Nome</label>
                                    <span class="ms-1">*</span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" required>
                                    <div class="invalid-feedback">Inserisci un nome per il piatto</div>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="mb-2">Prezzo</label>
                                    <span class="ms-1">*</span>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        name="price" id="price" value="{{ old('price') }}" step=".01" min="0"
                                        required>
                                    <div class="invalid-feedback">Inserisci un prezzo valido</div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="visible" class="mb-2">Visibile</label>
                                    <span class="ms-1">*</span>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visible" id="visibleTrue"
                                                value="1" checked>
                                            <label class="form-check-label" for="visibleTrue">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visible" id="visibleFalse"
                                                value="0">
                                            <label class="form-check-label" for="visibleFalse">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description"class="mb-2">Descrizione</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        placeholder="Inserisci una breve descrizione del tuo piatto..." cols="20" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ingredients" class="mb-2">Ingredienti</label>
                                    <span class="ms-1">*</span>
                                    <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" required
                                        placeholder="Insalata, pomodoro, grana, uovo, ecc..." cols="20" rows="3">{{ old('ingredients') }}</textarea>
                                    <div class="invalid-feedback">Inserisci almeno un ingrediente</div>
                                    @error('ingredients')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex mb-3 column-gap-3 ">
                                    <div>
                                        <label for="image" class="form-label d-block">Immagine</label>
                                        <div class=" d-flex">
                                            <div class="me-4 img-preview-box">
                                                <img id="uploaded" width="150" src="http://via.placeholder.com/300x200">
                                            </div>
                                            <div>
                                                <small class=" d-block  mb-3 ">(Accettiamo solo file di tipo .jpg che non
                                                    superino i 4 mb)</small>
                                                <input type="file" id="image" name="image" value="{{ old('image') }}"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    onchange="imgLoaded()" multiple accept=".jpg">
                                                <div class="invalid-feedback validation-max-size">
                                                    Il file è superiore a 4 Mb
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="pt-3">
                                        <button type="reset" class="btn btn-trash fw-bold">Cancella</button>
                                        <button type="submit" class="btn btn-edit fw-bold">Crea</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ Vite::asset('resources/img/wave-white.png') }}" alt="bg-wave">

    </section>
@endsection
