<h1>Crear Repuesto</h1>

<form method="POST" enctype="multipart/form-data"
 action="{{ route('repuestos.store') }}">

    @csrf

    <input
        type="text"
        name="codigo"
        placeholder="Código">

    <input
        type="text"
        name="nombre"
        placeholder="Nombre">

    <input
        type="number"
        name="cantidad"
        placeholder="Cantidad">

    <input
        type="number"
        step="0.01"
        name="precio"
        placeholder="Precio">

    <input type="file" name="imagen">

    <button type="submit">
        Guardar
    </button>

</form>