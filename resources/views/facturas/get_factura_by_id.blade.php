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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-sm text-desc">
                <a href="{{ route('facturas.index') }}" class="hover:text-accent transition-colors">Facturas</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-title font-semibold">Factura #{{ $factura->id }}</span>
            </div>

            <!-- Encabezado de la factura -->
            <div class="mechanic-card">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                    <div class="flex items-center gap-4">
                        <span class="p-3 rounded-lg bg-red-500/10 text-red-400">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs text-desc uppercase tracking-wider font-semibold">Cliente</p>
                            <p class="text-xl font-bold text-title mt-0.5">{{ $factura->cita->vehiculo->user->name }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="p-3 rounded-lg bg-green-500/10 text-green-400">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs text-desc uppercase tracking-wider font-semibold">Vehículo</p>
                            <p class="text-lg font-bold text-title mt-0.5">{{ $factura->cita->vehiculo->marca }}</p>
                            <p class="font-mono font-extrabold text-accent text-sm">{{ $factura->cita->vehiculo->placa }}</p>
                        </div>
                    </div>

                    <!-- Botón PDF -->
                    <a href="{{ route('facturas.pdf', $factura) }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 btn-primary rounded-xl text-sm self-start md:self-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Descargar PDF
                    </a>

                </div>
            </div>

            <!-- Tabla de detalles -->
            <div class="mechanic-card">

                <div class="flex items-center gap-3 mb-6 pb-5 border-b border-[#23283b]">
                    <span class="p-2.5 rounded-lg bg-purple-500/10 text-purple-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </span>
                    <h3 class="text-base font-bold text-title">Repuestos Utilizados</h3>
                </div>

                @if($factura->detalles->count() > 0)
                    <div class="overflow-x-auto rounded-xl border border-[#243c5a]">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-[#111827]">
                                    <th class="px-4 py-3 text-left text-xs font-bold text-title uppercase tracking-wider">Repuesto</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold text-title uppercase tracking-wider">Cantidad</th>
                                    <th class="px-4 py-3 text-right text-xs font-bold text-title uppercase tracking-wider">Precio Unit.</th>
                                    <th class="px-4 py-3 text-right text-xs font-bold text-title uppercase tracking-wider">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#1e293b]">
                                @foreach($factura->detalles as $detalle)
                                    <tr class="bg-[#161e2e] hover:bg-[#1e283b] transition-colors">
                                        <td class="px-4 py-3 text-title font-medium">{{ $detalle->repuesto->nombre }}</td>
                                        <td class="px-4 py-3 text-center text-desc">{{ $detalle->cantidad }}</td>
                                        <td class="px-4 py-3 text-right text-desc font-mono">$ {{ number_format($detalle->repuesto->precio) }}</td>
                                        <td class="px-4 py-3 text-right text-accent font-mono font-bold">$ {{ number_format($detalle->cantidad * $detalle->repuesto->precio) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-end mt-6 pt-5 border-t border-[#23283b]">
                        <div class="p-5 rounded-xl bg-[#0f111a] border border-[#243c5a] text-right min-w-[220px]">
                            <p class="text-xs text-desc uppercase tracking-wider font-semibold mb-1">Total de la Factura</p>
                            <p class="text-3xl font-black text-accent font-mono">
                                $ {{ number_format($factura->total, 2) }}
                            </p>
                        </div>
                    </div>

                @else
                    <div class="py-12 text-center text-desc">
                        <svg class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        <p class="text-sm">Esta factura no tiene repuestos registrados.</p>
                    </div>
                @endif

                <div class="flex justify-start mt-6 pt-5 border-t border-[#23283b]">
                    <a href="{{ route('facturas.index') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 btn-secondary rounded-xl text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Volver a Facturas
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>