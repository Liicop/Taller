<h1>Mis Vehículos</h1>

@if(!Auth::user()->super_user)
    <a href="{{ route('vehiculos.create') }}">
        Nuevo Vehículo
    </a>
@endif

<table border="1">

    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        
        <th> 
            @if(!Auth::user()->super_user) 
                Acciones 
            @else 
                Propietario 
            @endif 
        </th>

    </tr>

    @foreach($vehiculos as $vehiculo)

        <tr>

            <td>{{ $vehiculo->placa }}</td>

            <td>{{ $vehiculo->marca }}</td>

            <td>{{ $vehiculo->modelo }}</td>

            

                <td>
                    @if(!Auth::user()->super_user)

                        <a href="{{ route('vehiculos.edit', $vehiculo) }}">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('vehiculos.destroy', $vehiculo) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>

                    @else
                        {{ $vehiculo->user->name }}
                    @endif

                </td>
            

        </tr>

    @endforeach

</table>