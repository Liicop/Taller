<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Listado de Facturas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mechanic-card">
                
                <div class="overflow-x-auto">
                    <table id="tablaFacturas" class="display w-full">
                        <thead>
                            <tr>
                                <th>N° Factura</th>
                                <th>Cliente</th>
                                <th>Placa</th>
                                <th>Motivo de Servicio</th>
                                <th>Fecha de Emisión</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facturas as $factura)
                                <tr>
                                    <td class="font-mono font-bold text-accent">
                                        #{{ str_pad($factura->id, 5, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="font-semibold">{{ $factura->cita->vehiculo->user->name }}</td>
                                    <td class="font-mono text-desc">{{ $factura->cita->vehiculo->placa }}</td>
                                    <td>{{ $factura->cita->motivo }}</td>
                                    <td>{{ $factura->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('facturas.get_factura_by_id', $factura) }}" class="text-sm font-semibold text-blue-400 hover:text-blue-300 hover:underline flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                            Ver PDF
                                        </a>
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
                $('#tablaFacturas').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                    },
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [5, 10, 25, 50],
                    order: [[0, 'desc']] // Facturas más recientes primero
                });
            });
        </script>
    @endpush
</x-app-layout>