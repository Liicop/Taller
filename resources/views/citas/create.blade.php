<form method="POST"
      action="{{ route('citas.store') }}">

    @csrf

    <select name="vehiculo_id">

        @foreach($vehiculos as $vehiculo)

            <option value="{{ $vehiculo->id }}">

                {{ $vehiculo->placa }}
                -
                {{ $vehiculo->marca }}

            </option>

        @endforeach

    </select>

    <input
        type="date"
        name="fecha">

    <input
        type="time"
        name="hora">

    <input
        type="text"
        name="motivo">

    <button type="submit">
        Agendar
    </button>

</form>