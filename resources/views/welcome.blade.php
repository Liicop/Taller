<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taller Mecánico - Sistema de Gestión</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <!-- BARRA DE NAVEGACIÓN -->
    <header class="sticky top-0 z-50 bg-[#111827]/90 backdrop-blur-md border-b border-[#1e293b]">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <span class="flex items-center space-x-2 text-xl font-extrabold text-title">
                <span class="text-accent">🔧</span>
                <span>Taller Mecánico</span>
            </span>

            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 btn-primary text-sm shadow-md">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-desc hover:text-accent transition-colors">
                        Iniciar sesión
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 btn-secondary text-sm">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </div>
        </nav>
    </header>

    <main class="space-y-24 py-16">
        
        <!-- SECCIÓN HERO -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Textos del Hero -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <span class="text-sm font-extrabold uppercase tracking-wider text-accent px-3 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/20">
                        Software Automotriz Premium
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-title tracking-tight leading-none">
                        Gestión Inteligente para tu <span class="text-accent">Taller Mecánico</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-desc max-w-2xl mx-auto lg:mx-0">
                        Optimiza la administración de clientes, historial de vehículos, control de citas y niveles de repuestos en una sola plataforma diseñada para la eficiencia.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 pt-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-8 py-4 btn-primary text-base text-center shadow-lg hover:scale-[1.02] transform transition-transform">
                                Ir al Panel de Control
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-8 py-4 btn-primary text-base text-center shadow-lg hover:scale-[1.02] transform transition-transform">
                                Iniciar sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-8 py-4 btn-secondary text-base text-center hover:scale-[1.02] transform transition-transform">
                                    Crear una Cuenta
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Ilustración Decorativa del Hero (Llave Inglesa y Engranajes) -->
                <div class="lg:col-span-5 hidden lg:flex justify-center relative">
                    <div class="absolute inset-0 bg-orange-500/10 blur-3xl rounded-full w-72 h-72 mx-auto my-auto"></div>
                    <div class="relative p-8 bg-[#161e2e] border border-[#243c5a] rounded-2xl shadow-2xl flex items-center justify-center">
                        <svg class="w-64 h-64 text-accent animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECCIÓN DE FUNCIONALIDADES -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl font-extrabold text-title">Funcionalidades del Sistema</h2>
                <p class="text-desc max-w-xl mx-auto">
                    Todo lo que necesitas para llevar la gestión de tu taller mecánico al siguiente nivel de rendimiento.
                </p>
            </div>

            <!-- Grid de Funcionalidades -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Gestión de Clientes -->
                <div class="mechanic-card space-y-4">
                    <div class="p-3 rounded-lg bg-blue-500/10 text-blue-400 w-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-title">Gestión de Clientes</h3>
                    <p class="text-sm text-desc leading-relaxed">
                        Registra la información de contacto de tus clientes y mantén un historial de sus mantenimientos en un solo lugar.
                    </p>
                </div>

                <!-- Control de Vehículos -->
                <div class="mechanic-card space-y-4">
                    <div class="p-3 rounded-lg bg-green-500/10 text-green-400 w-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-title">Control de Vehículos</h3>
                    <p class="text-sm text-desc leading-relaxed">
                        Lleva un registro detallado de placas, marcas, modelos y colores de todos los vehículos que ingresan a servicio.
                    </p>
                </div>

                <!-- Agenda de Citas -->
                <div class="mechanic-card space-y-4">
                    <div class="p-3 rounded-lg bg-amber-500/10 text-accent w-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-title">Agenda de Citas</h3>
                    <p class="text-sm text-desc leading-relaxed">
                        Programa, organiza y calendariza los ingresos de vehículos para evitar cuellos de botella en las rampas de trabajo.
                    </p>
                </div>

                <!-- Inventario de Repuestos -->
                <div class="mechanic-card space-y-4">
                    <div class="p-3 rounded-lg bg-purple-500/10 text-purple-400 w-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-title">Inventario de Repuestos</h3>
                    <p class="text-sm text-desc leading-relaxed">
                        Controla el stock de repuestos disponibles en almacén, precios unitarios y asócialos fácilmente a las facturas.
                    </p>
                </div>

            </div>
        </section>

    </main>

    <!-- PIE DE PÁGINA -->
    <footer class="bg-[#111827] border-t border-[#1e293b] py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <p class="text-desc text-sm">&copy; {{ date('Y') }} Taller Mecánico. Todos los derechos reservados.</p>
            <p class="text-xs text-desc/50">Desarrollado con pasión y tecnología de vanguardia.</p>
        </div>
    </footer>

</body>
</html>
