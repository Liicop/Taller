<h1>Inventario</h1>

<a href="{{ route('repuestos.create') }}">
    Nuevo Repuesto
</a>

<table border="1">

    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>

    @foreach($repuestos as $repuesto)

        <tr>

            <td>{{ $repuesto->codigo }}</td>

            <td>{{ $repuesto->nombre }}</td>

            <td>{{ $repuesto->cantidad }}</td>

            <td>{{ $repuesto->precio }}</td>
            <td>
                @if($repuesto->imagen)

                    <img src="{{ 'storage/'.$repuesto->imagen }}"
                    width="100" alt="">
                @endif
            </td>

            <td>

                <a href="{{ route('repuestos.edit', $repuesto) }}">
                    Editar
                </a>

                

                <form method="POST"
                    action="{{ route('repuestos.destroy', $repuesto) }}">

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