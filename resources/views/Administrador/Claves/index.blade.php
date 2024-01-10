@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    {{-- <h2 class="">Crear Nueva Requisición</h2> --}}
                </div>
                <div class="col g-col-6 d-flex justify-content-end ">
                    {{-- <a href="{{ route('Requisiciones.create') }}" class="btn btn-primary ml-auto BotonRojo">
                    <i class="fas fa-plus"></i>
                    Crear
                </a> --}}
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h3>Insumos</h3>
                </div>
                <div class="col g-col-6 d-flex justify-content-end">
                    <a id="BtnAgregar" href="#" class="btn btn-primary ml-auto BotonRojo" data-toggle="modal"
                        data-target="#Clavesnuevas">
                        <i class="fas fa-plus"></i>
                        Actualizar CUCOP
                    </a>
                </div>

                <div id="Clavesnuevas" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title ">Subir archivo CSV</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('Claves.procesarArchivo') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <form action="{{ route('Claves.procesarArchivo') }}" method="POST"
                                            enctype="multipart/form-data" id="uploadForm">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <input type="file" name="archivo_csv" class="form-control mt-2"
                                                        id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
                                                        aria-label="Upload">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary BotonRojo mt-2"
                                                        id="submitButton" >Subir archivo CSV</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
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
                                <th class="custom-th">Clave</th>
                                <th class="custom-th">Partida</th>
                                <th class="custom-th">Descripcion</th>
                                <th class="custom-th">CABM</th>
                                <th class="custom-th">Tipos de contratacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($CUCops as $CUCop)
                                <tr>
                                    <td class="custom-td">{{ $CUCop->id_cucop }}</td>
                                    <td class="custom-td">{{ $CUCop->partida_id }}</td>
                                    <td class="custom-td">{{ $CUCop->descripcion }}</td>
                                    <td class="custom-td">{{ $CUCop->CABM }}</td>
                                    <td class="custom-td">{{ $CUCop->tipo_contratacion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="card-footer">
            @if ($CUCops->total() > 10)
                {{ $CUCops->links() }}
            @endif
        </div>
    </div>

    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('Claves.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('Claves.index') }}?limit=" + $('#limit').val() +
                    '&search=' +
                    $(this).val()
            }
        })
        
    </Script>
@endsection
