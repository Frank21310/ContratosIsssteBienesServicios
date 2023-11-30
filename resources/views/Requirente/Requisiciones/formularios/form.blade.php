@csrf

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    {{-- Dependencia --}}
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        <input type="text" name="dependencia_id_dependencia"
            value="{{ Auth::user()->empleado->dependencia->id_dependencia }}" class="form-control custom-input" hidden>
        <span type="text" class="form-control custom-span">{{ Auth::user()->empleado->dependencia->nombre }}</span>
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <select name="area_id_area" class="form-control custom-select">
            <option value="">Seleccione el area</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id_area }}">
                    {{ $area['nombre_area'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    {{-- Fecha de elaboracion --}}
    <div class="col">
        <label>Fecha de elaboracion:</label>
        <input type="date" name="fecha_elaboracion" class="form-control custom-input">
    </div>
    {{-- Numero de requisicion --}}
    <div class="col">
        <label>No. requisicion: </label>
        <input type="text" name="no_requesicion" class="form-control custom-input" placeholder="100XXXX"
            value="{{ old('no_requesicion') }}">
    </div>
    {{-- Fecha requerida --}}
    <div class="col">
        <label>Fecha requerida: </label>
        <input type="date" class="form-control custom-input" name="fecha_requerida"
            value="{{ old('fecha_requerida') }}">
    </div>
</div>
<div class="row">
    {{-- Lugar de entrega --}}
    <div class="col">
        <label>Lugar de entrega: </label>
        <input type="text" name="lugar_entrega" class="form-control custom-input"
            placeholder="Escriba la direccion del lugar de entrega...." value="{{ old('lugar_entrega') }}">
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
            <tr id="filaEjemplo">
                <td>
                    <label>Partida:</label>
                    <select class="form-control custom-select select-partida" name="detalles[0][num_partida]">
                        <option value="">Selecciona</option>
                        @foreach ($partidas as $partida)
                            <option value="{{ $partida->id_partida_especifica }}">
                                {{ $partida->id_partida_especifica }} - {{ $partida->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <label>CUCoP:</label>
                    <input type="text" class="form-control custom-input span-cucop" name="detalles[0][cucop]"
                        readonly>
                </td>
                <td>
                    <label>Descripcion:</label>
                    <select class="form-control custom-select select-insumo" name="detalles[0][descripcion]">
                        <option value="">Seleccione el insumo</option>
                    </select>
                </td>
                <td>
                    <label>Cantidad:</label>
                    <input type="number" name="detalles[0][cantidad]" min="0" placeholder="1.0" step="0.01"
                        class="form-control custom-input" value="{{ old('cantidad') }}">
                </td>
                <td>
                    <label>Medida:</label>
                    <select class="form-control custom-select" name="detalles[0][unidad_medida]">
                        @foreach ($unidades as $unidad)
                            <option value="{{ $unidad->idunidad_medida }}">
                                {{ $unidad->descripcion_unidad }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <label>Precio: </label>
                    <input type="number" name="detalles[0][precio]" min="0" placeholder="1.0" step="0.01"
                        class="form-control custom-input" value="{{ old('precio') }}">
                </td>
                <td>
                    <label>Importe:</label>
                    <input type="number" class="form-control custom-input importe" name="detalles[0][importe]"
                        readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger borrarFila"><i class="fas fa-trash "></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-grid gap-2 p-4 col-3 mx-auto">
        <button type="button" id="agregarFila" class="btn btn-primary">Añadir Fila</button>
    </div>
</div>

<hr>

{{-- Sub Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Sub Total: </label>
    </div>
    <div class="col-4 mx-auto p-2  d-flex align-items-end flex-column">
        <span class="form-control subtotal custom-span" id="subtotal">0</span>
    </div>
</div>

{{-- IVA --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>I.V.A: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span class="form-control iva custom-span" id="iva">0</span>
    </div>
</div>

{{-- Gravamientos --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="otros_gravamientos" class="form-control input-otros-grav custom-input" id="otros_gravamientos" min="0"
            placeholder="0.00" step="0.01" type="text" value="{{ old('otros_gravamientos') }}">
    </div>
</div>
{{-- Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="total" id="total" placeholder="0.00" step="0.01" type="text"
            class="form-control total custom-input">
    </div>
</div>


<hr>
<div class="row">
    {{-- Anexos --}}
    <div class="col mx-auto p-2">
        <label>Anexos: </label>
        <input type="text" placeholder="Ingresa el nombre de los anexos que se identifique a la solicitud"
            class="form-control custom-input" name="anexos" value="{{ old('anexos') }}">
    </div>
</div>
<div class="row">
    {{-- Anticipos --}}
    <div class="col-2 mx-auto p-2">
        <label>Anticipo: </label>
        <select name="anticipos" class="form-control custom-select" id="anticipos">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    {{-- Autorizacion de presupuesto --}}
    <div class="col mx-auto p-2">
        <label>Autorizacion de presupuesto: </label>
        <input type="text" placeholder="Ingresa el numero de oficio por el que se le autorizo el presupuesto"
            class="form-control custom-input" name="autorizacion_presupuesto"
            value="{{ old('autorizacion_presupuesto') }}">
    </div>
    {{-- Existencia en almacen --}}
    <div class="col-2 mx-auto p-2">
        <label>Existencia en almacen: </label>
        <select name="existencia_almacen" class="form-control custom-select">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="row">
    {{-- Observaciones --}}
    <div class="col mx-auto p-2">
        <label>Observaciones: </label>
        <textarea class="form-control custom-input" name="observaciones"
            placeholder="Observaciones de la solicitud....." value="{{ old('observaciones') }}"
            rows="3"></textarea>
    </div>
</div>
<div class="row">
    {{-- Registro Sanitario --}}
    <div class="col mx-auto p-2">
        <label>Registro Sanitario: </label>
        <select class="form-control custom-select" name="registro_sanitario">
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
    </div>
    {{-- Normas --}}
    <div class="col-4 mx-auto p-2">
        <label>Normas/Nivel de inspeccion: </label>
        <input type="text" class="form-control custom-input" name="normas"
            placeholder="Ingrese las normas que sean necesarias"
            value="{{ isset($requisicion) ? $requisicion->normas : old('normas') }}">
    </div>
    {{-- Capacitacion --}}
    <div class="col mx-auto p-2">
        <label>Capacitacion: </label>
        <select name="capacitacion" class="form-control custom-select">
            <option value="{{ 1 }}">Si</option>
            <option value="{{ 0 }}">No</option>
        </select>
    </div>
    {{-- Pais --}}
    <div class="col mx-auto p-2">
        <label>Pais de Origen: </label>
        <select class="form-control custom-select" name="pais_id_pais">
            @foreach ($paises as $pais)
                <option value="{{ $pais->id_pais }}">
                    {{ $pais['nombre_pais'] }}</option>
            @endforeach
        </select>
    </div>
    {{-- Metodos de prueba --}}
    <div class="col mx-auto p-2">
        <label>Metodos de prueba: </label>
        <select class="form-control custom-select" name="metodos_id_metodos">
            @foreach ($metodos as $metodo)
                <option value="{{ $metodo->id_metodos }}">
                    {{ $metodo['nombre_metodos'] }}</option>
            @endforeach
        </select>
    </div>
</div>


<hr>
<div class="row">
    <div class="col-6">

        <div class="row">
            {{-- Garantia --}}
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <select class="form-control custom-select" name="garantia_id_garantia">
                    @foreach ($garantias as $garantia)
                        <option value="{{ $garantia->id_garantia }}">
                            {{ $garantia->nombre_garantia }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <select name="porcentaje" class="form-control custom-select">
                    <option value="{{ '100%' }}">100%</option>
                    <option value="{{ '75%' }}">75%</option>
                    <option value="{{ '50%' }}">50%</option>
                    <option value="{{ '25%' }}">25%</option>
                    <option value="{{ '10% ' }}">10%</option>
                    <option value="{{ '0% ' }}">0%</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                {{-- Condiciones --}}
                <div class="col-5">
                    <label>Condiciones de entrega: </label>
                    <select class="form-control custom-select" name="condicion_id_condicion">
                        @foreach ($condiciones as $condicion)
                            <option value="{{ $condicion->id_condicion }}">
                                {{ $condicion->nombre_condicion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        {{-- Plurianualidad --}}
        <div class="row">
            <div class="col">
                <label>Plurianualidad: </label>
                <select class="form-control custom-select" name="pluralidad">
                    <option name="pluralidad" value="{{ 1 }}">Si</option>
                    <option name="pluralidad" value="{{ 0 }}">No</option>
                </select>
            </div>
            <div class="col">
                <label>Meses: </label>
                <input type="text" class="form-control custom-input" name="meses" value="{{ old('meses') }}">
            </div>
        </div>
        {{-- Garantia --}}
        <div class="row">
            <div class="col">
                <label>Penas convencionales: </label>
                <select name="penas_convencionales" class="form-control custom-select" id="penas_convencionales">
                    <option value="{{ 1 }}">Si</option>
                    <option value="{{ 0 }}">No</option>
                </select>
            </div>
        </div>
        {{-- Fabricacion --}}
        <div class="row">
            <div class="col">
                <label>Tiempo de fabricacion: </label>
                <input type="text" class="form-control custom-input" name="tiempo_fabricacion"
                    value="{{ old('tiempo_fabricacion') }}">
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    {{-- Solicita --}}
    <div class="col">
        <label>Solicita: </label>
        <input type="text" name="solicita" value="{{ Auth::user()->empleado->num_empleado }}"
            class="form-control custom-input" hidden>
        <input type="text"
            value="{{ Auth::user()->empleado->nombre }}{{ Auth::user()->empleado->apellido_paterno }}{{ Auth::user()->empleado->apellido_materno }}"
            class="form-control custom-span" readonly>
    </div>
    {{-- Autoriza --}}
    <div class="col">
        <label>Autoriza: </label>
        <input type="text" name="autoriza" class="form-control custom-input">
        <input type="text" name="estado" class="form-control custom-input" value="1" hidden>
    </div>
</div>
<br>
<hr>
<div class="row">
    <div class="mb-3">
        <label> Subir archivos relacionados</label>
        <input type="file" class="form-control custom-input" aria-label="file example" name="archivos[]" required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
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
                            select.append('<option value="' + item.id_cucop + '">' +
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
