<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Listado de Vehículos') }}
            </h2>
            @if(!Auth::user()->super_user)
                <a href="{{ route('vehiculos.create') }}" class="px-4 py-2 btn-primary text-sm flex items-center shadow-md">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Nuevo Vehículo
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mechanic-card">
                
                <div class="overflow-x-auto">
                    <table id="tablaVehiculos" class="display w-full">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>
                                    @if(!Auth::user()->super_user) 
                                        Acciones 
                                    @else 
                                        Propietario 
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehiculos as $vehiculo)
                                <tr>
                                    <td class="font-mono font-bold text-accent">
                                        {{ $vehiculo->placa }}
                                    </td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>
                                        @if(!Auth::user()->super_user)
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="text-sm font-semibold text-blue-400 hover:text-blue-300 hover:underline">
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('vehiculos.destroy', $vehiculo) }}" class="inline-block" onsubmit="return confirm('¿Está seguro de que desea eliminar este vehículo?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm font-semibold text-red-400 hover:text-red-300 hover:underline">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-sm font-medium text-desc">
                                                {{ $vehiculo->user->name }}
                                            </span>
                                        @endif
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
                $('#tablaVehiculos').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                    },
                    responsive: true,
                    pageLength: 10,
                    lengthMenu: [5, 10, 25, 50]
                });
            });
        </script>
    @endpush
</x-app-layout>