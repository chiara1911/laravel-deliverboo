@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrati</div>

                    <div class="card-body">
                        <small class="pb-2">
                            i campi obbligatori sono contrassegnati con *
                        </small>
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome<span
                                        class="ms-1">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <div class="invalid-feedback">Inserisci il tuo nome per registrarti</div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome<span
                                        class="ms-1">*</span></label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                    <div class="invalid-feedback">Inserisci il tuo cognome per registrarti</div>
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo Email<span
                                        class="ms-1">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    <div class="invalid-feedback">La mail che hai inserito non è corretta oppure esiste già
                                        nei nostri database</div>
                                    {{-- @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}

                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password<span
                                        class="ms-1">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <div class="invalid-feedback validation-required-password">Inserisci una Password per registrarti</div>
                                    <div class="invalid-feedback validation-min-password d-none">La password deve avere minimo 8 caratteri</div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma la tua
                                    Password<span class="ms-1">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div class="invalid-feedback">La password inserita non corrisponde</div>
                                </div>
                            </div>



                            {{-- Nome --}}
                            <div class="mb-3">
                                <label for="restaurant_name" class="mb-2">Nome Attività<span
                                        class="ms-1">*</span></label>
                                <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror"
                                    id="restaurant_name" name="restaurant_name" value="{{ old('restaurant_name') }}"
                                    required>
                                <div class="invalid-feedback">Inserisci un nome per la tua attività</div>
                                @error('restaurant_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- VAT --}}
                            <div class="mb-3">
                                <label for="vat" class="mb-2">P.Iva<span class="ms-1">*</span></label>
                                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat"
                                    name="vat" pattern="[0-9]{11}" maxlength="11" required value="{{ old('vat') }}">
                                <div class="invalid-feedback">Inserisci un codice di P.Iva valido (11 cifre)</div>
                                @error('vat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Indirizzo --}}
                            <div class="mb-3">
                                <label for="address" class="mb-2">Indirizzo<span class="ms-1">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ old('address') }}" required>
                                <div class="invalid-feedback">Inserisci un indirizzo</div>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tipologia --}}
                            <div class="mb-3">
                                <div class="form-group">
                                    <h6>Seleziona il Tipo di Cucina della tua Attività <span class="ms-1">*</span></h6>
                                    @foreach ($types as $type)
                                        <div class="form-check @error('types') is-invalid @enderror">
                                            <input type="checkbox" class="form-check-input check-type" name="types[]"
                                                onclick="checkboxChange({{ $loop->index }})"
                                                value="{{ $type->id }}"
                                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                            <label for="types" class="form-check-label">
                                                {{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <small class="invalid-feedback-type d-none text-danger">Seleziona almeno una tipologia
                                        per il tuo ristorante</small>
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
                                        <img id="uploaded" src="https://via.placeholder.com/200x110">
                                    </div>
                                    <div class="mb-3">
                                        <small class=" d-block  mb-3 ">(Accettiamo solo file di tipo .jpg che non superino
                                            i 4 mb)</small>

                                        <input class="form-control" name="image" type="file" id="image"
                                            value="{{ old('image') }}" onchange="imgLoaded()">
                                        <div class="invalid-feedback validation-max-size">Il file è superiore a 4
                                            Mb</div>

                                    </div>
                                </div>
                            </div>


                            <div class="pt-3">
                                <button type="reset" class="btn btn-warning text-light">Cancella</button>
                                <button type="submit" class="btn btn-primary me-2"
                                    onclick="checkboxValidate()">Crea</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // validazione conferma password
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password-confirm');
        const passwordRequiredValidation = document.querySelector('.validation-required-password');
        const passwordMinValidation = document.querySelector('.validation-min-password');

        password.onkeyup = validatePassword;
        passwordConfirm.onkeyup = validatePassword;

        function validatePassword() {
            console.log(password.value);
            if (password.value != passwordConfirm.value) {
                passwordConfirm.setCustomValidity(true);
            } else {
                passwordConfirm.setCustomValidity('');
            }
            if (password.value.length == 0) {
                password.setCustomValidity(true);
                passwordRequiredValidation.classList.remove('d-none');
                passwordMinValidation.classList.add('d-none');
            } else if (password.value.length < 8) {
                passwordRequiredValidation.classList.add('d-none');
                passwordMinValidation.classList.remove('d-none');
                password.setCustomValidity(true);
            } else {
                passwordMinValidation.classList.add('d-none');
                password.setCustomValidity('');
            }
        }

        // validazione checkbox
        let checkbox = document.querySelectorAll(".check-type");
        let checkboxSelected = false;
        let checkboxValidated = false;


        function checkboxValidationTrue() {
            for (let i = 0; i < checkbox.length; i++) {
                checkbox[i].removeAttribute("required", "");
                checkboxValidated ? document.querySelector('.invalid-feedback-type').classList.add('d-none') : '';
            }
        }

        function checkboxValidationFalse() {
            for (let i = 0; i < checkbox.length; i++) {
                // checkbox[i].checked ? checkboxSelected = true : '';

                checkbox[i].setAttribute("required", "");
                checkboxValidated ? document.querySelector('.invalid-feedback-type').classList.remove('d-none') : '';
            }
        }

        function checkboxChange(index) {
            checkbox[index].checked ? checkboxSelected = true : checkboxSelected = false;
            checkboxSelected ? checkboxValidationTrue() : checkboxValidationFalse();
        }

        function checkboxValidate() {
            for (let i = 0; i < checkbox.length; i++) {
                checkbox[i].checked ? checkboxSelected = true : '';
            }
            checkboxValidated = true;
            checkboxSelected ? checkboxValidationTrue() : checkboxValidationFalse();
        }
    </script>
@endsection
