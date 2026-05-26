<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Nuevo Repuesto') }}
            </h2>
            <span class="text-sm font-medium px-3 py-1.5 rounded-full bg-amber-500/10 text-accent border border-amber-500/25">
                Inventario
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-desc mb-6">
                <a href="{{ route('repuestos.index') }}" class="hover:text-accent transition-colors">Repuestos</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-title font-semibold">Nuevo Repuesto</span>
            </div>

            <div class="mechanic-card">

                <!-- Cabecera de la card -->
                <div class="flex items-center gap-3 mb-8 pb-6 border-b border-[#23283b]">
                    <span class="p-3 rounded-lg bg-purple-500/10 text-purple-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </span>
                    <div>
                        <h3 class="text-lg font-bold text-title">Registrar Repuesto</h3>
                        <p class="text-sm text-desc">Complete los datos para agregar un nuevo repuesto al inventario.</p>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data"
                      action="{{ route('repuestos.store') }}"
                      class="space-y-6">
                    @csrf

                    <!-- Errores de validación -->
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

                    <!-- Fila: Código y Nombre -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label for="codigo" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Código
                            </label>
                            <input
                                type="text"
                                id="codigo"
                                name="codigo"
                                value="{{ old('codigo') }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors font-mono"
                                placeholder="Ej: REP-001"
                            >
                        </div>

                        <div class="space-y-2">
                            <label for="nombre" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Nombre del Repuesto
                            </label>
                            <input
                                type="text"
                                id="nombre"
                                name="nombre"
                                value="{{ old('nombre') }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                placeholder="Ej: Filtro de aceite"
                            >
                        </div>

                    </div>

                    <!-- Fila: Cantidad y Precio -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label for="cantidad" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Cantidad en Stock
                            </label>
                            <input
                                type="number"
                                id="cantidad"
                                name="cantidad"
                                value="{{ old('cantidad') }}"
                                min="0"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                placeholder="0"
                            >
                        </div>

                        <div class="space-y-2">
                            <label for="precio" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Precio (COP)
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-desc font-semibold">$</span>
                                <input
                                    type="number"
                                    id="precio"
                                    name="precio"
                                    step="0.01"
                                    value="{{ old('precio') }}"
                                    min="0"
                                    class="w-full pl-8 pr-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                           focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                    placeholder="0.00"
                                >
                            </div>
                        </div>

                    </div>

                    <!-- Imagen -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-desc uppercase tracking-wider">
                            Imagen del Repuesto
                        </label>
                        <label for="imagen"
                               class="flex flex-col items-center justify-center w-full h-36 rounded-xl border-2 border-dashed border-[#243c5a]
                                      bg-[#0f111a] hover:border-[#f97316] hover:bg-[#f97316]/5 transition-colors cursor-pointer group">
                            <svg class="w-8 h-8 text-desc group-hover:text-accent transition-colors mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-sm text-desc group-hover:text-accent transition-colors">Haz clic para subir una imagen</span>
                            <span class="text-xs text-desc/50 mt-1">PNG, JPG, WEBP hasta 2MB</span>
                            <input type="file" id="imagen" name="imagen" class="hidden" accept="image/*">
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="flex items-center justify-between pt-6 border-t border-[#23283b]">
                        <a href="{{ route('repuestos.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 btn-secondary rounded-xl text-sm font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 btn-primary rounded-xl text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Guardar Repuesto
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>