<h1>Factura #{{ $factura->id }}</h1>

<h2>Factura a nombre de: {{ $factura->cita->vehiculo->user->name }}</h2>

<h3>
Vehículo:
{{  $factura->cita->vehiculo->marca }} --
{{ $factura->cita->vehiculo->placa }}
</h3>

<table border="1">

    <thead>
        <tr>
            <th>Repuesto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>

        @foreach ( $factura->detalles as $detalle )
        
        <tr>
            <td>{{ $detalle->repuesto->nombre }}</td>
            <td>{{ $detalle->cantidad }}</td>
            <td>${{ number_format($detalle->repuesto->precio) }}</td>
            <td>${{ number_format($detalle->cantidad * $detalle->repuesto->precio) }}</td>
        </tr>
        @endforeach

    </tbody>

</table>




<h3>Total: ${{ number_format($factura->total, 2) }}</h3>



<a href="{{ route('facturas.pdf', $factura) }}">PDF</a>

