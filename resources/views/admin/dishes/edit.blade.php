@extends('layouts.app')
@section('content')
    <section class="bg-color-pink pt-5">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class=" card">
                        <div class="card-header bg-color-orange text-white fw-bold">
                            Modifica il tuo piatto
                        </div>
                        <div class="card-body">
                            <small class="mb-3">
                                i campi obbligatori sono contrassegnati con *
                            </small>
                            <form class="needs-validation" action="{{ route('admin.dishes.update', $dish->id) }}" method="POST"
                                enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="mb-2">Nome</label>
                                    <span class="ms-1">*</span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" required minlength="1" maxlength="200"
                                        value="{{ old('name', $dish->name) }}">
                                    <div class="invalid-feedback">Inserisci un nome per il piatto</div>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="mb-2">Prezzo</label>
                                    <span class="ms-1">*</span>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        name="price" id="price" required value="{{ old('price', $dish->price) }}">
                                    <div class="invalid-feedback">Inserisci un prezzo valido</div>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="visible">Visibile</label>
                                    <span class="ms-1">*</span>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visible" id="visibleTrue"
                                                value="{{ $dish->visible }}"
                                                {{ old('visible', $dish->visible) == true ? 'checked' : '' }}
                                                {{ $dish->visible }}>
                                            <label class="form-check-label" for="visibleFalse">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visible" id="visibleFalse"
                                                value="{{ $dish->visible }}"
                                                {{ old('visible', $dish->visible) == false ? 'checked' : '' }}
                                                {{ $dish->visible }}>
                                            <label class="form-check-label" for="visibleFalse">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="mb-2">Descrizione</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        cols="20" rows="5" placeholder="Inserisci una breve descrizione del tuo piatto...">{{ old('description', $dish->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ingredients" class="mb-2">Ingredienti</label>
                                    <span class="ms-1">*</span>
                                    <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                                        placeholder="Insalata, pomodoro, grana, uovo, ecc..." required cols="20" rows="3">{{ old('ingredients', $dish->ingredients) }}</textarea>
                                    <div class="invalid-feedback">Inserisci almeno un ingrediente</div>
                                    @error('ingredients')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Immagine --}}
                                <div class="mb-3">
                                    <label for="image" class="mb-2">Immagine</label>
                                    <div class="d-flex mb-4">
                                        <div class="me-3 img-preview-box">
                                            <img id="uploaded"
                                                src="@if ($dish->image) {{ asset('storage/' . $dish->image) }} @else http://via.placeholder.com/300x200 @endif"
                                                width="100">
                                        </div>
                                        <div class="mb-3">
                                            <small class=" d-block  mb-3 ">(Accettiamo solo file di tipo .jpg che non superino i
                                                4 mb)</small>
                                            <input class="form-control " name="image" type="file" id="image"
                                                value="{{ old('image') }}" onchange="imgLoaded()">
                                            <div class="invalid-feedback validation-max-size">Il file è superiore a 4 Mb</div>
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
