<!DOCTYPE html>
<html>

<head>

    <title>Requisición</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0.5cm;
            right: 0cm;
            height: 2cm;
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>

</head>

<body>
    <header>
        <img src="{{ public_path() . $image }}" />
    </header>

    <main>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="2" class="border-top border-bottom border-black border-start">Nombre de la dependencia o entidad:</td>
                    <td colspan="5" class="border-top border-bottom border-black border-end">{{ $requisicion->Dependencias->nombre_dependencia }}</td>
                    <td colspan="3" class="border-top border-bottom border-black border-start">Área requirente:</td>
                    <td colspan="2" class="border-top border-bottom border-black border-end">{{ $requisicion->Areas->nombre_area }}</< /td>
                </tr>
                <tr>
                    <td colspan="1" class="border-top border-bottom border-black border-start">Fecha de elaboración:</td>
                    <td colspan="1" class="border-top border-bottom border-black border-end ">{{ $requisicion->fecha_requerida }}</td>
                    <td colspan="3" class="border-top border-bottom border-black border-start">No. de requisicion:</td>
                    <td colspan="3" class="border-top border-bottom border-black border-end ">{{ $requisicion->no_requisicion }}</< /td>
                    <td colspan="2" class="border-top border-bottom border-black border-start">Fecha requerida:</td>
                    <td colspan="2" class="border-top border-bottom border-black border-end ">{{ $requisicion->fecha_requerida }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="border-top border-bottom border-black border-start">Lugar de entrega:</td>
                    <td colspan="10" class="border-top border-bottom border-black border-end ">{{ $requisicion->lugar_entrega }}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-bordered border-black">
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
                        <td>{{ $detalle->num_partida }}</td>
                        <td>{{ $detalle->cucop }}</td>
                        <td>{{ $detalle->Insumos->descripcion }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->Medidas->nombre_medida }}</td>
                        <td>{{ '$' . $detalle->precio }}</td>
                        <td>{{ '$' . $detalle->importe }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="border border-0"></td>
                    <td colspan="1">Subtotal:</td>
                    <td colspan="2">0</td>
                </tr>
                <tr>
                    <td colspan="1" class="">Anexos:</td>
                    <td colspan="1" class="">{{$requisicion->anexos}} </td>
        
                    <td colspan="3" class="border border-0"></td>
                    <td colspan="1">I.V.A.:</td>
                    <td colspan="2">0</td>
                </tr>
                
            </tbody>
        </table>
        
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="border border-black border-end-0">Anticipo:</td>
                    <td colspan="1" class=" border border-black border-start-0">{{$requisicion->anticipo}} </td>
                    <td colspan="1" class=""></td>
                    <td colspan="1" class="border border-black border-end-0">Autorización del presupuesto:</td>
                    <td colspan="1" class=" border border-black border-start-0">{{$requisicion->autorizacion_presupuesto}} </td>
                    <td colspan="1" class=""></td>
                    <td colspan="1" class="border border-black border-end-0">Existencia en almacen: </td>
                    <td colspan="1" class=" border border-black border-start-0">{{$requisicion->existencia_almacen}} </td>
                    <td colspan="1" class=""></td>
                    <td colspan="2" class="border border-black border-end-0">Otros gravámenes:</td>
                    <td colspan="2" class=" border border-black border-start-0">{{ $requisicion->otros_gravamientos }}</td>
                </tr>
                
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="border border-black border-end-0">Observaciones:</td>
                    <td colspan="7" class=" border border-black border-start-0">{{$requisicion->observaciones}} </td>
                    <td colspan="1" class="border border-0 "></td>
                    <td colspan="1" class="border border-black">Total: </td>
                    <td colspan="2" class="border border-black ">{{ $requisicion->total }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">Registro sanitario:</td>
                    <td colspan="1" class="">{{$requisicion->registro_sanitario}} </td>
                    
                    <td colspan="1">Normas / niveles de inspección:</td>
                    <td colspan="2">{{ $requisicion->normas }}</td>
                    <td colspan="4" class="border border-0"></td>
                    <td colspan="1">Capacitación:</td>
                    <td colspan="2">{{ $requisicion->normas }}</td>
                    <td colspan="4" class="border border-0"></td>
                    <td colspan="1">Pais de origen: :</td>
                    <td colspan="2">{{ $requisicion->normas }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">Métodos de prueba:</td>
                    <td colspan="1" class="">{{$requisicion->Metodos->nombre_metodo}} </td>
                    <td colspan="10" class="border border-0"></td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">Tipo de garantía:</td>
                    <td colspan="1" class="">{{$requisicion->Garantias->nombre_garantia}} </td>
                    <td colspan="1" class="border border-0"></td>
                    <td colspan="1" class="">Porcentaje:</td>
                    <td colspan="1" class="">{{$requisicion->porcentaje}} </td>
                    <td colspan="4" class="border border-0"></td>
                    <td colspan="1" class="">Plurianualidad:</td>
                    <td colspan="1" class="">{{$requisicion->pluraridad}} </td>
                    <td colspan="1" class="">Meses:</td>
                    <td colspan="1" class="">{{$requisicion->meses}} </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">Tipo de garantía:</td>
                    <td colspan="1" class="">{{$requisicion->Garantias->nombre_garantia}} </td>
                    <td colspan="1" class="border border-0"></td>
                    <td colspan="1" class="">Porcentaje:</td>
                    <td colspan="1" class="">{{$requisicion->porcentaje}} </td>
                    <td colspan="4" class="border border-0"></td>
                    <td colspan="1" class="">Penas convencionales:</td>
                    <td colspan="1" class="">{{$requisicion->penas_convensionales}} </td>
                    <td colspan="1" class="">Porcentaje:</td>
                    <td colspan="1" class="">{{$requisicion->porcentaje}} </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">Tipo de garantía:</td>
                    <td colspan="1" class="">{{$requisicion->Garantias->nombre_garantia}} </td>
                    <td colspan="1" class="border border-0"></td>
                    <td colspan="1" class="">Porcentaje:</td>
                    <td colspan="1" class="">{{$requisicion->porcentaje}} </td>
                    <td colspan="4" class="border border-0"></td>
                    <td colspan="1" class="">Tiempo de fabricación::</td>
                    <td colspan="1" class="">{{$requisicion->tiempo_fabricacion}} </td>
                    
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">Condiciones de entrega:</td>
                    <td colspan="1" class="">{{$requisicion->condiciones_entrega}} </td>
                    <td colspan="1" class="border border-0"></td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="1" class="">solicita:</td>
                    <td colspan="1" class="">{{$requisicion->solicitada}} </td>
                    <td colspan="1" class="border border-0"></td>
                    <td colspan="1" class="">Autoriza:</td>
                    <td colspan="1" class="">{{$requisicion->autoriza}} </td>            
                </tr>
            </tbody>
        </table>
        
        
    </main>





</body>

</html>
