@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Vista del usuario de {{ $Users->Empleados->nombre }} </h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Usuarios.index') }}" class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('Administrador.Usuarios.formularios.vistaform')
            </form>
        </div>
        <hr>
    </div>
@endsection
