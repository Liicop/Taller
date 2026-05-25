<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Factura;
use App\Models\Repuesto;
use Illuminate\Support\Facades\Auth;


class FacturaController extends Controller
{
    
    public function index(){

        if(Auth::user()->super_user){
           $facturas = Factura::all(); 
        }

        else{
           $facturas = Factura::whereHas('cita.vehiculo', function ($query){
                $query->where('user_id', Auth::id());
            })->get();
        }
        
        return view('facturas.index', compact('facturas'));
    }
    
    public function show(Factura $factura){
        $factura->load('detalles.repuesto', 'cita.vehiculo');

        $repuestos = Repuesto::all();

        return view('facturas.show', compact('factura', 'repuestos'));
    }
    
    public function get_factura_by_id(Factura $factura){

        $factura = Factura::find($factura->id)->load('detalles.repuesto', 'cita.vehiculo');

        if(!Auth::user()->super_user && $factura->cita->vehiculo->user_id != Auth::id()){
            return response()->json([
                'message' => 'No tienes permiso para ver esta factura'
            ], 403);
        }

        return view('facturas.get_factura_by_id', compact('factura'));
    }

    public function store(Request $request){

        $request->validate([
            'cita_id' => 'required|exists:citas,id',
        ]);

        $factura = Factura::create([
            'cita_id' => $request->cita_id,
            'total' => 0,
        ]);

        $factura->cita->update([
            'agendada' => false,
        ]);

        return redirect()->route('facturas.show', $factura);
    }
}
