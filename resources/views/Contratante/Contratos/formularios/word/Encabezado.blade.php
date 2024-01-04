<html>

<head>
    <style>
        .top {
            font-family: Montserrat;
            text-align: center;
            font-size: 9.8px;
            text-align: end
        }
    </style>
</head>

<body>
    <div>
        <p class="top">
            CONTRATO
            @if ($requisicion->tipo_id == 1)
                CERRADO
            @else
                ABIERTO
            @endif No. {{ $requisicion->no_requisicion }} PARA LA
            PRESTACION DEL SERVICIO DE {{ $contrato->descripcion_contrato }}.
            PROVEEDOR:
            {{ $persona->nombre_proveedor }} VIGENCIA: {{ $contrato->vigencia_contrato }}.
        </p>
    </div>
</body>

</html>
