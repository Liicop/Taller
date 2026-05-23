<h1>Editar Repuesto</h1>

<form method="POST" enctype="multipart/form-data"
      action="{{ route('repuestos.update', $repuesto) }}">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="codigo"
        value="{{ $repuesto->codigo }}">

    <input
        type="text"
        name="nombre"
        value="{{ $repuesto->nombre }}">

    <input
        type="number"
        name="cantidad"
        value="{{ $repuesto->cantidad }}">

    <input
        type="number"
        step="0.01"
        name="precio"
        value="{{ $repuesto->precio }}">

        @if ($repuesto->imagen)

            <img src="{{ asset('storage/'.$repuesto->imagen) }}" alt=""
            width="150">
        @endif

        <input type="file" name="imagen">

    <button type="submit">
        Actualizar
    </button>

</form>