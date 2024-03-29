@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Proveedores</h2>
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    <a id="BtnAgregar" href="{{ route('Proveedores.create') }}" class="btn btn-primary ml-auto BotonRojo">
                        <i class="fas fa-plus"></i>
                        Agregar
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Lista de Proveedores existentes</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-2">
                            <a class="navbar-brand">Listar</a>
                        </div>
                        <div class="col-3">
                            <select name="limit" id="limit" class="form-control custom-select">
                                @foreach ([5, 10, 15, 20] as $limit)
                                    <option value="{{ $limit }}"
                                        @if (@isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>
                                        {{ $limit }}
                                    </option>
                                @endforeach
                            </select>
                            <?php
                            if (isset($_GET['page'])) {
                                $pag = $_GET['page'];
                            } else {
                                $pag = 1;
                            }
                            if (isset($_GET['limit'])) {
                                $limit = $_GET['limit'];
                            } else {
                                $limit = 10;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-2">
                            <a class="navbar-brand">Buscar</a>
                        </div>
                        <div class="col-10">
                            <input class="form-control custom-input" type="search" id="search" placeholder="Search"
                                aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="table table-striped">
                    <table class="table custom-table">
                        <thead class="custom-thead">
                            <tr>
                                <th class="custom-th">RFC</th>
                                <th class="custom-th">Nombre del Proveedor</th>
                                <th class="custom-th">Persona Proveedor</th>
                                <th class="col-2 custom-th">Domicilio</th>
                                <th class="custom-th">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                                <tr>
                                    <td class="custom-td">{{ $proveedor->rfc }}</td>
                                    <td class="custom-td">{{ $proveedor->nombre }}</td>
                                    <td class="custom-td">{{ $proveedor->Personas->nombre_persona }}</td>
                                    <td class="custom-td">
                                        {{ optional($proveedor->Domicilios)->calle }},
                                        {{ optional($proveedor->Domicilios)->municipio }},
                                        {{ optional($proveedor->Domicilios)->codigo_postal }},
                                        {{ optional($proveedor->Domicilios)->estado }},
                                        {{ optional($proveedor->Domicilios)->pais }}
                                    </td>
                                    
                                    <td class="custom-td">
                                        <div class="btn-group" role="group">
                        
                                            <a href="{{ route('Proveedores.edit', $proveedor->id_proveedor ) }}" class="btn btn-primary"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('Proveedores.destroy', $proveedor->id_proveedor ) }}"
                                                id="delete_{{ $proveedor->id_proveedor }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if ($proveedores->count() > 0)
                {{ $proveedores->links() }}
            @endif
        </div>
    </div>


    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('Proveedores.index') }}?limit=" + $(this).val() + '&search=' + $('#search')
                .val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('Proveedores.index') }}?limit=" + $('#limit').val() + '&search=' + $(
                    this).val()
            }
        })
    </Script>
@endsection
