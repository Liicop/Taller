<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Panel de Control') }}
            </h2>
            <span class="text-sm font-medium px-3 py-1.5 rounded-full bg-amber-500/10 text-accent border border-amber-500/25">
                {{ auth()->user()->super_user ? 'Administrador' : 'Cliente' }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Banner de Bienvenida -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#151824] via-[#1c2030] to-[#2e2212] p-8 shadow-xl border border-[#23283b] text-white">
                <div class="absolute right-0 top-0 opacity-10 translate-x-12 -translate-y-12">
                    <!-- Icono decorativo de llave inglesa gigante -->
                    <svg class="w-72 h-72" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-extrabold tracking-tight text-title">¡Bienvenido, {{ auth()->user()->name }}!</h3>
                    <p class="mt-2 text-desc max-w-xl text-lg">
                        {{ auth()->user()->super_user ? 'Gestione citas, controle inventarios de repuestos, y consulte estadísticas en tiempo real del taller.' : 'Gestione las citas y revise el historial de mantenimiento de sus vehículos registrados.' }}
                    </p>
                </div>
            </div>

            @if (auth()->user()->super_user)
                <!-- ==================== VISTA ADMINISTRADOR ==================== -->
                <div>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-title">Estadísticas Rápidas</h3>
                        <a href="{{ route('estadisticas.index') }}" class="inline-flex items-center text-sm font-semibold text-accent hover:underline transition-colors">
                            Ver estadísticas avanzadas 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    <!-- Grid de KPIs -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                        
                        <!-- Tarjeta Clientes -->
                        <div class="mechanic-card">
                            <div class="flex items-center justify-between mb-4">
                                <span class="p-3 rounded-lg bg-blue-500/10 text-blue-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </span>
                                <span class="text-3xl font-black text-title">{{ $total_clientes }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-desc uppercase tracking-wider">Clientes</h4>
                            <p class="text-xs text-desc/60 mt-2">Usuarios registrados</p>
                        </div>

                        <!-- Tarjeta Vehículos -->
                        <div class="mechanic-card">
                            <div class="flex items-center justify-between mb-4">
                                <span class="p-3 rounded-lg bg-green-500/10 text-green-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                                </span>
                                <span class="text-3xl font-black text-title">{{ $total_vehiculos }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-desc uppercase tracking-wider">Vehículos</h4>
                            <a href="{{ route('vehiculos.index') }}" class="inline-flex items-center text-xs text-green-400 font-semibold mt-2 hover:underline">
                                Gestionar
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>

                        <!-- Tarjeta Citas -->
                        <div class="mechanic-card">
                            <div class="flex items-center justify-between mb-4">
                                <span class="p-3 rounded-lg bg-amber-500/10 text-accent">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </span>
                                <span class="text-3xl font-black text-title">{{ $total_citas }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-desc uppercase tracking-wider">Citas</h4>
                            <a href="{{ route('citas.index') }}" class="inline-flex items-center text-xs text-accent font-semibold mt-2 hover:underline">
                                Ver calendario
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>

                        <!-- Tarjeta Repuestos -->
                        <div class="mechanic-card">
                            <div class="flex items-center justify-between mb-4">
                                <span class="p-3 rounded-lg bg-purple-500/10 text-purple-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </span>
                                <span class="text-3xl font-black text-title">{{ $total_repuestos }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-desc uppercase tracking-wider">Repuestos</h4>
                            <a href="{{ route('repuestos.index') }}" class="inline-flex items-center text-xs text-purple-400 font-semibold mt-2 hover:underline">
                                Inventario
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>

                        <!-- Tarjeta Facturas -->
                        <div class="mechanic-card">
                            <div class="flex items-center justify-between mb-4">
                                <span class="p-3 rounded-lg bg-red-500/10 text-red-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </span>
                                <span class="text-3xl font-black text-title">{{ $total_facturas }}</span>
                            </div>
                            <h4 class="text-sm font-bold text-desc uppercase tracking-wider">Facturas</h4>
                            <a href="{{ route('facturas.index') }}" class="inline-flex items-center text-xs text-red-400 font-semibold mt-2 hover:underline">
                                Facturación
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>

                    </div>
                </div>
            @else
                <!-- ==================== VISTA CLIENTE ==================== -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Acciones Rápidas -->
                    <div class="mechanic-card space-y-4">
                        <h3 class="text-lg font-bold text-title mb-2">Acciones Rápidas</h3>
                        
                        <a href="{{ route('citas.create') }}" class="flex items-center justify-between p-4 btn-primary shadow-md hover:-translate-y-0.5 transform">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Agendar nueva Cita
                            </span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>

                        <a href="{{ route('vehiculos.create') }}" class="flex items-center justify-between p-4 btn-secondary hover:-translate-y-0.5 transform">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Registrar Vehículo
                            </span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    <!-- Sección Central e Historial del Cliente -->
                    <div class="lg:col-span-2 space-y-6">
                        
                        <!-- Caja de Vehículos -->
                        <div class="mechanic-card">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-title">Mis Vehículos</h3>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#1e2235] text-title border border-[#2d3452]">
                                    {{ $mis_vehiculos->count() }} registrados
                                </span>
                            </div>

                            @if($mis_vehiculos->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach ($mis_vehiculos as $vehiculo)
                                        <div class="p-4 rounded-xl bg-[#0f111a] border border-[#23283b] flex items-center justify-between">
                                            <div>
                                                <p class="font-bold text-title">{{ $vehiculo->marca }}</p>
                                                <p class="text-xs text-desc">Color: {{ $vehiculo->color }}</p>
                                            </div>
                                            <span class="px-3 py-1 font-mono text-sm font-extrabold rounded-md bg-amber-500/10 text-accent border border-amber-500/20">
                                                {{ $vehiculo->placa }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-6 text-desc">
                                    <p class="text-sm">Aún no tiene vehículos registrados.</p>
                                </div>
                            @endif
                            
                            <div class="mt-4 pt-4 border-t border-[#23283b]">
                                <a href="{{ route('vehiculos.index') }}" class="text-sm font-semibold text-accent hover:underline flex items-center">
                                    Ver todos los vehículos
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- Citas & Facturas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <!-- Tarjeta Citas -->
                            <div class="mechanic-card flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h4 class="text-base font-bold text-title">Citas Agendadas</h4>
                                        <span class="text-2xl font-black text-accent">{{ $mis_citas->count() }}</span>
                                    </div>
                                    <p class="text-sm text-desc">
                                        Revise los detalles de sus citas agendadas y los estados de mantenimiento.
                                    </p>
                                </div>
                                <div class="mt-6 pt-4 border-t border-[#23283b]">
                                    <a href="{{ route('citas.index') }}" class="text-sm font-semibold text-accent hover:underline flex items-center">
                                        Gestionar citas
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Tarjeta Facturas -->
                            <div class="mechanic-card flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <h4 class="text-base font-bold text-title">Mis Facturas</h4>
                                        <span class="text-2xl font-black text-accent">{{ $mis_facturas->count() }}</span>
                                    </div>
                                    <p class="text-sm text-desc">
                                        Consulte y descargue en PDF las facturas de sus revisiones y compras de repuestos.
                                    </p>
                                </div>
                                <div class="mt-6 pt-4 border-t border-[#23283b]">
                                    <a href="{{ route('facturas.index') }}" class="text-sm font-semibold text-accent hover:underline flex items-center">
                                        Ver historial de facturas
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
