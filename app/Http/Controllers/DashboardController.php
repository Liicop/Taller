<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cita;
use App\Models\Repuesto;
use App\Models\Vehiculo;

class DashboardController extends Controller
{
    public function index(){

        if (Auth::user()->super_user) {
            
            $total_clientes = User::where('super_user', false)->count();

            $total_vehiculos = Vehiculo::count();

            $total_citas = Cita::where('agendada', true)->count();

            $total_repuestos = Repuesto::sum('cantidad');

            return view('dashboard', compact(
                    'total_clientes', 'total_vehiculos', 
                    'total_citas', 'total_repuestos'));
        } else {
            $mis_vehiculos = Vehiculo::where('user_id', Auth::user()->id)->get();

            $mis_citas = Cita::whereIn('vehiculo_id', $mis_vehiculos->pluck('id'))->count();

            #$mis_vehiculos = $mis_vehiculos->count();

            return view('dashboard', compact(
                'mis_vehiculos', 'mis_citas'
            ));
        }

        
    }
}
