@extends('layouts.app')
@section('content')
    <section class="container">
        <h1 class="mb-4 mt-2">Aggiungi un nuovo piatto</h1>
        <form class="needs-validation" action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data" novalidate>
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
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                <div class="invalid-feedback">Inserisci un nome per il piatto</div>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="mb-2">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price') }}" step=".01" min="0" required>
                <div class="invalid-feedback">Inserisci un prezzo valido</div>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="visible" class="mb-2">Visibile</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visibleTrue" value="1"
                            checked>
                        <label class="form-check-label" for="visibleTrue">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visibleFalse" value="0">
                        <label class="form-check-label" for="visibleFalse">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="description"class="mb-2">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Inserisci una breve descrizione del tuo piatto..."
                    cols="20" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients" class="mb-2">Ingredienti</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" required placeholder="Insalata, pomodoro, grana, uovo, ecc..."
                    cols="20" rows="3">{{ old('ingredients') }}</textarea>
                <div class="invalid-feedback">Inserisci almeno un ingrediente</div>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex mb-3 column-gap-3 ">

                <div>
                    <label for="image" class="form-label d-block">Immagine</label>
                    <small class=" d-block  mb-3 ">(Accettiamo solo file di tipo .jpg che non superi i 3 mb-0 )</small>
                    <div class=" d-flex  align-items-center">
                        <div class="me-4 img-preview-box">
                            <img id="uploaded" width="150" src="http://via.placeholder.com/300x200">
                        </div>
                        <input type="file" id="image" name="image" value="{{ old('image') }}"
                            class="form-control @error('image') is-invalid @enderror" multiple accept=".jpg">
                            <div class="invalid-feedback-max-size d-none">Il file non può superare i 3Mb</div>
                    </div>
                </div>
            </div>

            <div class="pt-3">
                <button type="reset" class="btn btn-warning text-light">Cancella</button>
                <button type="submit" class="btn btn-primary me-2">Crea</button>
            </div>
        </form>
    </section>
@endsection
