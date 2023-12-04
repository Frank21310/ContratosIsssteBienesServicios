@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2 class="">Requisiciones Finalizadas</h2>
                </div>
            </div>
        </div>

        <hr>
        <div class="card-body">
            <h3>Tabla de Requisiciones </h3>
            <p>Tabla de todas las Requisiciones Finalizadas</p>
            <div class="col-4">
                <div class="form-group">
                    <a class="navbar-brand">Listar</a>
                    <select name="limit" id="limit" class="custom-select">
                        @foreach ([2, 3, 5, 10] as $limit)
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
            <div class="col-7">
                <div class="form-group">
                    <a class="navbar-brand">Buscar</a>
                    <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                        aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div class="table table-striped">
                <table class="table">
                    <thead class="custom-thead">
                        <tr>
                            <th class="custom-th">N° Requisicion</th>
                            <th class="custom-th">Dependencia</th>
                            <th class="custom-th">Fecha de elaboracion</th>
                            <th class="custom-th">Solicita</th>
                            <th class="custom-th">Autoriza</th>
                            <th class="custom-th">Estatus</th>
                            <th class="custom-th">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requisiciones as $requisicion)
                            <tr>
                                <td class="custom-td">{{ $requisicion->id_requisicion }}</td>
                                <td class="custom-td">{{ $requisicion->Dependencias->nombre_dependencia }}</td>
                                <td class="custom-td">{{ $requisicion->fecha_elaboracion }}</td>
                                <td class="custom-td">{{ $requisicion->solicita }}</td>
                                <td class="custom-td">{{ $requisicion->autoriza }}</td>
                                <td class="custom-td">{{ $requisicion->Estatus->nombre_estatus }}</td>
                                <td class="custom-td">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if ($requisiciones->total() > 10)
                {{ $requisiciones->links() }}
            @endif
        </div>
    </div>


    </div>

    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('RequisicionesFinalizadas.index') }}?limit=" + $(this).val() +
                '&search=' + $(
                    '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('RequisicionesFinalizadas.index') }}?limit=" + $('#limit').val() +
                    '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
