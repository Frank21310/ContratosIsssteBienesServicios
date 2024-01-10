<!DOCTYPE html>
<html>

<head>
    <title>Documento con estructura básica</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 1.5cm;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        div {
            border: .5px solid black;
            padding: -10px 5px -10px 5px;
            margin: 1px;
        }

        p {
            color: rgb(0, 0, 0);
            font-family: Montserrat;
            font-size: 10px;
            padding: none;

        }

        table {
            width: 100%;
            
        }

        .tabboder {
            border: .5px solid black;
            margin: none;

        }
        .top{
            margin: 0px;
            padding: none;

        }

        td {
            padding: none;

        }
    </style>
</head>

<body>
    <header>
        <div style="border: none; justify-content: center; ">
            <p style="size: 15px; text-align: center;">REQUISICIÓN DE BIENES Y SERVICIOS </p>
        </div>
        <img src="{{ $image }}" alt="Logo" width="250">
    </header>

    <main>
        <table>
            <tr>
                <td colspan="3">
                    <div style="padding: 0px;">
                        <p style="padding: 0px;">Nombre de la dependencia o entidad:
                            {{ $requisicion->Dependencias->nombre_dependencia }}</p>
                    </div>
                </td>
                <td>
                    <div>
                        <p>
                            Área requirente: {{ $requisicion->Areas->nombre_area }}
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <p>
                            Fecha de elaboración: {{ $requisicion->fecha_requerida }}
                        </p>
                    </div>
                </td>
                <td>
                    <div>
                        <p>No. de requisición: {{ $requisicion->no_requisicion }}</p>
                    </div>
                </td>
                <td colspan="1"></td>
                <td>
                    <div>
                        <p>Fecha requerida:{{ $requisicion->fecha_requerida }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div>
                        <p>Lugar de entrega: {{ $requisicion->lugar_entrega }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <thead>
                <tr class="top">
                    <th class="tabboder">
                        <p>No. de partida</p>
                    </th>
                    <th class="tabboder">
                        <p>CUCOP</p>
                    </th>
                    <th class="tabboder">
                        <p>Descripción</p>
                    </th>
                    <th class="tabboder">
                        <p>Cantidad solicitada</p>
                    </th>
                    <th class="tabboder">
                        <p>Unidad de medida</p>
                    </th>
                    <th class="tabboder">
                        <p>Precio unitario</p>
                    </th>
                    <th class="tabboder">
                        <p>Importe</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requisicion->detalles as $detalle)
                    <tr class="top">
                        <td class="tabboder">
                            <p>{{ $detalle->num_partida }}</p>
                        </td>
                        <td class="tabboder">
                            <p>{{ $detalle->cucop }}</p>
                        </td>
                        <td class="tabboder">
                            <p>{{ $detalle->Insumos->descripcion }}</p>
                        </td>
                        <td class="tabboder">
                            <p>{{ $detalle->cantidad }}</p>
                        </td>
                        <td class="tabboder">
                            <p>{{ $detalle->Medidas->nombre_medida }}</p>
                        </td>
                        <td class="tabboder">
                            <p>{{ '$' . $detalle->precio }}</p>
                        </td>
                        <td class="tabboder">
                            <p>{{ '$' . $detalle->importe }}</p>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td colspan="1" class="tabboder">
                        <p>Subtotal:</p>
                    </td>
                    <td colspan="2" class="tabboder">
                        <p>{{ '$' . $requisicion->subtotal }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <p>Anexos: {{ $requisicion->anexos }}</p>
                        </div>
                    </td>
                    <td colspan="2"></td>
                    <td colspan="1" class="tabboder">
                        <p>I.V.A.:</p>
                    </td>
                    <td colspan="2" class="tabboder">
                        <p>{{ '$' . $requisicion->iva }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            <p>Anticipo: {{ $requisicion->anticipo }}</p>
                        </div>
                    </td>
                    <td colspan="1">
                        <div>
                            <p>Autorización del presupuesto: {{ $requisicion->autorizacion_presupuesto }}</p>
                        </div>
                    </td>
                    <td colspan="1">
                        <div>
                            <p>Existencia en almacen: @if ($requisicion->existencia_almacen == 1)
                                    Si
                                @else
                                    No
                                @endif
                            </p>
                        </div>
                    </td>
                    <td colspan="1" class="tabboder">
                        <p>Otros gravámenes: </p>
                    </td>
                    <td colspan="2" class="tabboder">
                        <p>{{ '$' . $requisicion->otros_gravamientos }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div>
                            <p>Observaciones: {{ $requisicion->observaciones }}</p>
                        </div>
                    </td>
                    <td colspan="1" class="tabboder">
                        <p>Total: </p>
                    </td>
                    <td colspan="2" class="tabboder">
                        <p>{{ '$' . $requisicion->total }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tr>
                <td colspan="1">
                    <div>
                        <p>Registro sanitario: {{ $requisicion->registro_sanitario }}</p>
                    </div>
                </td>
                <td colspan="2">
                    <div>
                        <p>Normas / niveles de inspección: {{ $requisicion->normas }}</p>
                    </div>
                </td>

                <td colspan="1">
                    <div>
                        <p>Capacitación: {{ $requisicion->normas }}</p>
                    </div>
                </td>
                <td colspan="1">
                </td>
                <td colspan="1">
                    <div>
                        <p>País de origen: {{ $requisicion->normas }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div>
                        <p>Metodos de prueba {{ $requisicion->Metodos->nombre_metodo }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <p>Tipo de garantía: {{ $requisicion->Garantias->nombre_garantia }}</p>
                    </div>
                </td>
                <td colspan="1">
                    <div>
                        <p>Porcentaje: {{ $requisicion->porcentaje_1 }}</p>
                    </div>
                </td>
                <td colspan="1">
                </td>
                <td colspan="1">
                    <div>
                        <p>Plurianualidad:
                            @if ($requisicion->pluralidad == 1)
                                Si
                            @else
                                No
                            @endif
                        </p>
                    </div>
                </td>
                <td colspan="1">
                    <div>
                        <p>Meses: </p>
                        <p>{{ $requisicion->meses }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <p>Tipo de garantía: @if ($requisicion->garantia_2_id == null)
                            @else
                                {{ $requisicion->Garantia2->nombre_garantia }}
                            @endif
                        </p>
                    </div>
                </td>
                <td colspan="1">
                    <div>
                        <p>Porcentaje: {{ $requisicion->porcentaje_2 }}</p>
                    </div>
                </td>
                <td colspan="1">
                </td>
                <td colspan="2">
                    <div>
                        <p>Penas convencionales: {{ $requisicion->Metodos->nombre_metodo }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <p>Tipo de garantía: @if ($requisicion->garantia_3_id == null)
                            @else
                                {{ $requisicion->Garantia3->nombre_garantia }}
                            @endif
                        </p>
                    </div>
                </td>
                <td colspan="1">
                    <div>
                        <p>Porcentaje: {{ $requisicion->porcentaje_3 }}</p>
                    </div>
                </td>
                <td colspan="1">
                </td>
                <td colspan="3">
                    <div>
                        <p>Tiempo de fabricación: {{ $requisicion->Metodos->nombre_metodo }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <div>
                        <p>Condiciones de entrega: {{ $requisicion->condiciones_entrega }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        <p>Solicita: {{ $requisicion->Soli->nombre }} {{ $requisicion->Soli->apellido_paterno }}
                            {{ $requisicion->Soli->apellido_materno }}</p>
                    </div>
                </td>
                <td colspan="3">
                    <div>
                        <p>Autoriza: {{ $requisicion->autoriza }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
