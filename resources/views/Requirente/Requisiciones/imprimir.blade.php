<!DOCTYPE html>
<html>
<head>
    <title>Requisición</title>
    <!-- Agrega aquí los estilos CSS para la impresión -->
</head>
<body>
    <h1>Detalles de la Requisición</h1>
    
    <!-- Muestra los detalles de la requisición -->
    <p>ID: {{ $requisicion->id }}</p>
    <p>Fecha: {{ $requisicion->fecha }}</p>
    <!-- ... Otros detalles de la requisición -->

    <h2>Detalles</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <!-- ... Otros encabezados -->
            </tr>
        </thead>
        <tbody>
            @foreach($requisicion->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <!-- ... Otros campos del detalle -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
