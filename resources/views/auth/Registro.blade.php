@extends('layouts.app')

@section('content')
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
                                    <img src="{{ asset('assets/img/logo_issste_nuevo.png') }}" alt="Logo" width="245"
                                        height="auto" class="mb-5 ">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 mb-3">Contacte al administrador</h1>
                                    </div>
                                    <div class="text-center">
                                        <p class="h5 mb-2">Actualmente solo se puede ingresar al sistema a con un
                                            usuario y contraseña asignados, por favor contacte al administrador</p>
                                    </div>
                                </div>
                                <form class="py-5">
                                    @auth
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <a href="{{ url('/home') }}" class="btn btn-outline-dark" role="button"
                                                aria-disabled="true">Inicio</a>
                                            <br>
                                        </div>
                                    @else
                                        <div class="d-grid gap-4 col-6 mx-auto">
                                            <a href="{{ route('login') }}" class="btn btn-outline-dark BotonRojo" role="button"
                                                aria-disabled="true">Iniciar
                                                Sesion</a>
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
@endsection
