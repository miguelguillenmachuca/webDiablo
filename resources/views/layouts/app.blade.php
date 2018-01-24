<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Less -->
    <link href="{{ asset('css/estilos.less') }}" rel="stylesheet/less" type="text/css">
    <script src="{{ asset('css/less.min.js') }}" type="text/javascript"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> --}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        {{-- &nbsp; --}}
                          <li class="{{ isActiveUrl('/') }}"><a href="{{ route('/') }}"><span class="glyphicon glyphicon-home"></span></a></li>
                          <li class="{{ isActiveUrl('crearGuia') }}"><a href="{{ route('crearGuia') }}">Crear guía</a></li>
                          <li class="{{ isActiveUrl('verGuias') }}"><a href="{{ route('verGuias') }}">Guías</a></li>
                          <li class="{{ isActiveUrl('tutorial') }}"><a href="tutorial.php">¿Cómo usar la página?</a></li>
                        </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="{{ isActiveUrl('login') }}"><a href="{{ route('login') }}">Login</a></li>
                            <li class="{{ isActiveUrl('register') }}"><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="">Panel de cuenta</a></li>
                                    <li><a href="">Mis guías</a></li>
                                    <li><a href="">Mis guías favoritas</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer footer-inverse">
          <div class="container-fluid">
            <div class="row">
              <span id="derechos" class="col-xs-12 col-md-8">&copy; Miguel Guillén Machuca 2016</span>
              <span id="contacto" class="col-xs-12 col-md-4 text-right">miguelguillensmr@gmail.com</span>
            </div>
          </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
