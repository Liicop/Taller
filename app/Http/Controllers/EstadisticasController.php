<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Cita;
use App\Models\Vehiculo;
use App\Models\DetalleFactura;
use App\Models\Factura;


class EstadisticasController extends Controller
{

    public function index()
    {

        $citasPorMes = Cita::selectRaw(
            'EXTRACT(MONTH FROM fecha) as mes,
            COUNT(*) as total'
        )
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();

        $nombresMeses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        $citasPorMes->transform(function ($cita) use ($nombresMeses) {
            $cita->mes = $nombresMeses[$cita->mes] ?? $cita->mes;
            return $cita;
        });

        $vehiculosPorMarca = Vehiculo::select('marca')
        ->selectRaw('COUNT(*) as total')->groupBy('marca')->get();

        return view('estadisticas.index', compact('citasPorMes', 'vehiculosPorMarca'));
    }
}
