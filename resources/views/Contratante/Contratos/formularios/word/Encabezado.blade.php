<html>

<head>
    <style>
        .top {
            font-family: Montserrat;
            text-align: justify;
            font-size: 9.8px;
        }
    </style>
</head>

<body>
<div>
<p class="top">
CONTRATO @if ($requisicion->tipo_id == 1)CERRADO @else ABIERTO @endif No. {{ $requisicion->no_requisicion }} PARA LA @if ($contrato->tipo_contrato_id === 1) ADQUISICIONES DE BIENES @else PRESTACION DEL SERVICIO
@endif DE {{ $contrato->descripcion_contrato }}. PROVEEDOR: {{ $contrato->Proveedor->nombre_proveedor }} VIGENCIA: {{ $contrato->vigencia_contrato }}.
</p>
</div>
</body>

</html>
