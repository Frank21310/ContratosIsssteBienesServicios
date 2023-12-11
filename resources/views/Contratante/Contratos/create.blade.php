@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Contrato A D </h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="" class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" id="create">
                @include('Contratante.Contratos.formularios.form')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary ml-auto BotonGris" form="create">
                <i class="fas fa-plus"></i>
                Crear
            </button>

        </div>
    </div>
@endsection
