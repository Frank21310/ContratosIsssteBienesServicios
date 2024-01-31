<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Contratos ISSSTE') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/app.jss') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/sass/app.scss') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

</head>

<body>
    <div id="app" class="wrapper">
        <div id="content">
            @include('layouts.topbar')

            <main class="principal">
                <body>
                    <div class="d-flex align-items-center justify-content-center vh-100">
                        <div class="text-center">
                            <h1 class="display-1 fw-bold">¡Error!</h1>
                            <p class="fs-3"> <span class="text-danger">Opps!</span> Esta pagina no funciona.</p>
                            <p class="lead">
                                La pagina a la que deseas acceder no funciona
                              </p>
                            <a href="/" class="btn btn-primary BotonRojo">Inicio</a>
                        </div>
                    </div>
                </body>
            </main>
        </div>
    </div>

</body>

</html>
