<h1>Editar Cita</h1>

<form method="POST"
      action="{{ route('citas.update', $cita) }}">

    @csrf
    @method('PUT')

    <select name="vehiculo_id">

        @foreach($vehiculos as $vehiculo)

            <option
                value="{{ $vehiculo->id }}"
                @selected($vehiculo->id == $cita->vehiculo_id)
            >

                {{ $vehiculo->placa }}
                -
                {{ $vehiculo->marca }}

            </option>

        @endforeach

    </select>

    <input
        type="date"
        name="fecha"
        value="{{ $cita->fecha }}">

    <input
        type="time"
        name="hora"
        value="{{ $cita->hora }}">

    <input
        type="text"
        name="motivo"
        value="{{ $cita->motivo }}">

    <button type="submit">
        Actualizar
    </button>

</form>