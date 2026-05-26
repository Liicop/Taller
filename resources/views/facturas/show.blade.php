<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                Factura <span class="text-accent font-mono">#{{ $factura->id }}</span>
            </h2>
            <span class="text-sm font-medium px-3 py-1.5 rounded-full bg-red-500/10 text-red-400 border border-red-500/25">
                Facturación
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-desc">
                <a href="{{ route('facturas.index') }}" class="hover:text-accent transition-colors">Facturas</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-title font-semibold">Factura #{{ $factura->id }}</span>
            </div>

            <!-- Info del vehículo -->
            <div class="mechanic-card flex items-center gap-4">
                <span class="p-3 rounded-lg bg-green-500/10 text-green-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                </span>
                <div>
                    <p class="text-xs text-desc uppercase tracking-wider font-semibold">Vehículo asociado</p>
                    <p class="text-xl font-mono font-extrabold text-accent mt-0.5">
                        {{ $factura->cita->vehiculo->placa }}
                    </p>
                </div>
            </div>

            <!-- Formulario: Agregar repuesto -->
            <div class="mechanic-card">
                <div class="flex items-center gap-3 mb-6 pb-5 border-b border-[#23283b]">
                    <span class="p-2.5 rounded-lg bg-purple-500/10 text-purple-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </span>
                    <h3 class="text-base font-bold text-title">Agregar Repuesto a la Factura</h3>
                </div>

                <form method="POST" action="{{ route('detalles.store', $factura) }}" class="space-y-4">
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

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

                        <div class="md:col-span-2 space-y-2">
                            <label for="repuesto_id" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Repuesto
                            </label>
                            <select name="repuesto_id" id="repuesto_id"
                                    class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title
                                           focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors">
                                @foreach($repuestos as $repuesto)
                                    <option value="{{ $repuesto->id }}">
                                        {{ $repuesto->nombre }} — Stock: {{ $repuesto->cantidad }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="cantidad" class="block text-sm font-semibold text-desc uppercase tracking-wider">
                                Cantidad
                            </label>
                            <input
                                type="number"
                                id="cantidad"
                                name="cantidad"
                                min="1"
                                value="{{ old('cantidad', 1) }}"
                                class="w-full px-4 py-3 rounded-xl bg-[#0f111a] border border-[#243c5a] text-title placeholder-desc/50
                                       focus:outline-none focus:border-[#f97316] focus:ring-1 focus:ring-[#f97316]/40 transition-colors"
                                placeholder="1"
                            >
                        </div>

                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 btn-primary rounded-xl text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Agregar Repuesto
                        </button>
                    </div>

                </form>
            </div>

            <!-- Tabla de detalles -->
            <div class="mechanic-card">
                <div class="flex items-center gap-3 mb-6 pb-5 border-b border-[#23283b]">
                    <span class="p-2.5 rounded-lg bg-red-500/10 text-red-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </span>
                    <h3 class="text-base font-bold text-title">Detalle de Repuestos</h3>
                </div>

                @if($factura->detalles->count() > 0)
                    <div class="overflow-x-auto rounded-xl border border-[#243c5a]">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-[#111827]">
                                    <th class="px-4 py-3 text-left text-xs font-bold text-title uppercase tracking-wider">Repuesto</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold text-title uppercase tracking-wider">Cantidad</th>
                                    <th class="px-4 py-3 text-right text-xs font-bold text-title uppercase tracking-wider">Precio Unit.</th>
                                    <th class="px-4 py-3 text-right text-xs font-bold text-title uppercase tracking-wider">Subtotal</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold text-title uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#1e293b]">
                                @foreach($factura->detalles as $detalle)
                                    <tr class="bg-[#161e2e] hover:bg-[#1e283b] transition-colors">
                                        <td class="px-4 py-3 text-title font-medium">
                                            {{ $detalle->repuesto->nombre }}
                                        </td>
                                        <td class="px-4 py-3 text-center text-desc">
                                            {{ $detalle->cantidad }}
                                        </td>
                                        <td class="px-4 py-3 text-right text-desc font-mono">
                                            $ {{ number_format($detalle->precio_unitario, 2) }}
                                        </td>
                                        <td class="px-4 py-3 text-right text-accent font-mono font-bold">
                                            $ {{ number_format($detalle->subtotal, 2) }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <form method="POST" action="{{ route('detalles.destroy', $detalle) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
                                                               bg-red-500/10 text-red-400 border border-red-500/20
                                                               hover:bg-red-500/20 hover:border-red-500/40 transition-colors">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-end mt-6 pt-5 border-t border-[#23283b]">
                        <div class="p-5 rounded-xl bg-[#0f111a] border border-[#243c5a] text-right min-w-[220px]">
                            <p class="text-xs text-desc uppercase tracking-wider font-semibold mb-1">Total a pagar</p>
                            <p class="text-3xl font-black text-accent font-mono">
                                $ {{ number_format($factura->total, 2) }}
                            </p>
                        </div>
                    </div>

                @else
                    <div class="py-12 text-center text-desc">
                        <svg class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        <p class="text-sm">Aún no se han agregado repuestos a esta factura.</p>
                    </div>
                @endif

                <!-- Botón finalizar -->
                <div class="flex justify-between items-center mt-6 pt-5 border-t border-[#23283b]">
                    <a href="{{ route('facturas.index') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 btn-secondary rounded-xl text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Volver
                    </a>
                    <a href="{{ route('citas.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-2.5 btn-primary rounded-xl text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Finalizar Factura
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>