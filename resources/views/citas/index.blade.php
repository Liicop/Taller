<h1>Mis Citas</h1>

@if(!Auth::user()->super_user)
    <a href="{{ route('citas.create') }}">
        Agendar Nueva Cita
    </a>
@endif


<table border="1">

    <thead>
        <tr>
            <th>Vehículo</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Motivo</th>
            <th>Estado</th>
            @if(!Auth::user()->super_user)
                <th>Acciones</th>
            @else
                <th>Facturar</th>
            @endif
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
                    @if(!Auth::user()->super_user && $cita->agendada)
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
                    @elseif(Auth::user()->super_user && $cita->agendada)
                        
                        <form action="{{ route('facturas.store') }}" method="POST">
                            <input type="hidden" name="cita_id" value="{{ $cita->id }}" >
                            @csrf
                            <button type="submit"> Facturar</button>
                        </form>
                            
                    @else
                        <a href="{{ route('facturas.get_factura_by_id', $cita->factura) }}">
                            Ver factura
                        </a>
                    @endif
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