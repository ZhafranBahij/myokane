<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item" >
                            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}" wire:navigate>{{ __('Home') }}</a>
                        </li>
                        @can('view user')
                            <li class="nav-item">
                                <a class="nav-link text-capitalize {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}"  wire:navigate>{{ __('user') }}</a>
                            </li>
                        @endcan
                        @can('view role')
                            <li class="nav-item">
                                <a class="nav-link text-capitalize {{ Route::is('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}"  wire:navigate>{{ __('role') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize {{ Route::is('permissions.*') ? 'active' : '' }}" href="{{ route('permissions.index') }}"  wire:navigate>{{ __('permission') }}</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link text-capitalize {{ Route::is('incomes.*') ? 'active' : '' }}" href="{{ route('incomes.index') }}"  wire:navigate>{{ __('income') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize {{ Route::is('outcomes.*') ? 'active' : '' }}" href="{{ route('outcomes.index') }}"  wire:navigate>{{ __('outcome') }}</a>
                        </li>
                        @can('view clockwork')
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" href="/clockwork/app" target="_blank">{{ __('clockwork') }}</a>
                            </li>
                        @endcan
                        @can('view log')
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" href="/log-viewer" target="_blank">{{ __('log view') }}</a>
                            </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.profile') }}">
                                        {{ __('Edit Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            {{ $slot }}
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
