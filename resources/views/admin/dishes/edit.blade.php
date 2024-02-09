@extends('layouts.app')
@section('content')
    <section class="container-fluid">
        <h1>Modifica il tuo piatto</h1>
        <form action="{{ route('admin.dishes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required minlength="1" maxlength="200" value="{{ old('name', $dish->name) }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" required value="{{ old('price', $dish->price) }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="visible">Visible</label>
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
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    cols="20" rows="5">{{ old('description', $dish->description) }}
                </textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                    cols="20" rows="3">{{ old('ingredients', $dish->ingredients) }}
                </textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
    </section>
@endsection
