@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Editar rol de {{$User->empleado_num}} </h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Usuarios.index') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('Usuarios.update', $User->empleado_num) }}" method="POST" enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('Usuarios.formularios.editform')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary ml-auto" form="create">
                <i class="fas fa-plus"></i>
                Editar
            </button>

        </div>
    </div>
@endsection