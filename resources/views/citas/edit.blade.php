<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Editar Cita') }}
            </h2>
            <span class="text-sm font-medium px-3 py-1.5 rounded-full bg-amber-500/10 text-accent border border-amber-500/25">
                Citas
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-desc mb-6">
                <a href="{{ route('citas.index') }}" class="hover:text-accent transition-colors">Citas</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-title font-semibold">Editar Cita</span>
            </div>

            <div class="mechanic-card">

                <!-- Cabecera de la card -->
                <div class="flex items-center gap-3 mb-8 pb-6 border-b border-[#23283b]">
                    <span class="p-3 rounded-lg bg-amber-500/10 text-accent">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    <div>
                        <h3 class="text-lg font-bold text-title">Modificar Cita</h3>
                        <p class="text-sm text-desc">Actualice los datos de la cita agendada.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('citas.update', $cita) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $error }}
                                </p>
                            @endforeach
                        </div>
                    @endif

                    <!-- Vehículo -->
                    <div class="space-y-2">
                        <label for="vehiculo_id" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                            Vehículo
                        </label>
                        <select name="vehiculo_id" id="vehiculo_id"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors">
                            @foreach($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}" @selected($vehiculo->id == $cita->vehiculo_id)>
                                    {{ $vehiculo->placa }} — {{ $vehiculo->marca }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha y Hora -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label for="fecha" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Fecha
                            </label>
                            <input
                                type="date"
                                id="fecha"
                                name="fecha"
                                value="{{ old('fecha', $cita->fecha) }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors
                                       [color-scheme:dark]"
                            >
                        </div>

                        <div class="space-y-2">
                            <label for="hora" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Hora
                            </label>
                            <input
                                type="time"
                                id="hora"
                                name="hora"
                                value="{{ old('hora', $cita->hora) }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors
                                       [color-scheme:dark]"
                            >
                        </div>

                    </div>

                    <!-- Motivo -->
                    <div class="space-y-2">
                        <label for="motivo" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                            Motivo de la Visita
                        </label>
                        <input
                            type="text"
                            id="motivo"
                            name="motivo"
                            value="{{ old('motivo', $cita->motivo) }}"
                            class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                   focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                            placeholder="Ej: Revisión de frenos"
                        >
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-between pt-6 border-t border-[#23283b]">
                        <a href="{{ route('citas.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 btn-secondary rounded-xl text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 btn-primary rounded-xl text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Actualizar Cita
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>