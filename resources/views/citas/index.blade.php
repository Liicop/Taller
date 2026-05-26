<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Listado de Citas') }}
            </h2>
            @if(!Auth::user()->super_user)
                <a href="{{ route('citas.create') }}" class="px-4 py-2 btn-primary text-sm flex items-center shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Agendar Nueva Cita
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mechanic-card">
                
                <div class="overflow-x-auto">
                    <table id="tablaCitas" class="display w-full">
                        <thead>
                            <tr>
                                <th>Vehículo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Motivo</th>
                                <th>Estado</th>
                                <th>
                                    @if(!Auth::user()->super_user)
                                        Acciones
                                    @else
                                        Facturar
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                                <tr>
                                    <td class="font-mono font-bold text-accent">
                                        {{ $cita->vehiculo->placa }}
                                    </td>
                                    <td>{{ $cita->fecha }}</td>
                                    <td>{{ $cita->hora }}</td>
                                    <td>{{ $cita->motivo }}</td>
                                    <td>
                                        @if($cita->agendada)
                                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-accent border border-amber-500/20">
                                                Agendada
                                            </span>
                                        @else
                                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-500/10 text-green-400 border border-green-500/20">
                                                Terminada
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex items-center space-x-3">
                                            @if(!Auth::user()->super_user && $cita->agendada)
                                                <a href="{{ route('citas.edit', $cita) }}" class="text-sm font-semibold text-blue-400 hover:text-blue-300 hover:underline">
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('citas.destroy', $cita) }}" class="inline-block" onsubmit="return confirm('¿Está seguro de cancelar esta cita?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm font-semibold text-red-400 hover:text-red-300 hover:underline">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @elseif(Auth::user()->super_user && $cita->agendada)
                                                <form action="{{ route('facturas.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="cita_id" value="{{ $cita->id }}">
                                                    <button type="submit" class="text-sm font-semibold text-green-400 hover:text-green-300 hover:underline">
                                                        Facturar
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ route('facturas.get_factura_by_id', $cita->factura) }}" class="text-sm font-semibold text-blue-400 hover:text-blue-300 hover:underline flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                                    Ver factura
                                                </a>
                                            @endif
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
                $('#tablaCitas').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                    },
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [5, 10, 25, 50],
                    order: [[1, 'asc'], [2, 'asc']] // Ordenar por fecha y hora por defecto
                });
            });
        </script>
    @endpush
</x-app-layout>
