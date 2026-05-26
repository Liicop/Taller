<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $factura->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            background-color: #ffffff;
            color: #1e293b;
            font-size: 13px;
            line-height: 1.5;
        }

        /* ── Header ── */
        .header {
            background-color: #0b0f19;
            padding: 32px 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .header-left h1 {
            color: #ffffff;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .header-left p {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 4px;
        }

        .header-right {
            text-align: right;
        }

        .invoice-badge {
            background-color: rgba(249, 115, 22, 0.15);
            border: 1px solid rgba(249, 115, 22, 0.4);
            color: #f97316;
            font-size: 22px;
            font-weight: 900;
            font-family: monospace;
            padding: 8px 20px;
            border-radius: 8px;
        }

        .header-right p {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 8px;
        }

        /* ── Banda naranja decorativa ── */
        .stripe {
            height: 4px;
            background: linear-gradient(90deg, #f97316, #ea580c);
        }

        /* ── Sección de info cliente/vehículo ── */
        .info-section {
            padding: 28px 40px;
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-grid {
            width: 100%;
        }

        .info-grid td {
            vertical-align: top;
            width: 50%;
            padding: 0 12px 0 0;
        }

        .info-grid td:last-child {
            padding: 0 0 0 12px;
            border-left: 1px solid #e2e8f0;
        }

        .info-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #94a3b8;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        .info-sub {
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
        }

        .placa-badge {
            display: inline-block;
            font-family: monospace;
            font-size: 14px;
            font-weight: 900;
            color: #f97316;
            background-color: rgba(249, 115, 22, 0.08);
            border: 1px solid rgba(249, 115, 22, 0.25);
            padding: 2px 10px;
            border-radius: 4px;
        }

        /* ── Tabla de repuestos ── */
        .table-section {
            padding: 28px 40px;
        }

        .section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #64748b;
            margin-bottom: 14px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        .items-table thead tr {
            background-color: #0b0f19;
        }

        .items-table thead th {
            padding: 12px 16px;
            text-align: left;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #ffffff;
        }

        .items-table thead th.text-right {
            text-align: right;
        }

        .items-table thead th.text-center {
            text-align: center;
        }

        .items-table tbody tr {
            border-bottom: 1px solid #e2e8f0;
        }

        .items-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .items-table tbody td {
            padding: 12px 16px;
            color: #334155;
            font-size: 13px;
        }

        .items-table tbody td.text-right {
            text-align: right;
            font-family: monospace;
        }

        .items-table tbody td.text-center {
            text-align: center;
        }

        .items-table tbody td.nombre {
            font-weight: 600;
            color: #0f172a;
        }

        .items-table tbody td.subtotal {
            font-weight: 800;
            color: #0f172a;
            font-family: monospace;
            text-align: right;
        }

        /* ── Total ── */
        .total-section {
            padding: 0 40px 32px;
        }

        .total-box {
            margin-left: auto;
            width: 260px;
            background-color: #0b0f19;
            border-radius: 10px;
            padding: 20px 24px;
            border: 1px solid #243c5a;
        }

        .total-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #94a3b8;
            margin-bottom: 6px;
        }

        .total-amount {
            font-size: 28px;
            font-weight: 900;
            color: #f97316;
            font-family: monospace;
        }

        /* ── Footer ── */
        .footer {
            background-color: #f1f5f9;
            border-top: 2px solid #f97316;
            padding: 20px 40px;
            text-align: center;
        }

        .footer p {
            font-size: 11px;
            color: #94a3b8;
            margin-bottom: 3px;
        }

        .footer .bold {
            font-weight: 700;
            color: #64748b;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="header-left">
            <h1>Taller Automotriz</h1>
            <p>Factura de servicios y repuestos</p>
        </div>
        <div class="header-right">
            <div class="invoice-badge">#{{ str_pad($factura->id, 5, '0', STR_PAD_LEFT) }}</div>
            <p>Emitida el {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="stripe"></div>

    <!-- Info cliente y vehículo -->
    <div class="info-section">
        <table class="info-grid">
            <tr>
                <td>
                    <p class="info-label">Facturado a</p>
                    <p class="info-value">{{ $factura->cita->vehiculo->user->name }}</p>
                    <p class="info-sub">Cliente registrado</p>
                </td>
                <td>
                    <p class="info-label">Vehículo</p>
                    <p class="info-value">{{ $factura->cita->vehiculo->marca }}</p>
                    <p class="info-sub">
                        <span class="placa-badge">{{ $factura->cita->vehiculo->placa }}</span>
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Tabla de repuestos -->
    <div class="table-section">
        <p class="section-title">Repuestos y servicios</p>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Repuesto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-right">Precio Unit.</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($factura->detalles as $detalle)
                    <tr>
                        <td class="nombre">{{ $detalle->repuesto->nombre }}</td>
                        <td class="text-center">{{ $detalle->cantidad }}</td>
                        <td class="text-right">$ {{ number_format($detalle->repuesto->precio) }}</td>
                        <td class="subtotal">$ {{ number_format($detalle->cantidad * $detalle->repuesto->precio) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total -->
    <div class="total-section">
        <div class="total-box">
            <p class="total-label">Total a pagar</p>
            <p class="total-amount">$ {{ number_format($factura->total, 2) }}</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p class="bold">Taller Automotriz &mdash; Gracias por su preferencia</p>
        <p>Este documento es una factura oficial generada por el sistema de gestión.</p>
        <p>&copy; {{ date('Y') }} Todos los derechos reservados.</p>
    </div>

</body>
</html>