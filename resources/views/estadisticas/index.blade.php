<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-title leading-tight">
                {{ __('Estadísticas del Taller') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 btn-secondary text-sm flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Volver al Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Grid de Gráficos (2 columnas en pantallas grandes, 1 columna en móviles) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- 1. Gráfico de Citas por Mes -->
                <div class="mechanic-card flex flex-col space-y-4">
                    <div class="flex justify-between items-center border-b border-[#23283b] pb-3">
                        <h3 class="text-lg font-bold text-title flex items-center">
                            <span class="text-accent mr-2">📅</span>
                            Citas por Mes
                        </h3>
                    </div>
                    <!-- Contenedor del canvas con tamaño controlado -->
                    <div class="relative h-72 w-full">
                        <canvas id="citasChart"
                                data-labels="{{ json_encode($citasPorMes->pluck('mes')) }}"
                                data-totales="{{ json_encode($citasPorMes->pluck('total')) }}">
                        </canvas>
                    </div>
                </div>

                <!-- 2. Gráfico de Ingresos por Mes -->
                <div class="mechanic-card flex flex-col space-y-4">
                    <div class="flex justify-between items-center border-b border-[#23283b] pb-3">
                        <h3 class="text-lg font-bold text-title flex items-center">
                            <span class="text-accent mr-2">💰</span>
                            Ingresos Mensuales
                        </h3>
                    </div>
                    <div class="relative h-72 w-full">
                        <canvas id="ingresosChart"
                                data-labels="{{ json_encode($ingresosPorMes->pluck('mes')) }}"
                                data-totales="{{ json_encode($ingresosPorMes->pluck('total')) }}">
                        </canvas>
                    </div>
                </div>

                <!-- 3. Vehículos por Marca -->
                <div class="mechanic-card flex flex-col space-y-4">
                    <div class="flex justify-between items-center border-b border-[#23283b] pb-3">
                        <h3 class="text-lg font-bold text-title flex items-center">
                            <span class="text-accent mr-2">🚗</span>
                            Vehículos por Marca
                        </h3>
                    </div>
                    <div class="relative h-72 w-full">
                        <canvas id="vehiculosChart"
                                data-labels="{{ json_encode($vehiculosPorMarca->pluck('marca')) }}"
                                data-totales="{{ json_encode($vehiculosPorMarca->pluck('total')) }}">
                        </canvas>
                    </div>
                </div>

                <!-- 4. Top 5 Repuestos Más Vendidos -->
                <div class="mechanic-card flex flex-col space-y-4">
                    <div class="flex justify-between items-center border-b border-[#23283b] pb-3">
                        <h3 class="text-lg font-bold text-title flex items-center">
                            <span class="text-accent mr-2">⚙️</span>
                            Top 5 Repuestos Más Vendidos
                        </h3>
                    </div>
                    <div class="relative h-72 w-full">
                        <canvas id="repuestosChart"
                                data-labels="{{ json_encode($repuestosVendidos->pluck('nombre')) }}"
                                data-totales="{{ json_encode($repuestosVendidos->pluck('total')) }}">
                        </canvas>
                    </div>
                </div>

            </div>
            
        </div>
    </div>

    <!-- Scripts de Gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/js/estadisticas.js'])
</x-app-layout>