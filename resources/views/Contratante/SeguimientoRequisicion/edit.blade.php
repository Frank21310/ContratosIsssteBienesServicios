@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Editar requisicion</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('SeguimientoRequisicion.index') }}"
                        class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-arrow-left"></i>
                        Volver
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <form action="{{ route('SeguimientoRequisicion.update', $requisicion->id_requisicion) }}" method="POST"
                enctype="multipart/form-data" id="create">
                @method('PUT')
                @include('Contratante.SeguimientoRequisicion.formularios.editableform')
            </form>
        </div>
        <hr>
        <div class="card-footer">
            <div class="d-grid gap-2 col-5 mx-auto">
                <button class="btn btn-primary ml-auto BotonRojo" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="create">
                    <i class="fas fa-plus"></i>
                    Siguiente
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Seleccione el tipo de contratacion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-grid gap-2 ">                      
                        <button class="btn btn-secondary BotonGris" data-bs-toggle="popover" title="Popover title"
                            data-bs-content="Popover body content is set in this attribute.">Adjudicación directa</button>
                        <hr>
                        <button class="btn btn-secondary BotonGris" data-bs-toggle="popover" title="Popover title"
                            data-bs-content="Popover body content is set in this attribute.">Invitación a cuando menos tres personas</button>
                        <hr>
                        <button class="btn btn-secondary BotonGris" data-bs-toggle="popover" title="Popover title"
                            data-bs-content="Popover body content is set in this attribute.">licitación pública</button>
                        </div>
                    </div>
                    <div class="modal-footer d-grid gap-2 d-md-flex justify-content-center">
                        <button type="button" class="btn btn-secondary BotonGris" data-bs-dismiss="modal">Regresar</button>
                        <button type="button" class="btn btn-primary BotonRojo" id="create">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
