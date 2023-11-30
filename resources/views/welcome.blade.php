<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bienvenido</title>
    <!-- Vite -->
    @vite(['resources/js/app.js', 'resources/sass/app.scss','resources/css/app.css'])
</head>

<body>
    <!--Topbar -->
    <div>
        @include('layouts.TopBar')
    </div>
    <!-- End of Topbar -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo_gob.png') }}" alt="Logo" width="240"
                                        height="auto" class="my-5 mb-1">
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo_issste_nuevo.png') }}" alt="Logo"
                                        width="245" height="auto" class="mb-5 ">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 mb-3 fw-bold ">Bienvenido</h1>
                                        <h3 class="h5 mb-2 ">Sistema web de contratos
                                            <p class="h5 mb-2 text-body-secondary">Bienes y Servicios</p>
                                        </h3>
                                    </div>
                                    <form class="py-5">
                                        @auth
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <a href="{{ url('/home') }}" class="btn btn-outline-dark fw-bold BotonRojo"
                                                    role="button" aria-disabled="true">Inicio</a>
                                                <br>
                                            </div>
                                        @else
                                            <div class="d-grid gap-4 col-6 mx-auto">
                                                <a href="{{ route('login') }}" class="btn btn-outline-dark fw-bold BotonRojo"
                                                    role="button" aria-disabled="true">Iniciar
                                                    Sesion</a>
                                                <a href="{{ route('Registro') }}" class="btn btn-outline-dark fw-bold BotonRojo"
                                                    tabindex="-1" role="button" aria-disabled="true">Registrarse</a>
                                            </div>
                                        @endauth
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
