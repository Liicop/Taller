<h1>Crear Vehículo</h1>

<form method="POST"
      action="{{ route('vehiculos.store') }}">

    @csrf

    <input
        type="text"
        name="placa"
        placeholder="Placa">

    <input
        type="text"
        name="marca"
        placeholder="Marca">

    <input
        type="number"
        name="modelo"
        placeholder="Modelo">

    <input
        type="text"
        name="color"
        placeholder="Color">

    <button type="submit">
        Guardar
    </button>

</form>