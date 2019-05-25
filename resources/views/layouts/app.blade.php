<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Gabriel Coronado">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Restaurante</title>
  
    <link rel="shortcut icon" href="https://img.icons8.com/color/48/000000/hamburger.png" type="image/png"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Restaurante
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <a href="/home" class="nav-link text-dark">Inicio</a>

                            <li class="nav-item dropdown d-inline">
                                <a id="navbarDropdown" class="text-dark nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ingredientes <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a href="/ingredientes/create" class="dropdown-item text-dark">Nuevo Ingrediente</a>
                                  <a href="/ingredientes" class="dropdown-item text-dark">Ver Ingredientes</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown d-inline">
                                <a id="navbarDropdown" class="text-dark nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Platos <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a href="/platos/create" class="dropdown-item text-dark">Nuevo Plato</a>
                                  <a href="/platos" class="dropdown-item text-dark">Ver Platos</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown d-inline">
                                <a id="navbarDropdown" class="text-dark nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Órdenes <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a href="/ordenes/create" class="dropdown-item text-dark">Nueva Orden</a>
                                  <button type="button" class="dropdown-item text-dark" data-toggle="modal" data-target="#cerrarOrden" data-whatever="@mdo">Cerrar Orden</button>
                                  <a href="/ordenes "class="dropdown-item text-dark">Ver Órdenes</a>
                                </div>
                            </li>
                      
                            <li class="nav-item dropdown d-inline">
                              <a id="navbarDropdown" class="text-dark nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                              </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts/messages')
        <main class="py-4">
            <div class="modal fade" id="cerrarOrden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Orden</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ route('ordenes.close') }}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="cantidad" class="col-form-label">Número de mesa</label>
                        <input type="number" name="nummesa" class="form-control" id="numMesa" required>
                      </div>
                      <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
