<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Indigo.ID</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="#">
                    INDIGO.ID
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    Home --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @if (Auth::user()->role == 'pencari')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('daftar_beasiswa') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('daftar_beasiswa') }}">Beasiswa</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('daftar_lomba') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('daftar_lomba') }}">Lomba</a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="nav-item  {{ request()->routeIs('admin.tambah_beasiswa') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.tambah_beasiswa') }}">Tambah Beasiswa</a>
                                </li>
                                <li class="nav-item  {{ request()->routeIs('admin.tambah_lomba') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.tambah_lomba') }}">Tambah Lomba</a>
                                </li>
                                <li class="nav-item  {{ request()->routeIs('admin.daftar_beasiswa') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.daftar_beasiswa') }}">Daftar Beasiswa</a>
                                </li>
                                <li class="nav-item  {{ request()->routeIs('admin.daftar_lomba') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.daftar_lomba') }}">Daftar Lomba</a>
                                </li>
                                <li class="nav-item  {{ request()->routeIs('admin.histori_login') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.histori_login') }}">Histori Login</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item  {{ request()->routeIs('login') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item  {{ request()->routeIs('register') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

