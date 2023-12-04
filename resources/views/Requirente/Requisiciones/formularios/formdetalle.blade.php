@csrf

<div class="row">
    {{-- Dependencia --}}
    <div class="col">
        <label>Nombre de la dependencia o entidad:</label>
        <span type="text" name="dependencia_id"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Dependencias->nombre_dependencia : old('dependencia_id') }}</span>
    </div>
    {{-- Area Requeriente  --}}
    <div class="col">
        <label>Area requirente:</label>
        <span type="text" name="area_id"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Areas->nombre_area : old('area_id') }}</span>
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
        <span type="text" name="no_requisicion"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->no_requisicion : old('no_requisicion') }}</span>
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

<table class="table custom-table">
    <thead class="custom-thead">
        <tr>
            <th class="custom-th">Partida</th>
            <th class="custom-th">CUCoP</th>
            <th class="custom-th">Descripcion</th>
            <th class="custom-th">Cantidad</th>
            <th class="custom-th">Unidad Medida</th>
            <th class="custom-th">Precio</th>
            <th class="custom-th">Importe</th>
        </tr>
    </thead>
    <tbody class="custom-thead">
        @foreach ($requisicion->detalles as $detalle)
            <tr>
                <td class="custom-td">{{ $detalle->num_partida }}</td>
                <td class="custom-td">{{ $detalle->cucop }}</td>
                <td class="custom-td">{{ $detalle->Insumos->descripcion_insumo }}</td>
                <td class="custom-td">{{ $detalle->cantidad }}</td>
                <td class="custom-td">{{ $detalle->Medidas->nombre_medida }}</td>
                <td class="custom-td">{{ $detalle->precio }}</td>
                <td class="custom-td importes">{{ $detalle->importe }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


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
    <div class="col mx-auto p-2  d-flex align-items-end flex-column gravamientos">
        <label>Otros Gravamientos: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <span name="otros_gravamientos" id="gravamientos" min="0" placeholder="0.00" step="0.01"
            type="text" class="form-control custom-span"
            >{{ isset($requisicion) ? $requisicion->otros_gravamientos : old('otros_gravamientos') }}</span>
    </div>
</div>
{{-- Total --}}
<div class="row">
    <div class="col mx-auto p-2  d-flex align-items-end flex-column">
        <label>Total: </label>
    </div>
    <div class="col-4  mx-auto p-2  d-flex align-items-end flex-column">
        <input value="{{ isset($requisicion) ? $requisicion->total : old('total') }}" name="total" id="total"
            placeholder="0.00" step="0.01" type="text" class="form-control custom-span" readonly>
    </div>
</div>

<hr>
<div class="row">
    {{-- Anexos --}}
    <div class="col mx-auto p-2">
        <label>Anexos: </label>
        <span type="text" name="anexos"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->anexos: old('anexos') }}</span>
    </div>
</div>
<div class="row">
    {{-- Anticipos --}}
    <div class="col mx-auto p-2">
        <label>Anticipo: </label>
        <span type="text" name="aticipos"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->aticipos ? 'Si' : 'No'  : old('aticipos') }}</span>
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
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->existencia_almacen? 'Si' : 'No'   : old('existencia_almacen') }}</span>
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
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->capacitacion? 'Si' : 'No'   : old('capacitacion') }}</span>

    </div>
    {{-- Pais --}}
    <div class="col mx-auto p-2">
        <label>Pais de Origen: </label>
        <span type="text" name="pais_id"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Paises->nombre_pais : old('pais_id') }}</span>
    </div>
    {{-- Metodos de prueba --}}
    <div class="col mx-auto p-2">
        <label>Metodos de prueba: </label>
        <span type="text" name="metodos_id"
            class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Metodos->nombre_metodos  : old('metodos_id') }}</span>

    </div>
</div>

<hr>
<div class="row">
    <div class="col-6">
        <div class="row">
            {{-- Garantia --}}
            <div class="col-5">
                <label>Tipo de garantia: </label>
                <span type="text" name="garantia1_id"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Garantias->nombre_garantia : old('garantia1_id') }}</span>
            </div>
            {{-- Porcentaje --}}
            <div class="col-2">
                <label>Porcentaje: </label>
                <span type="text" name="porcentaje_1"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->porcentaje_1 : old('porcentaje_1') }}</span>

            </div>
        </div>
        <div class="row">
            {{-- Garantia --}}
            <div class="col-5">
                <label>Tipo de garantia: </label>
                <span type="text" name="garantia_2_id"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Garantias->nombre_garantia : old('garantia_2_id') }}</span>
            </div>
            {{-- Porcentaje --}}
            <div class="col-2">
                <label>Porcentaje: </label>
                <span type="text" name="porcentaje_2"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->porcentaje_2 : old('porcentaje_2') }}</span>

            </div>
        </div>
        <div class="row">
            {{-- Garantia --}}
            <div class="col-5">
                <label>Tipo de garantia: </label>
                <span type="text" name="garantia_3_id"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Garantias->nombre_garantia : old('garantia_3_id') }}</span>
            </div>
            {{-- Porcentaje --}}
            <div class="col-2">
                <label>Porcentaje: </label>
                <span type="text" name="porcentaje_3"
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->porcentaje_3 : old('porcentaje_3') }}</span>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                {{-- Condiciones --}}
                <div class="col-5">
                    <label>Condiciones de entrega: </label>
                    <span type="text" name="condicion_id"
                        class="form-control custom-span">{{ isset($requisicion) ? $requisicion->Condiciones->nombre_condicion : old('condicion_id') }}</span>
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
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->pluralidad? 'Si' : 'No'   : old('pluralidad') }}</span>
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
                    class="form-control custom-span">{{ isset($requisicion) ? $requisicion->penas_convencionales? 'Si' : 'No'   : old('penas_convencionales') }}</span>
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
    // Obtener todos los elementos con la clase 'custom-td'
    const importes = document.querySelectorAll('.importes');
    const gravamientos = document.getElementById('gravamientos');

    // Calcular el subtotal sumando todos los importes
    let subtotal = 0;
    let gravamiento = parseFloat(gravamientos.textContent.replace('$', '')); // Obtener el valor de gravamientos
    importes.forEach((element) => {
      // Eliminar el signo '$' y convertir el texto a un número
      const importe = parseFloat(element.textContent.replace('$', ''));
      subtotal += importe;
    });

    // Calcular el IVA (suponiendo un 16%)
    const iva = subtotal * 0.16;

    // Calcular el total sumando el subtotal, el IVA y los gravamientos
    const total = subtotal + iva + gravamiento;

    // Mostrar los resultados en los spans correspondientes
    document.getElementById('subtotal').textContent = `$ ${subtotal.toFixed(2)}`;
    document.getElementById('iva').textContent = `$ ${iva.toFixed(2)}`;
    document.getElementById('total').textContent = `$ ${total.toFixed(2)}`;
</script>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=date]");
    </script>
@endpush
