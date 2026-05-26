<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Inventario de Repuestos') }}
            </h2>
            <a href="{{ route('repuestos.create') }}" class="px-4 py-2 btn-primary text-sm flex items-center shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Nuevo Repuesto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mechanic-card">
                
                <div class="overflow-x-auto">
                    <table id="tablaRepuestos" class="display w-full">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio (Unit.)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($repuestos as $repuesto)
                                <tr>
                                    <td class="text-center">
                                        @if($repuesto->imagen)
                                            <div class="w-16 h-16 rounded-md border border-[#243c5a] overflow-hidden bg-white/5 flex items-center justify-center mx-auto">
                                                <img src="{{ asset('storage/'.$repuesto->imagen) }}" alt="{{ $repuesto->nombre }}" class="object-cover w-full h-full">
                                            </div>
                                        @else
                                            <div class="w-16 h-16 rounded-md border border-[#243c5a] border-dashed bg-white/5 flex items-center justify-center mx-auto text-desc">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="font-mono font-bold text-accent">{{ $repuesto->codigo }}</td>
                                    <td class="font-semibold text-title">{{ $repuesto->nombre }}</td>
                                    <td>
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $repuesto->cantidad > 5 ? 'bg-green-500/10 text-green-400 border-green-500/20' : 'bg-red-500/10 text-red-400 border-red-500/20' }} border">
                                            {{ $repuesto->cantidad }} uds.
                                        </span>
                                    </td>
                                    <td class="font-mono">${{ number_format($repuesto->precio, 2) }}</td>
                                    <td>
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('repuestos.edit', $repuesto) }}" class="text-sm font-semibold text-blue-400 hover:text-blue-300 hover:underline">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('repuestos.destroy', $repuesto) }}" class="inline-block" onsubmit="return confirm('¿Está seguro de eliminar este repuesto del inventario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm font-semibold text-red-400 hover:text-red-300 hover:underline">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#tablaRepuestos').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                    },
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [5, 10, 25, 50],
                    order: [[2, 'asc']], // Ordenar alfabéticamente por nombre
                    columnDefs: [
                        { orderable: false, targets: [0, 5] } // Deshabilitar ordenamiento en columnas de imagen y acciones
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>