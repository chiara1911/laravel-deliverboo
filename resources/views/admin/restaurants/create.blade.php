@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="card my-2  p-4">
                <h1 class="mb-4 mt-2">
                    Inserisci i dettagli della tua attività:
                </h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- form  --}}
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    {{-- Nome --}}
                    <div class="mb-3">
                        <label for="name" class="mb-2">Nome</label>
                        <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name"
                            value="{{old('name')}}"
                            required>
                        <div class="invalid-feedback">Inserisci un nome per la tua attività</div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- VAT --}}
                    <div class="mb-3">
                        <label for="vat" class="mb-2">P.Iva</label>
                        <input type="text"
                            class="form-control @error('vat') is-invalid @enderror"
                            id="vat" name="vat"
                            value="{{old('vat')}}"
                            required>
                        <div class="invalid-feedback">Inserisci un codice di P.Iva valido (11 cifre)</div>
                        @error('vat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Indirizzo --}}
                    <div class="mb-3">
                        <label for="address" class="mb-2">Indirizzo</label>
                        <input type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            id="address" name="address"
                            value="{{old('address')}}"
                            required>
                        <div class="invalid-feedback">Inserisci un indirizzo</div>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tipologia --}}
                    <div class="mb-3">
                        <div class="form-group">
                            <h6>Seleziona il Tipo di Cucina della tua Attività </h6>
                            @foreach ($types as $type)
                                <div class="form-check @error('types') is-invalid @enderror">
                                    <input type="checkbox" class="form-check-input check-type" name="types[]" value="{{$type->id}}"
                                   {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                    <label for="types" class="form-check-label">
                                    {{$type->name}}
                                    </label>
                                </div>
                            @endforeach
                            <small class="invalid-feedback-type d-none text-danger">Seleziona almeno una tipologia per il tuo ristorante</small>
                            @error('types')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Immagine --}}
                    <div class="mt-3">
                        <label for="image" class="mb-2">Immagine</label>
                        <div class="d-flex mb-4">
                            <div class="me-3 img-preview-box">
                                <img id="uploaded" src="https://via.placeholder.com/200x110" >
                            </div>
                            <div class="mb-3">
                            <small class=" d-block  mb-3 ">(Accettiamo solo file di tipo .jpg che non superino i 4 mb)</small>

                                <input class="form-control " name="image" type="file" id="image" value="{{ old('image') }}">
                                <small class="invalid-feedback-max-size d-none text-danger ">Il file è superiore a 4 Mb</small>

                            </div>
                        </div>
                    </div>

                    {{-- Bottoni --}}
                    <div class="pt-3">
                        <button type="reset" class="btn btn-warning text-light">Cancella</button>
                        <button type="submit" class="btn btn-primary me-2">Crea</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
