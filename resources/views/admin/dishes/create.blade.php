@extends('layouts.app')
@section('content')
    <section class="container-fluid">
        <h1>Aggiungi un nuovo piatto</h1>
        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="visible">Visible</label>
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
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    cols="20" rows="5">{{ old('description') }}
                </textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients">Ingredients</label>
                <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients"
                    cols="20" rows="3">{{ old('ingredients') }}
                </textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex mb-3 column-gap-3 ">

                <div>
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" value="{{ old('image') }}"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="uploaded" width="150" src="http://via.placeholder.com/300x200">
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>
    </section>
@endsection
