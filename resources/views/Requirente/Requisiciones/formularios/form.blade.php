@csrf
<div class="row">
    {{-- Dependencia --}}
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        <input type="text" name="dependencia_id" value="{{ Auth::user()->Empleados->Dependencias->id_dependencia }}"
            class="form-control custom-input" hidden>
        <span type="text"
            class="form-control custom-span">{{ Auth::user()->Empleados->Dependencias->nombre_dependencia }}</span>
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <select name="area_id" class="form-control custom-select" required>
            <option value="">Seleccione el area</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id_area }}" {{ old('area_id') == $area->id_area ? 'selected' : '' }}>
                    {{ $area->nombre_area }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    {{-- Fecha de elaboracion --}}
    <div class="col">
        <label>Fecha de elaboración:</label>
        <input type="date" name="fecha_elaboracion" id="fecha_elaboracion" class="form-control custom-input"
            required>
    </div>
    {{-- Numero de requisicion --}}
    <div class="col">
        <label>No. requisicion: </label>
        <input type="text" name="no_requisicion" class="form-control custom-input" placeholder="100XXXX"
            value="{{ old('no_requisicion') }}" required>
    </div>
    {{-- Fecha requerida --}}
    <div class="col">
        <label>Fecha requerida: </label>
        <input type="date" class="form-control custom-input" name="fecha_requerida"
            value="{{ old('fecha_requerida') }}" required>
    </div>
</div>
<div class="row">
    {{-- Lugar de entrega --}}
    <div class="col">
        <label>Lugar de entrega: </label>
        <input type="text" name="lugar_entrega" class="form-control custom-input"
            placeholder="Escriba la direccion del lugar de entrega...." value="{{ old('lugar_entrega') }}" required>
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
                <th class="col-5">Descripción Especifica</th>
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
                    <select class="form-control custom-select select-partida" name="detalles[0][num_partida]" required>
                        <option value="">Selecciona</option>
                        @foreach ($partidas as $partida)
                            <option value="{{ $partida->id_partida }}">

                                {{ $partida->id_partida }} - {{ $partida->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <label>CUCoP:</label>
                    <input type="text" class="form-control custom-input span-cucop" name="detalles[0][cucop]"
                        readonly required>
                </td>
                <td>
                    <label>Descripcion:</label>
                    <select class="form-control custom-select select-insumo" name="detalles[0][descripcion]" required>
                        <option value="">Seleccione el insumo</option>
                    </select>
                </td>
                <td>
                    <label>Descripcion Especifica:</label>
                    <input type="number" name="detalles[0][cantidad]" min="1" placeholder="1" step="1"
                        class="form-control custom-input" value="{{ old('cantidad') }}" required>
                </td>
                <td>
                    <label>Cantidad:</label>
                    <input type="number" name="detalles[0][cantidad]" min="1" placeholder="1" step="1"
                        class="form-control custom-input" value="{{ old('cantidad') }}" required>
                </td>
                <td>
                    <label>Medida:</label>
                    <select class="form-control custom-select" name="detalles[0][medida_id]" required>
                        @foreach ($unidades as $unidad)
                            <option value="{{ $unidad->id_medida }}">
                                {{ $unidad->nombre_medida }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <label>Precio: </label>
                    <input type="number" name="detalles[0][precio]" min="0" placeholder="$ 1" step="1"
                        class="form-control custom-input" value="{{ old('precio') }}" required>
                </td>
                <td>
                    <label>Importe:</label>
                    <input type="number" class="form-control custom-input importe" name="detalles[0][importe]" readonly
                        required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger borrarFila"><i class="fas fa-trash "></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-grid gap-2 p-4 col-3 mx-auto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalAgregar">Añadir</button>
        <!-- Modal para agregar fila -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarLabel">Agregar Fila</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí van los campos para agregar una nueva fila -->
                        <!-- Ejemplo: -->
                        <label>Partida:</label>
                        <select class="form-control custom-select select-partida" id="modalPartida" required>
                            <option value="">Selecciona</option>
                            @foreach ($partidas as $partida)
                                <option value="{{ $partida->id_partida }}">
                                    {{ $partida->id_partida }} - {{ $partida->descripcion }}
                                </option>
                            @endforeach
                        </select>
                        <!-- Otros campos... -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="guardarFila">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="agregarFila" class="btn btn-primary BotonGris">Añadir Fila</button>
    </div>
</div>

<hr>

{{-- Sub Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Sub Total: </label>
    </div>
    <div class="col-4 mx-auto p-2  d-flex align-items-end flex-column">
        <span class="form-control subtotal custom-span" id="subtotal" name="subtotal">0</span>
    </div>
</div>

{{-- IVA --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>I.V.A: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span class="form-control iva custom-span" id="iva" name="iva">0</span>
    </div>
</div>

{{-- Gravamientos --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="otros_gravamientos" class="form-control input-otros-grav custom-input" id="otros_gravamientos"
            min="0" placeholder="0.00" step="0.01" type="text"
            value="{{ old('otros_gravamientos') }}" required>
    </div>
</div>
{{-- Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input name="total" id="total" placeholder="0.00" step="0.01" type="text"
            class="form-control total custom-input" required>
    </div>
</div>
<hr>
<div class="row">
    {{-- Anexos --}}
    <div class="col mx-auto p-2">
        <label>Anexos: </label>
        <input type="text" placeholder="Ingresa el nombre de los anexos que se identifique a la solicitud"
            class="form-control custom-input" name="anexos" value="{{ old('anexos') }}" required>
    </div>
</div>
<div class="row">
    {{-- Anticipos --}}
    <div class="col-2 mx-auto p-2">
        <label>Anticipo: </label>
        <select name="aticipos" class="form-control custom-select" id="aticipos" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
    {{-- Autorizacion de presupuesto --}}
    <div class="col mx-auto p-2">
        <label>Autorizacion de presupuesto: </label>
        <input type="text" placeholder="Ingresa el numero de oficio por el que se le autorizo el presupuesto"
            class="form-control custom-input" name="autorizacion_presupuesto"
            value="{{ old('autorizacion_presupuesto') }}" required>
    </div>
    {{-- Existencia en almacen --}}
    <div class="col-2 mx-auto p-2">
        <label>Existencia en almacen: </label>
        <select name="existencia_almacen" class="form-control custom-select" required>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
    </div>
</div>

<div class="row">
    {{-- Observaciones --}}
    <div class="col mx-auto p-2">
        <label>Observaciones: </label>
        <textarea class="form-control custom-input" name="observaciones" placeholder="Observaciones de la solicitud....."
            rows="3" required>{{ old('observaciones') }}</textarea>

    </div>
</div>
<div class="row">
    {{-- Registro Sanitario --}}
    <div class="col mx-auto p-2">
        <label>Registro Sanitario: </label>
        <select class="form-control custom-select" name="registro_sanitario" required>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
    </div>
    {{-- Normas --}}
    <div class="col-4 mx-auto p-2">
        <label>Normas/Nivel de inspeccion: </label>
        <input type="text" class="form-control custom-input" name="normas"
            placeholder="Ingrese las normas que sean necesarias"
            value="{{ isset($requisicion) ? $requisicion->normas : old('normas') }}" required>
    </div>
    {{-- Capacitacion --}}
    <div class="col mx-auto p-2">
        <label>Capacitacion: </label>
        <select name="capacitacion" class="form-control custom-select" required>
            <option value="{{ 1 }}">Si</option>
            <option value="{{ 0 }}">No</option>
        </select>
    </div>
    {{-- Pais --}}
    <div class="col mx-auto p-2">
        <label>Pais de Origen: </label>
        <select class="form-control custom-select" name="pais_id" required>
            @foreach ($paises as $pais)
                <option value="{{ $pais->id_pais }}">
                    {{ $pais['nombre_pais'] }}</option>
            @endforeach
        </select>
    </div>
    {{-- Metodos de prueba --}}
    <div class="col mx-auto p-2">
        <label>Metodos de prueba: </label>
        <select class="form-control custom-select" name="metodo_id" required>
            @foreach ($metodos as $metodo)
                <option value="{{ $metodo->id_metodo }}">
                    {{ $metodo['nombre_metodo'] }}</option>
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
                <select class="form-control custom-select" name="garantia1_id">
                    <option value=""></option>
                    @foreach ($garantias as $garantia)
                        <option value="{{ $garantia->id_garantia }}">
                            {{ $garantia->nombre_garantia }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <select name="porcentaje_1" class="form-control custom-select">
                    <option value=""></option>
                    <option value="{{ '100%' }}">100%</option>
                    <option value="{{ '75%' }}">75%</option>
                    <option value="{{ '50%' }}">50%</option>
                    <option value="{{ '25%' }}">25%</option>
                    <option value="{{ '10% ' }}">10%</option>
                    <option value="{{ '0% ' }}">0%</option>
                </select>
            </div>
        </div>
        <div class="row">
            {{-- Garantia --}}
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <select class="form-control custom-select" name="garantia_2_id">
                    <option value=""></option>
                    @foreach ($garantias as $garantia)
                        <option value="{{ $garantia->id_garantia }}">
                            {{ $garantia->nombre_garantia }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <select name="porcentaje_2" class="form-control custom-select">
                    <option value=""></option>
                    <option value="{{ '100%' }}">100%</option>
                    <option value="{{ '75%' }}">75%</option>
                    <option value="{{ '50%' }}">50%</option>
                    <option value="{{ '25%' }}">25%</option>
                    <option value="{{ '10% ' }}">10%</option>
                    <option value="{{ '0% ' }}">0%</option>
                </select>
            </div>
        </div>
        <div class="row">
            {{-- Garantia --}}
            <div class="col-4">
                <label>Tipo de garantia: </label>
                <select class="form-control custom-select" name="garantia_3_id">
                    <option value=""></option>
                    @foreach ($garantias as $garantia)
                        <option value="{{ $garantia->id_garantia }}">
                            {{ $garantia->nombre_garantia }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Porcentaje --}}
            <div class="col-3">
                <label>Porcentaje: </label>
                <select name="porcentaje_3" class="form-control custom-select">
                    <option value=""></option>
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
                    <select class="form-control custom-select" name="condicion_id" required>
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
                <select class="form-control custom-select" name="pluralidad" required>
                    <option name="pluralidad" value="{{ 1 }}">Si</option>
                    <option name="pluralidad" value="{{ 0 }}">No</option>
                </select>
            </div>
            <div class="col">
                <label>Meses: </label>
                <input type="text" class="form-control custom-input" name="meses" value="{{ old('meses') }}"
                    required>
            </div>
        </div>
        {{-- Garantia --}}
        <div class="row">
            <div class="col">
                <label>Penas convencionales: </label>
                <select name="penas_convencionales" class="form-control custom-select" id="penas_convencionales"
                    required>
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
                    value="{{ old('tiempo_fabricacion') }}" required>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    {{-- Solicita --}}
    <div class="col">
        <label>Solicita: </label>
        <input type="text" name="solicita" value="{{ Auth::user()->Empleados->num_empleado }}"
            class="form-control custom-input" hidden>
        <input type="text"
            value="{{ Auth::user()->Empleados->nombre }}{{ Auth::user()->Empleados->apellido_paterno }}{{ Auth::user()->Empleados->apellido_materno }}"
            class="form-control custom-span" readonly>
    </div>
    {{-- Autoriza --}}
    <div class="col">
        <label>Autoriza: </label>
        <input type="text" name="autoriza" class="form-control custom-input" required>
        <input type="text" name="estatus" class="form-control custom-input" value="1" hidden>
        <input type="text" name="tipo_id" value="4" hidden>
    </div>
</div>
<br>
<hr>
<div class="row">
    <div class="mb-3">
        <label> Subir archivos relacionados</label>
        <input type="file" class="form-control custom-input" aria-label="file example" name="archivos[]" multiple
            required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function calcularTotales() {
            var subtotal = 0;

            $("#tablaDetalles tbody tr").each(function(index) {
                var importe = parseFloat($(this).find(".importe").val()) || 0;
                subtotal += importe;
            });


            var otrosGravamientos = parseFloat($("#otros_gravamientos").val()) || 0;
            var iva = subtotal * 0.16;
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
                                item.descripcion + '</option>');
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
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener el elemento del campo de fecha
        var fechaElaboracion = document.getElementById('fecha_elaboracion');

        // Crear un nuevo objeto de fecha para obtener la fecha actual
        var fechaActual = new Date();

        // Formatear la fecha actual al formato requerido para el campo de fecha
        var dia = fechaActual.getDate();
        var mes = fechaActual.getMonth() + 1; // El mes se indexa desde 0
        var año = fechaActual.getFullYear();

        // Formatear la fecha en el formato 'YYYY-MM-DD' para establecerla como valor predeterminado
        var fechaFormateada = año + '-' + (mes < 10 ? '0' + mes : mes) + '-' + (dia < 10 ? '0' + dia : dia);

        // Establecer la fecha formateada como el valor del campo de fecha
        fechaElaboracion.value = fechaFormateada;
    });
</script>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
