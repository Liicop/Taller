<h1>Mis Citas</h1>

<a href="{{ route('citas.create') }}">
    Agendar Nueva Cita
</a>

<table border="1">

    <thead>
        <tr>
            <th>Vehículo</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Motivo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @forelse($citas as $cita)

            <tr>

                <td>
                    {{ $cita->vehiculo->placa }}
                </td>

                <td>
                    {{ $cita->fecha }}
                </td>

                <td>
                    {{ $cita->hora }}
                </td>

                <td>
                    {{ $cita->motivo }}
                </td>

                <td>

                    @if($cita->agendada)

                        Agendada

                    @else

                        Terminada

                    @endif

                </td>
                <td>
                    <a href="{{ route('citas.edit', $cita) }}">
                        Editar
                    </a>

                    <form
                        method="POST"
                        action="{{ route('citas.destroy', $cita) }}">

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5">
                    No tienes citas registradas.
                </td>

                

        @endforelse

    </tbody>

</table>