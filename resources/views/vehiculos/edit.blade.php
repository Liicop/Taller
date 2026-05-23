<h1>Editar Vehículo</h1>

<form method="POST"
      action="{{ route('vehiculos.update', $vehiculo) }}">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="placa"
        value="{{ $vehiculo->placa }}">

    <input
        type="text"
        name="marca"
        value="{{ $vehiculo->marca }}">

    <input
        type="number"
        name="modelo"
        value="{{ $vehiculo->modelo }}">

    <input
        type="text"
        name="color"
        value="{{ $vehiculo->color }}">

    <button type="submit">
        Actualizar
    </button>

</form>