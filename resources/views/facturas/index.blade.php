<h1>Mis Facturas</h1>


<table border="1">

    <thead>
        <tr>
            <th>ID</th>
            <th>Dueño</th>
            <th>Vehiculo</th>
            <th>Motivo</th>
            <th>Fecha</th>
            <th>Ver</th>
        </tr>
    </thead>

    <tbody>

        @forelse($facturas as $factura)

            <tr>

                <td>
                    {{ $factura->id }}
                </td>

                <td>
                    {{ $factura->cita->vehiculo->user->name}}
                </td>

                <td>
                    {{ $factura->cita->vehiculo->placa }}
                </td>

                <td>
                    {{ $factura->cita->motivo }}
                </td>

                <td>
                    {{ $factura->created_at }}
                </td>

                <td>
                    <a href="{{ route('facturas.get_factura_by_id', $factura) }}">
                        Ver factura
                    </a>
                </td>

        @empty
            <p>No tienes facturas</p>
        @endforelse

    </tbody>

</table>