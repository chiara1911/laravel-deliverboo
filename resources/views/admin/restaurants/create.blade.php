@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="card my-2  p-4">
                <h2 class="pb-3">
                    Inserisci i dettagli della tua attività:
                </h2>
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
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name"
                            value="{{old('name')}}"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- VAT --}}
                    <div class="mb-3">
                        <label for="vat" class="form-label">P.Iva:</label>
                        <input type="text"
                            class="form-control @error('vat') is-invalid @enderror"
                            id="vat" name="vat"
                            value="{{old('vat')}}"
                            required>
                        @error('vat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Indirizzo --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo:</label>
                        <input type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            id="address" name="address"
                            value="{{old('address')}}"
                            required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tipologia --}}
                    <div class="mb-3">
                        <div class="form-group">
                            <h6>Seleziona il Tipo di Cucina della tua Attività:</h6>
                            @foreach ($types as $type)
                                <div class="form-check @error('types') is-invalid @enderror">
                                    <input type="checkbox" class="form-check-input" name="types" value="{{$type->id}}"
                                    {{$type->name}}>
                                    <label for="types" class="form-check-label">
                                    {{$type->name}}
                                    </label>
                                </div>
                            @endforeach
                            @error('types')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Immagine --}}
                    <div class="mt-3">
                        <label for="image" class="form-label">Inserisci una foto di riferimento:</label>
                        <div class="d-flex mb-4">
                            <div class="me-3 img-preview-box">
                                <img id="uploaded" src="https://via.placeholder.com/200x110" width="100">
                            </div>
                            <div class="mb-3">
                                <input class="form-control " name="image" type="file" id="image" value="{{ old('image') }}">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Bottoni --}}
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Prosegui</button>
                </form>
            </div>
        </div>
    </main>
@endsection
