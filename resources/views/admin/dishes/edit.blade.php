@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class="mb-4 mt-2">Modifica il tuo piatto</h1>
        <form class="needs-validation" action="{{ route('admin.dishes.update', $dish->id) }}" method="POST"
            enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="mb-2">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required minlength="1" maxlength="200" value="{{ old('name', $dish->name) }}">
                <div class="invalid-feedback">Inserisci un nome per il piatto</div>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="mb-2">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" required value="{{ old('price', $dish->price) }}">
                <div class="invalid-feedback">Inserisci un prezzo valido</div>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="visible">Visibile</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visibleTrue"
                            value="{{ $dish->visible }}" {{ old('visible', $dish->visible) == true ? 'checked' : '' }}
                            {{ $dish->visible }}>
                        <label class="form-check-label" for="visibleFalse">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visibleFalse"
                            value="{{ $dish->visible }}" {{ old('visible', $dish->visible) == false ? 'checked' : '' }}
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
                        <img id="uploaded" src="@if($dish->image) {{ asset('storage/'.$dish->image )}} @else http://via.placeholder.com/300x200 @endif" width="100">
                    </div>
                    <div class="mb-3">
                        <small class=" d-block  mb-3 ">(Accettiamo solo file di tipo .jpg che non superino i 1 mb)</small>
                        <input class="form-control " name="image" type="file" id="image"
                            value="{{ old('image') }}">
                            <small class="invalid-feedback-max-size d-none text-danger ">Il file è superiore a 1 Mb</small>
                        </div>
                </div>
            </div>


            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
    </section>
@endsection
