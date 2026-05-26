<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Registrar Vehículo') }}
            </h2>
            <span class="text-sm font-medium px-3 py-1.5 rounded-full bg-green-500/10 text-green-400 border border-green-500/25">
                Vehículos
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-desc mb-6">
                <a href="{{ route('vehiculos.index') }}" class="hover:text-accent transition-colors">Vehículos</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-title font-semibold">Nuevo Vehículo</span>
            </div>

            <div class="mechanic-card">

                <!-- Cabecera -->
                <div class="flex items-center gap-3 mb-8 pb-6 border-b border-[#23283b]">
                    <span class="p-3 rounded-lg bg-green-500/10 text-green-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                    </span>
                    <div>
                        <h3 class="text-lg font-bold text-title">Registrar Nuevo Vehículo</h3>
                        <p class="text-sm text-desc">Complete los datos del vehículo para agregarlo al sistema.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('vehiculos.store') }}" class="space-y-6">
                    @csrf

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

                    <!-- Placa y Marca -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label for="placa" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Placa
                            </label>
                            <input
                                type="text"
                                id="placa"
                                name="placa"
                                value="{{ old('placa') }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors font-mono tracking-widest uppercase"
                                placeholder="Ej: ABC-123"
                            >
                        </div>

                        <div class="space-y-2">
                            <label for="marca" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Marca
                            </label>
                            <input
                                type="text"
                                id="marca"
                                name="marca"
                                value="{{ old('marca') }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                placeholder="Ej: Toyota"
                            >
                        </div>

                    </div>

                    <!-- Modelo y Color -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label for="modelo" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Año / Modelo
                            </label>
                            <input
                                type="number"
                                id="modelo"
                                name="modelo"
                                value="{{ old('modelo') }}"
                                min="1900"
                                max="{{ date('Y') + 1 }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                placeholder="Ej: 2021"
                            >
                        </div>

                        <div class="space-y-2">
                            <label for="color" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Color
                            </label>
                            <input
                                type="text"
                                id="color"
                                name="color"
                                value="{{ old('color') }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                placeholder="Ej: Blanco perla"
                            >
                        </div>

                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-between pt-6 border-t border-[#23283b]">
                        <a href="{{ route('vehiculos.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 btn-secondary rounded-xl text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 btn-primary rounded-xl text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Guardar Vehículo
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>