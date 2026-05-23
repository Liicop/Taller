<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taller Mecánico - Sistema de Gestión</title>
</head>
<body>

    <header>
        <nav>
            <span>🔧 Taller Mecánico</span>

            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <section>
            <h1>Sistema de Gestión de Taller Mecánico</h1>
            <p>Administra clientes, vehículos, citas y repuestos de tu taller de forma organizada y eficiente.</p>

            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">Ir al Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Crear cuenta</a>
                    @endif
                @endauth
            </div>
        </section>

        <section>
            <h2>Funcionalidades</h2>

            <ul>
                <li>
                    <h3>Gestión de Clientes</h3>
                    <p>Registra y administra la información de tus clientes.</p>
                </li>

                <li>
                    <h3>Control de Vehículos</h3>
                    <p>Lleva un registro detallado de cada vehículo que ingresa al taller.</p>
                </li>

                <li>
                    <h3>Agenda de Citas</h3>
                    <p>Programa y gestiona las citas de servicio de tus clientes.</p>
                </li>

                <li>
                    <h3>Inventario de Repuestos</h3>
                    <p>Controla el stock de repuestos disponibles en tu taller.</p>
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Taller Mecánico. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
