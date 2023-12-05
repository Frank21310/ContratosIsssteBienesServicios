<!DOCTYPE html>
<html>

<head>

    <title>Requisición</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
    <div style="display: flex;">
        <div
            style="border: 2px solid #000; margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:60%;">
            <label>Nombre de la dependencia o entidad: </label>
            <span>{{ $requisicion->Dependencias->nombre_dependencia }}</span>
        </div>
        <div
            style="border: 2px solid #000; margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:40%;">
            <label>Área requirente: </label>
            <span>{{ $requisicion->Areas->nombre_area }}</span>
        </div>
    </div>
    <br>
    <div style="display: flex;">
        <div
            style="border: 2px solid #000; margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:40%;">
            <label>Fecha de elaboración: </label>
            <span>{{ $requisicion->fecha_requerida }}</span>
        </div>
        <div
            style="border: 2px solid #000; margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:20%;">
            <label>No. de requisición: </label>
            <span>{{ $requisicion->no_requisicion }}</span>
        </div>
        <div style=" margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:10%;">

        </div>
        <div
            style="border: 2px solid #000; margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:30%;">
            <label>Fecha requerida: </label>
            <span>{{ $requisicion->fecha_requerida }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div
            style="border: 2px solid #000; margin-bottom: 5px; padding-left: 4px; padding-right: 4px; margin-left: 5px; width:100%;">
            <label>Lugar de entrega: </label>
            <span>{{ $requisicion->lugar_entrega }}</span>
        </div>
    </div>

    <br>

    <table>
        <thead>
            <tr>
                <th class="col-1">No. de partida</th>
                <th class="col-1">CUCOP</th>
                <th class="col-5">Descripción</th>
                <th class="col-1">Cantidad solicitada</th>
                <th class="col-1">Unidad de medida</th>
                <th class="col-1">Precio unitario</th>
                <th class="col-2">Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requisicion->detalles as $detalle)
                <tr>
                    <td style="border: 1px solid #000; padding-left: 4px;">{{ $detalle->num_partida }}</td>
                    <td>{{ $detalle->cucop }}</td>
                    <td>{{ $detalle->Insumos->descripcion }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->Medidas->nombre_medida }}</td>
                    <td>{{ '$' . $detalle->precio }}</td>
                    <td>{{ '$' . $detalle->importe }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5"></td>
                <td colspan="1">Subtotal:</td>
                <td colspan="2">0</td>
            </tr>
            <tr>
                <td colspan="1" class="">Anexos:</td>
                <td colspan="1" class="">{{ $requisicion->anexos }} </td>

                <td colspan="3"></td>
                <td colspan="1">I.V.A.:</td>
                <td colspan="2">0</td>
            </tr>
        </tbody>
    </table>

    <br>


    <div style="display: flex;">
        <div class="col c21" style="border: 1px solid #000; padding: 5px;">
            <label>Anticipo: </label>
            <span>{{ $requisicion->anticipo }}</span>
        </div>
        <div class="col c22" style="border: 1px solid #000; padding: 5px;">
            <label>Autorización del presupuesto: </label>
            <span>{{ $requisicion->autorizacion_presupuesto }}</span>
        </div>
        <div class="col c23" style="border: 1px solid #000; padding: 5px;">
            <label>Existencia en almacen: </label>
            <span>{{ $requisicion->autorizacion_presupuesto }}</span>
        </div>
        <div class="col c24" style="border: 1px solid #000; padding: 5px;">
            <label>Otros gravámenes: </label>
            <span>{{ $requisicion->autorizacion_presupuesto }}</span>
        </div>
    </div>
    <div class=" f2">
        <div class="col c25" style="border: 1px solid #000; padding: 5px;">
            <label>Observaciones: </label>
            <span>{{ $requisicion->observaciones }}</span>
        </div>
        <div class="col c26" style="border: 1px solid #000; padding: 5px;">
            <label>Total: </label>
            <span>{{ $requisicion->total }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div class="col c27" style="border: 1px solid #000; padding-left: 4px;">
            <label>Registro sanitario: </label>
            <span>{{ $requisicion->registro_sanitario }}</span>
        </div>
        <div class="col c28" style="border: 1px solid #000; padding-left: 4px;">
            <label>Normas / niveles de inspección:</label>
            <span>{{ $requisicion->normas }}</span>
        </div>
        <div class="col c29" style="border: 1px solid #000; padding-left: 4px;">
            <label>Capacitación:</label>
            <span>{{ $requisicion->normas }}</span>
        </div>
        <div class="col c30" style="border: 1px solid #000; padding-left: 4px;">
            <label>País de origen:</label>
            <span>{{ $requisicion->normas }}</span>
        </div>
    </div>

    <div style="display: flex;">
        <div class="col c21" style="border: 1px solid #000; padding: 5px;">
            <label>Anticipo: </label>
            <span>{{ $requisicion->anticipo }}</span>
        </div>
        <div class="col c22" style="border: 1px solid #000; padding: 5px;">
            <label>Autorización del presupuesto: </label>
            <span>{{ $requisicion->autorizacion_presupuesto }}</span>
        </div>
        <div class="col c23" style="border: 1px solid #000; padding: 5px;">
            <label>Existencia en almacen: </label>
            <span>{{ $requisicion->autorizacion_presupuesto }}</span>
        </div>
        <div class="col c24" style="border: 1px solid #000; padding: 5px;">
            <label>Otros gravámenes: </label>
            <span>{{ $requisicion->autorizacion_presupuesto }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div class="col c25" style="border: 1px solid #000; padding: 5px;">
            <label>Observaciones: </label>
            <span>{{ $requisicion->observaciones }}</span>
        </div>
        <div class="col c26" style="border: 1px solid #000; padding: 5px;">
            <label>Total: </label>
            <span>{{ $requisicion->total }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div class="col c32" style="border: 1px solid #000; padding-left: 4px;">
            <label>Tipo de garantía: </label>
            <span>{{ $requisicion->Garantias->nombre_garantia }}</span>
        </div>
        <div class="col c33" style="border: 1px solid #000; padding-left: 4px;">
            <label>Porcentaje: </label>
            <span>{{ $requisicion->porcentaje }}</span>
        </div>
        <div class="col c34" style="border: 1px solid #000; padding-left: 4px;">
            <label>Plurianualidad: </label>
            <span>{{ $requisicion->Metodos->nombre_metodo }}</span>
        </div>
        <div class="col c35" style="border: 1px solid #000; padding-left: 4px;">
            <label>Meses: </label>
            <span>{{ $requisicion->Metodos->nombre_metodo }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div class="col c36" style="border: 1px solid #000; padding-left: 4px;">
            <label>Tipo de garantía: </label>
            <span>{{ $requisicion->Garantias->nombre_garantia }}</span>
        </div>
        <div class="col c37" style="border: 1px solid #000; padding-left: 4px;">
            <label>Porcentaje: </label>
            <span>{{ $requisicion->porcentaje }}</span>
        </div>
        <div class="col c38" style="border: 1px solid #000; padding-left: 4px;">
            <label>Penas convencionales: </label>
            <span>{{ $requisicion->Metodos->nombre_metodo }}</span>
        </div>
        <div class="col c39" style="border: 1px solid #000; padding-left: 4px;">
            <label>Porcentaje: </label>
            <span>{{ $requisicion->Metodos->nombre_metodo }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div class="col c40" style="border: 1px solid #000; padding-left: 4px;">
            <label>Tipo de garantía: </label>
            <span>{{ $requisicion->Garantias->nombre_garantia }}</span>
        </div>
        <div class="col c41" style="border: 1px solid #000; padding-left: 4px;">
            <label>Porcentaje: </label>
            <span>{{ $requisicion->porcentaje }}</span>
        </div>
        <div class="col c42" style="border: 1px solid #000; padding-left: 4px;">
            <label>Tiempo de fabricación: </label>
            <span>{{ $requisicion->Metodos->nombre_metodo }}</span>
        </div>
    </div>
    <div style="display: flex;">
        <div class="col c43" style="border: 1px solid #000; padding-left: 4px;">
            <label>Condiciones de entrega: </label>
            <span>{{ $requisicion->condiciones_entrega }}</span>
        </div>
    </div>

    <div style="display: flex;">
        <div class="col c43" style="border: 1px solid #000; padding-left: 4px;">
            <label>Solicita: </label>
            <span>{{ $requisicion->solicitada }}</span>
        </div>
        <div class="col c43" style="border: 1px solid #000; padding-left: 4px;">
            <label>Autoriza: </label>
            <span>{{ $requisicion->autoriza }}</span>
        </div>
    </div>
</body>

</html>
