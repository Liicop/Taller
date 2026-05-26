<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita Registrada — Taller Automotriz</title>
</head>
<body style="margin:0; padding:0; background-color:#0b0f19; font-family: 'Segoe UI', Arial, sans-serif; color:#cbd5e1;">

    <!-- Wrapper -->
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0b0f19; padding: 40px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px; width:100%;">

                    <!-- Header con logo/nombre del taller -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #151824 0%, #1c2030 60%, #2e2212 100%);
                                   border-radius: 16px 16px 0 0;
                                   padding: 36px 40px;
                                   border: 1px solid #23283b;
                                   border-bottom: none;
                                   text-align: center;">

                            <!-- Ícono de llave -->
                            <div style="display:inline-block; background-color: rgba(249,115,22,0.12); border: 1px solid rgba(249,115,22,0.25); border-radius: 50%; width:64px; height:64px; line-height:64px; text-align:center; margin-bottom:16px;">
                                <span style="font-size:28px;">🔧</span>
                            </div>

                            <h1 style="margin:0; font-size:22px; font-weight:800; color:#ffffff; letter-spacing:-0.5px;">
                                Taller Automotriz
                            </h1>
                            <p style="margin:6px 0 0; font-size:13px; color:#94a3b8;">
                                Confirmación de cita de servicio
                            </p>
                        </td>
                    </tr>

                    <!-- Cuerpo principal -->
                    <tr>
                        <td style="background-color:#161e2e;
                                   border: 1px solid #23283b;
                                   border-top: none;
                                   border-bottom: none;
                                   padding: 36px 40px;">

                            <!-- Saludo -->
                            <p style="margin:0 0 8px; font-size:13px; color:#94a3b8; text-transform:uppercase; letter-spacing:0.08em; font-weight:600;">
                                Hola,
                            </p>
                            <h2 style="margin:0 0 20px; font-size:24px; font-weight:800; color:#ffffff;">
                                {{ $usuario }} 👋
                            </h2>

                            <p style="margin:0 0 28px; font-size:15px; color:#cbd5e1; line-height:1.7;">
                                Su cita en nuestro taller ha sido registrada exitosamente. A continuación encontrará el resumen de su cita:
                            </p>

                            <!-- Tarjeta de detalles -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="background-color:#0f111a; border: 1px solid #243c5a; border-radius:12px; overflow:hidden; margin-bottom:28px;">

                                <!-- Fila: Fecha -->
                                <tr style="border-bottom: 1px solid #1e293b;">
                                    <td style="padding:14px 20px; width:40%;">
                                        <p style="margin:0; font-size:11px; color:#94a3b8; text-transform:uppercase; letter-spacing:0.08em; font-weight:700;">📅 Fecha</p>
                                    </td>
                                    <td style="padding:14px 20px; border-left: 1px solid #1e293b;">
                                        <p style="margin:0; font-size:15px; color:#ffffff; font-weight:700;">{{ $fecha }}</p>
                                    </td>
                                </tr>

                                <!-- Fila: Hora -->
                                <tr style="border-bottom: 1px solid #1e293b;">
                                    <td style="padding:14px 20px; background-color:#0b0f19;">
                                        <p style="margin:0; font-size:11px; color:#94a3b8; text-transform:uppercase; letter-spacing:0.08em; font-weight:700;">🕐 Hora</p>
                                    </td>
                                    <td style="padding:14px 20px; border-left: 1px solid #1e293b; background-color:#0b0f19;">
                                        <p style="margin:0; font-size:15px; color:#ffffff; font-weight:700;">{{ $hora }}</p>
                                    </td>
                                </tr>

                                <!-- Fila: Vehículo -->
                                <tr style="border-bottom: 1px solid #1e293b;">
                                    <td style="padding:14px 20px;">
                                        <p style="margin:0; font-size:11px; color:#94a3b8; text-transform:uppercase; letter-spacing:0.08em; font-weight:700;">🚗 Vehículo</p>
                                    </td>
                                    <td style="padding:14px 20px; border-left: 1px solid #1e293b;">
                                        <p style="margin:0; font-size:15px; color:#ffffff; font-weight:700;">
                                            {{ $marca }}
                                            <span style="font-family: monospace; color:#f97316; font-size:13px; margin-left:6px; background:rgba(249,115,22,0.1); padding:2px 8px; border-radius:4px; border:1px solid rgba(249,115,22,0.2);">
                                                {{ $placa }}
                                            </span>
                                        </p>
                                    </td>
                                </tr>

                                <!-- Fila: Motivo -->
                                <tr>
                                    <td style="padding:14px 20px; background-color:#0b0f19;">
                                        <p style="margin:0; font-size:11px; color:#94a3b8; text-transform:uppercase; letter-spacing:0.08em; font-weight:700;">🔧 Motivo</p>
                                    </td>
                                    <td style="padding:14px 20px; border-left: 1px solid #1e293b; background-color:#0b0f19;">
                                        <p style="margin:0; font-size:15px; color:#ffffff; font-weight:600;">{{ $motivo }}</p>
                                    </td>
                                </tr>

                            </table>

                            <p style="margin:0; font-size:14px; color:#94a3b8; line-height:1.7;">
                                Si necesita reprogramar o cancelar su cita, comuníquese con nosotros con anticipación. ¡Gracias por confiar en nuestro taller!
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#111827;
                                   border: 1px solid #23283b;
                                   border-top: 2px solid #f97316;
                                   border-radius: 0 0 16px 16px;
                                   padding: 24px 40px;
                                   text-align: center;">
                            <p style="margin:0; font-size:12px; color:#4b5563;">
                                Este es un mensaje automático, por favor no responda este correo.
                            </p>
                            <p style="margin:8px 0 0; font-size:12px; color:#4b5563;">
                                &copy; {{ date('Y') }} Taller Automotriz. Todos los derechos reservados.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>