@csrf

<div class="row">
    {{-- Dependencia --}}
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        <span type="text" name="dependencia_id_dependencia"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->dependenciarequesicion->nombre : old('nombre') }}</span>
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <span type="text" name="area_id_area"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->arearequesicion->nombre_area : old('area_id_area') }}</span>
    </div>
</div>

<div class="row">
    {{-- Fecha de elaboracion --}}
    <div class="col">
        <label>Fecha de elaboracion:</label>
        <span type="text" name="fecha_elaboracion"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->fecha_elaboracion : old('fecha_elaboracion') }}</span>
    </div>
    {{-- Numero de requisicion --}}
    <div class="col">
        <label>No. requisicion: </label>
        <input type="text" name="no_requesicion" class="form-control custom-input"
            value="{{ isset($requisicion) ? $requisicion->no_requesicion : old('no_requesicion') }}">
    </div>
    {{-- Fecha requerida --}}
    <div class="col">
        <label>Fecha requerida: </label>
        <span type="text" name="fecha_requerida"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->fecha_requerida : old('fecha_requerida') }}</span>

    </div>
</div>
<div class="row">
    <div class="col">
        <label>Lugar de entrega: </label>
        <span type="text" name="lugar_entrega"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->lugar_entrega : old('lugar_entrega') }}</span>
    </div>
</div>

<hr>

<div>
    <table id="tablaDetalles">
        <thead>
            <tr>
                <th class="col-1">Partida</th>
                <th class="col-1">CUCoP</th>
                <th class="col-5">Descripción</th>
                <th class="col-1">Cantidad</th>
                <th class="col-1">Medida</th>
                <th class="col-2">Precio</th>
                <th class="col-2">Importe</th>
                <th class="col-1">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requisicion->detalles as $detalle)
                <tr id="filaEjemplo">
                    <form action="{{ route('SeguimientoRequisicion.update', $detalle->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td>
                            <label>Partida:</label>
                            <select class="form-control select-partida custom-select" name="detalles[0][num_partida]" readonly>
                                <option value="">Selecciona</option>
                                @foreach ($partidas as $partida)
                                    <option value="{{ $partida->id_partida_especifica }}" class="form-control"
                                        @if ($detalle->num_partida == $partida->id_partida_especifica) selected @endif>
                                        {{ $partida->id_partida_especifica }} - {{ $partida->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <label>CUCoP:</label>
                            <input type="text" class="form-control span-cucop custom-input" name="detalles[0][cucop]"
                                value="{{ $detalle->cucop }}" readonly>
                        </td>

                        <td>
                            <label>Descripcion:</label>
                            <input type="text" class="form-control custom-input" name="descripcion"
                                value="{{ $detalle->insumo->descripcion_insumo }}">
                        </td>

                        <td>
                            <label>Cantidad:</label>
                            <input type="number" name="detalles[0][cantidad]" min="0" placeholder="1.0"
                                step="0.01" class="form-control custom-input" value="{{ $detalle->cantidad }}">

                        </td>

                        <td>
                            <label>Medida:</label>
                            <select class="form-control custom-select" name="detalles[0][unidad_medida]">
                                @foreach ($unidades as $unidad)
                                    <option value="{{ $unidad->idunidad_medida }}" class="form-control"
                                        @if ($detalle->num_partida == $unidad->idunidad_medida) selected @endif>
                                        {{ $unidad->descripcion_unidad }}
                                    </option>
                                @endforeach

                            </select>
                        </td>

                        <td>
                            <label>Precio: </label>
                            <input type="number" name="detalles[0][precio]" min="0" placeholder="1.0"
                                step="0.01" class="form-control custom-input" value="{{ $detalle->precio }}">
                        </td>

                        <td>
                            <label>Importe:</label>
                            <input type="number" class="form-control importe custom-input" name="detalles[0][importe]"
                                value="{{ $detalle->importe }}" readonly>
                        </td>

                        <td>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save	"></i></i></button>
                            <button type="button" class="btn btn-danger borrarFila"><i class="fas fa-trash "></i></button>
                            {{--<button type="submit" class="btn btn-danger " form="detele_{{ $detalle->id }}"
                                onclick="return confirm('¿Estas seguro de eliminar el registro?')">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form action="{{ route('SeguimientoRequisicion.destroy', $detalle->id) }}"
                                id="delete_{{ $detalle->id }}" method="post" enctype="multipart/form-data" hidden>
                                @csrf
                                @method('DELETE')
                            </form>--}}
                        </td>
                    </form>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="d-grid gap-2 p-4 col-3 mx-auto">
        <button type="button" id="agregarFila" class="btn btn-primary BotonGris">Añadir</button>
    </div>
</div>



{{-- Sub Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Sub Total: </label>
    </div>
    <div class="col-4 mx-auto p-2  d-flex align-items-end flex-column">
        <span id="subtotal" class="form-control custom-span"
            value="{{ isset($requisicion) ? $requisicion->subtotal : old('subtotal') }}">0</span>
    </div>
</div>

{{-- IVA --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>I.V.A: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span id="iva" class="form-control custom-span"
            value="{{ isset($requisicion) ? $requisicion->iva : old('iva') }}">0</span>
    </div>
</div>

{{-- Gravamientos --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="otros_gravamientos" id="gravamientos" min="0" placeholder="0.00" step="0.01"
            type="text" class="form-control custom-input"
            value="{{ isset($requisicion) ? $requisicion->otros_gravamientos : old('otros_gravamientos') }}" readonly>
    </div>
</div>
{{-- Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input value="{{ isset($requisicion) ? $requisicion->total : old('total') }}" name="total" id="total"
            placeholder="0.00" step="0.01" type="text" class="form-control custom-input" readonly>
    </div>
</div>

<hr>
<div class="row">
    {{-- Anexos --}}
    <div class="col mx-auto p-2">
        <label>Anexos: </label>
        <span type="text" name="anexos"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->anexos : old('anexos') }}</span>
    </div>
</div>
<div class="row">
    {{-- Anticipos --}}
    <div class="col mx-auto p-2">
        <label>Anticipo: </label>
        <span type="text" name="aticipos"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->aticipos : old('aticipos') }}</span>
    </div>
    {{-- Autorizacion de presupuesto --}}
    <div class="col mx-auto p-2">
        <label>Autorizacion de presupuesto: </label>
        <span type="text" name="autorizacion_presupuesto"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->autorizacion_presupuesto : old('autorizacion_presupuesto') }}</span>
    </div>
    {{-- Existencia en almacen --}}
    <div class="col mx-auto p-2">
        <label>Existencia en almacen: </label>
        <span type="text" name="existencia_almacen"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->existencia_almacen : old('existencia_almacen') }}</span>
    </div>
</div>

<div class="row">
    {{-- Observaciones --}}
    <div class="col mx-auto p-2">
        <label>Observaciones: </label>
        <span type="text" name="observaciones"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->observaciones : old('observaciones') }}</span>
    </div>
</div>
<div class="row">
    {{-- Registro Sanitario --}}
    <div class="col mx-auto p-2">
        <label>Registro Sanitario: </label>
        <span type="text" name="registro_sanitario"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->registro_sanitario : old('registro_sanitario') }}</span>
    </div>
    {{-- Normas --}}
    <div class="col-4 mx-auto p-2">
        <label>Normas/Nivel de inspeccion: </label>
        <span type="text" name="normas"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->normas : old('normas') }}</span>
    </div>
    {{-- Capacitacion --}}
    <div class="col mx-auto p-2">
        <label>Capacitacion: </label>
        <span type="text" name="capacitacion"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->capacitacion : old('capacitacion') }}</span>

    </div>
    {{-- Pais --}}
    <div class="col mx-auto p-2">
        <label>Pais de Origen: </label>
        <span type="text" name="pais_id_pais"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->pais_id_pais : old('pais_id_pais') }}</span>
    </div>
    {{-- Metodos de prueba --}}
    <div class="col mx-auto p-2">
        <label>Metodos de prueba: </label>
        <span type="text" name="metodos_id_metodos"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->metodos_id_metodos : old('metodos_id_metodos') }}</span>

    </div>
</div>

<hr>
<div class="row">
    <div class="col-6">
        <div class="row">
            {{-- Garantia --}}
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <span type="text" name="garantia_id_garantia"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->garantia_id_garantia : old('garantia_id_garantia') }}</span>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <span type="text" name="porcentaje"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->porcentaje : old('porcentaje') }}</span>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                {{-- Condiciones --}}
                <div class="col-5">
                    <label>Condiciones de entrega: </label>
                    <span type="text" name="condicion_id_condicion"
                        class="form-control custom-span">{{ isset($requisicion) ? $requisicion->condicion_id_condicion : old('condicion_id_condicion') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        {{-- Plurianualidad --}}
        <div class="row">
            <div class="col">
                <label>Plurianualidad: </label>
                <span type="text" name="pluralidad"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->pluralidad : old('pluralidad') }}</span>
            </div>
            <div class="col">
                <label>Meses: </label>
                <span type="text" name="meses"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->meses : old('meses') }}</span>

            </div>
        </div>
        {{-- Garantia --}}
        <div class="row">
            <div class="col">
                <label>Penas convencionales: </label>
                <span type="text" name="penas_convencionales"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->penas_convencionales : old('penas_convencionales') }}</span>
            </div>
        </div>
        {{-- Fabricacion --}}
        <div class="row">
            <div class="col">
                <label>Tiempo de fabricacion: </label>
                <span type="text" name="tiempo_fabricacion"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->tiempo_fabricacion : old('tiempo_fabricacion') }}</span>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    {{-- Solicita --}}
    <div class="col">
        <label>Solicita: </label>
        <span type="text" name="solicita"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->solicita : old('solicita') }}</span>
    </div>
    {{-- Autoriza --}}
    <div class="col">
        <label>Autoriza: </label>
        <span type="text" name="autoriza"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->autoriza : old('autoriza') }}</span>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function calcularTotales() {
            var subtotal = 0;

            // Iterar sobre cada fila
            $("#tablaDetalles tbody tr").each(function(index) {
                var importe = parseFloat($(this).find(".importe").val()) || 0;
                subtotal += importe;
            });

            var iva = subtotal * 0.16;
            var otrosGravamientos = parseFloat($("#otros_gravamientos").val()) || 0;
            var total = subtotal + iva + otrosGravamientos;

            $("#subtotal").text(subtotal.toFixed(2));
            $("#iva").text(iva.toFixed(2));
            $("#total").val(total.toFixed(2));
        }

        $("#agregarFila").click(function() {
            var fila = $("#filaEjemplo").clone();
            var rowCount = $("#tablaDetalles tbody tr").length; // Obtener cantidad de filas
            fila.find("input, select").val(""); // Limpiar valores

            // Asignar un nuevo nombre a los campos de la nueva fila
            fila.find("input, select").each(function() {
                var newName = $(this).attr("name").replace(/\[\d+\]/, "[" + rowCount + "]");
                $(this).attr("name", newName);
            });

            fila.appendTo("#tablaDetalles tbody");
            calcularTotales();
        });

        // Borrar fila
        $("#tablaDetalles").on("click", ".borrarFila", function() {
            $(this).closest("tr").remove();
            calcularTotales();
        });


        // Calcular importe al cambiar cantidad o precio
        $("tbody").on("change",
            "input[name^='detalles'][name$='[cantidad]'], input[name^='detalles'][name$='[precio]']",
            function() {
                var cantidad = $(this).closest("tr").find("input[name$='[cantidad]']").val() || 0;
                var precio = $(this).closest("tr").find("input[name$='[precio]']").val() || 0;
                var importe = cantidad * precio;
                $(this).closest("tr").find(".importe").val(importe.toFixed(2));
                calcularTotales(); // Actualizar totales al cambiar un importe
            });


        // Filtrar descripciones al cambiar la partida
        $("tbody").on("change", "select[name^='detalles'][name$='[num_partida]']", function() {
            var row = $(this).closest("tr");
            var idPartida = $(this).val();

            if (idPartida) {
                $.ajax({
                    url: "{{ route('fclaveCucop') }}",
                    method: 'get',
                    data: {
                        nPartida: idPartida
                    },
                    success: function(data) {
                        var select = row.find(
                            '.select-insumo'
                        ); // Utilizar 'row' para limitar al elemento de la fila actual

                        select.empty();
                        select.append(
                            '<option id="datacucop" value="">Selecciona un insumo</option>'
                        );

                        $.each(data, function(index, item) {
                            select.append('<option value="' + item
                                .descripcion_insumo + '">' +
                                item.descripcion_insumo + '</option>');
                        });
                    }
                });
            } else {
                row.find('.select-insumo').empty();
                row.find('.select-insumo').append('<option value="">Sin valores</option>');
            }
        });

        // Mostrar el ID en el campo CUCoP
        $("tbody").on("change", ".select-insumo", function() {
            var selectedOption = $(this).val();
            var row = $(this).closest("tr");
            row.find('.span-cucop').val(selectedOption);
        });

        // Calcular totales al cambiar otros gravamientos
        $("#otros_gravamientos").on("change", function() {
            calcularTotales();
        });
    });
</script>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
