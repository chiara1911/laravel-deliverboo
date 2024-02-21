@extends('layouts.app')

@section('content')
    <section class="bg-color-yellow">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 ">
                        <div class="card-header bg-color-orange text-white fw-bold">Accedi</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-4 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            minlength="8" required autocomplete="current-password">
                                        <div class="invalid-feedback">Le credenziali inserite non sono corrette</div>
                                        @error('email' or 'password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Ricordami
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-edit fw-bold">
                                            Effettua il Login
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="ms-3" href="{{ route('password.request') }}">
                                                Hai dimenticato la tua Password ?
                                            </a>
                                        @endif
                                    </div>
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
