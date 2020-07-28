<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') · Tasq</title>
    <meta name="description" content="Travel Tractions Task Management App" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Font Imports-->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Open Graph data -->
    <meta property="og:title" content="@yield('title') · Task Manager" />
    <meta property="og:type" content="app" />
    <meta property="og:url" content="{{ asset('') }}" />
    <meta property="og:image" content="{{ asset('img/webicon.png') }}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D20YM11PN6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-D20YM11PN6');
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow-sm mb-3">
            <div class="container text-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/web-icon.png') }}" style="width: 2rem;" alt="Travel Tractions Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/home">{{ __('Tasqs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/projects">{{ __('Projects') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/team">{{ __('Team') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success" href="/submit" role="button">+ Create</a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="img-fluid img-thumbnail rounded-circle my-auto mr-2" style="width: 50px; height: auto;"> {{ Auth::user()->name }}<span class="caret text-dark"></span>
                            </a>



                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/user/{{ Auth::user()->id }}">
                                    {{ __('Profile') }}
                                </a>
                                @if (Auth::user()->level >= 5)
                                <a class="dropdown-item" href="/admin">
                                    {{ __('Admin') }}
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('archive') }}">{{ __('Archive') }}</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-1">
            @yield('content')
        </main>
    </div>

</body>

</html>
