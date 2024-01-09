@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Contrato de
                        {{ isset($requisicion) ? $requisicion->Tipos->nombre_tipo : old('no_requisicion') }} de la
                        requisición No.{{ isset($requisicion) ? $requisicion->no_requisicion : old('no_requisicion') }}
                    </h2>
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
            <form action="{{ route('Contratos.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('Contratante.Contratos.formularios.forminfo  ')
            </form>
            <br>
            <div class="row">
                <div class="d-grid gap-2 col-3 mx-auto">
                    <label>Añadir un nuevo proveedor</label>
                    <button class="btn btn-primary ml-auto BotonRojo" form="create" data-bs-toggle="modal"
                    data-bs-target="#nuevoProveedorModal">
                    <i class="fas fa-plus"></i>
                    Nuevo Proveedor
                    </button>
                </div>
                <div class="modal fade" id="nuevoProveedorModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Proveedor</h5>
                            </div>
                            <div class="modal-body ">
                                <form action="{{ route('Contratos.proveedor') }}" method="POST" id="proveedor">
                                    @csrf
                                    <div class="row d-grid gap-2 mx-auto">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tipo de persona</label>
                                                    <select name="persona_id" id="tipo_proveedor"
                                                        class="form-select custom-select tipo_proveedor" required>
                                                        <option value="">Selecciona el tipo..</option>
                                                        @foreach ($tipopersona as $tipoperson)
                                                            <option value="{{ $tipoperson->id_persona }}">
                                                                {{ $tipoperson->nombre_persona }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">RFC del proveedor</label>
                                                    <input type="text" name="rfc" id="rfc"
                                                        class="form-control custom-input" placeholder="RFC" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nombre del proveedor</label>
                                                        <input type="text" name="nombre"
                                                            class="form-control custom-input"
                                                            placeholder="Nombre de la persona moral" required>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="">Nacionalidad</label>
                                                    <select name="nacionalidad" id="nacionalidad_proveedor"
                                                        class="form-select custom-select" required>
                                                        <option value="">Selecciona el tipo..</option>
                                                        <option value="Mexicana">Mexicana</option>
                                                        <option value="Extragnera">Extragnera</option>
                                                        <option value="Otra">Otra</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <label for="">Domicilio</label>
                                                    <input type="text" name="calle" id="domicilio proveedor"
                                                        class="form-control custom-input" placeholder="Calle" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" name="municipio" id="domicilio proveedor"
                                                        class="form-control custom-input" placeholder="Municipio" required>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="number" name="codigo_postal" id="domicilio proveedor"
                                                        class="form-control custom-input" placeholder="Codigo postal" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" name="estado" id="domicilio proveedor"
                                                        class="form-control custom-input" placeholder="Estado" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" name="pais" id="domicilio proveedor"
                                                        class="form-control custom-input" placeholder="Pais" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-3">
                                                <h6>Si es persona Fisica</h6>
                                            </div>
                                        </div>
                                        <div class="row" id="campos_persona_fisica">
                                            <!-- Campos para Persona Fisica -->
                                            <div class="col">
                                                <label>Documento de acreditacion:</label>
                                                <input type="text" name="documento_expedicion"
                                                    id="documento_acreditacion_proveedor"
                                                    class="form-control custom-input"
                                                    placeholder="Documento de acreditacion">
                                            </div>
                                            <div class="col">
                                                <label>Expedida por:</label>
                                                <input type="text" name="institucion_expedida"
                                                    id="acreditacion_proveedor" class="form-control custom-input"
                                                    placeholder="Institucion que acredita">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-3">
                                                <h6>Si es persona Moral</h6>
                                            </div>
                                        </div>
                                        <div class="row" id="campos_persona_moral">
                                            <!-- Campos para Persona Moral -->
                                            <div class="col">
                                                <label for="">Instrumento publico que da origen</label>
                                                <input type="text" name="instrumento_publico"
                                                    id="instrumento_proveedor_moral" class="form-control custom-input"
                                                    placeholder="Instrumento publico que da origen">
                                            </div>
                                            <div class="col">
                                                <label for="">Registro publico</label>
                                                <input type="text" name="registro_publico"
                                                    id="nombre_registro_publico" class="form-control custom-input"
                                                    placeholder="Registro publico">
                                            </div>
                                            <div class="col">
                                                <label for="">Folio de registro publico</label>
                                                <input type="text" name="folio_registro" id="folio_registro_publico"
                                                    class="form-control custom-input" placeholder="Folio">
                                            </div>
                                            <div class="col">
                                                <label for="">Fecha de registro publico</label>
                                                <input type="text" name="fecha_registro" id="fecha_registro_publico"
                                                    class="form-control custom-input" placeholder="Fecha">
                                            </div>
                                        </div>
                                        <!--Si es persona moral-->
                                        <div class="row" id="datos_proveedor_moral">
                                            <div class="col">
                                                <label>Nombre del representante</label>
                                                <input type="text" name="representante"
                                                    id="nombre_proveedor_representante" class="form-control custom-input"
                                                    placeholder="Nombre de la persona representante">
                                            </div>
                                            <div class="col">
                                                <label for="">Caracter del representante del proveedor</label>
                                                <select name="caracter_id" id="tipo_proveedor"
                                                    class="form-select custom-select">
                                                    <option value="">Selecciona el tipo..</option>
                                                    @foreach ($tipocaracters as $tipocaracter)
                                                        <option value="{{ $tipocaracter->id_caracter }}">
                                                            {{ $tipocaracter->nombre_caracter }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--Si es persona moral datos del representante-->
                                        <div class="row" id="representante_moral">
                                            <div class="col">
                                                <label for="">Instrumento publico que da orgien al repesentante
                                                </label>
                                                <input type="text" name="instrumento_notarial_representante"
                                                    id="instrumento_proveedor" class="form-control custom-input"
                                                    placeholder="Instrumento publico que da orgien">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary ml-auto BotonRojo" form="proveedor">
                                    <i class="fas fa-plus"></i>
                                    Guardar Proveedor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
