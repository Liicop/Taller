<h1>Mis Vehículos</h1>

<a href="{{ route('vehiculos.create') }}">
    Nuevo Vehículo
</a>

<table border="1">

    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Acciones</th>
    </tr>

    @foreach($vehiculos as $vehiculo)

        <tr>

            <td>{{ $vehiculo->placa }}</td>

            <td>{{ $vehiculo->marca }}</td>

            <td>{{ $vehiculo->modelo }}</td>

            <td>

                <a href="{{ route('vehiculos.edit', $vehiculo) }}">
                    Editar
                </a>
                <form method="POST" action="{{ route('vehiculos.destroy', $vehiculo) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>

            </td>

        </tr>

    @endforeach

</table>