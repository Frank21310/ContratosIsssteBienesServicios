<html>
    <head></head>
    <body>
        <p>
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
    </body>
</html>
