@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Contrato de {{ isset($requisicion) ? $requisicion->Tipos->nombre_tipo : old('no_requisicion') }} de la requisición No.{{ isset($requisicion) ? $requisicion->no_requisicion : old('no_requisicion') }} </h2>
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
            <form action="{{ route('Contratos.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('Contratante.Contratos.formularios.forminfo  ')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary ml-auto BotonGris" form="create">
                    <i class="fas fa-plus"></i>
                    Crear contrato
                </button>
              </div>
        </div>
    </div>
@endsection
