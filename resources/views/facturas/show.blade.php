<h1>Factura #{{ $factura->id }}</h1>

<h3>
Vehículo:
{{ $factura->cita->vehiculo->placa }}

</h3>

<hr>

<form method="POST"
      action="{{ route('detalles.store', $factura) }}">

    @csrf

    <select name="repuesto_id">

        @foreach($repuestos as $repuesto)

            <option value="{{ $repuesto->id }}">

                {{ $repuesto->nombre }}

                (Stock:
                {{ $repuesto->cantidad }})

            </option>

        @endforeach

    </select>

    <input
        type="number"
        name="cantidad"
        min="1">

    <button type="submit">

        Agregar

    </button>

</form>

<hr>

<table border="1">

<tr>

    <th>Repuesto</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Subtotal</th>
    <th>Acciones</th>

</tr>

@foreach($factura->detalles as $detalle)

<tr>

    <td>
        {{ $detalle->repuesto->nombre }}
    </td>

    <td>
        {{ $detalle->cantidad }}
    </td>

    <td>
        $ {{ number_format($detalle->precio_unitario, 2) }}
    </td>

    <td>
        $ {{ number_format($detalle->subtotal, 2) }}
    </td>

    <td>

        <form
            method="POST"
            action="{{ route('detalles.destroy', $detalle) }}">

            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>

        </form>

    </td>

</tr>

@endforeach

</table>

<h2>
TOTAL:
$ {{ number_format($factura->total, 2) }}
</h2>

<a href="{{ route('citas.index') }}">Finalizar Factura</a>

