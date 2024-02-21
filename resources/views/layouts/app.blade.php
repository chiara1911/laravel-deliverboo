<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid px-4 py-2">

                <div class="logo-wrapper me-2">
                    <a href="http://localhost:5174/">
                        <img id="logo" src="{{ Vite::asset('resources/img/deliveboo-logo.png') }}" alt="Deliveboo Logo">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                                href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>
                        </li> --}}
                        @guest
                        @else
                            @if (Auth::user()->restaurant)
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'admin.dishes.index' ? 'active' : '' }}"
                                        href="{{ route('admin.dishes.index') }}">
                                        Il tuo menù
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}"
                                        href="{{ route('admin.orders.index') }}">
                                        Ordini ricevuti
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'admin.orders.stats' ? 'active' : '' }}"
                                        href="{{ route('admin.orders.stats') }}">
                                        Statistiche ordini
                                    </a>
                                </li>
                            @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="http://localhost:5174/">Torna alla home</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        // validazione input immagine
        const imgFile = document.getElementById("image");
        let fileSize = true;
        // let imgValidated = false;

        function imgLoaded() {
            const limit = 4000;
            const size = imgFile.files[0].size / 1024;

            if (size > limit) {
                fileSize = false;
                document.querySelector('#image').setCustomValidity(true);
            } else {
                fileSize = true;
                document.querySelector('#image').setCustomValidity('');
            }
        }
    </script>
</body>

</html>
