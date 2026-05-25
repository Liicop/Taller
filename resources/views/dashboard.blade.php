<h1>
    Bienvenido {{ auth()->user()->name }}
</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

@if (auth()->user()->super_user)
<h2>Estadísticas</h2>
<a href="{{ route('estadisticas.index') }}">Ver estadísticas</a>

<ul>

    <li>
        Clientes:
        {{ $total_clientes }}
    </li>

    <li>
        Vehículos:
        {{ $total_vehiculos }}
        <a href="{{ route('vehiculos.index') }}">Ver vehículos</a>
    </li>

    <li>
        Citas agendadas:
        {{ $total_citas }}
        <a href="{{ route('citas.index') }}">Ver citas</a>
    </li>

    <li>
        Repuestos en inventario:
        {{ $total_repuestos }}
        <a href="{{ route('repuestos.index') }}">Ver repuestos</a>
    </li>
    <li>
        Facturas:
        {{ $total_facturas }}
        <a href="{{ route('facturas.index') }}">Ver facturas</a>
    </li>

</ul>

@else

<h2>Acción</h2>
<ul>
    <li>
        <a href="{{ route('citas.create') }}">Agendar cita</a>
    </li>
    <li>
        <a href="{{ route('vehiculos.create') }}">Registrar vehículo</a>
    </li>
</ul>

<ul>
    <li>
        <p>Tienes {{ $mis_citas->count() }} citas agendadas</p>
        <a href="{{ route('citas.index') }}">Ver citas</a>
    </li>
    <li>
        <p>Tienes {{ $mis_vehiculos->count() }} vehículos registrados</p>
            @foreach ($mis_vehiculos as $vehiculo)
                <li>Placa: {{ $vehiculo->placa }} - Marca: {{ $vehiculo->marca }}</li>
            @endforeach
        <a href="{{ route('vehiculos.index') }}">Ver vehículos</a>
    </li>
    <li>
        <p>Tienes {{ $mis_facturas->count() }} facturas</p>
        <a href="{{ route('facturas.index') }}">Ver facturas</a>
    </li>
</ul> 




@endif
