<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Cita;
use App\Mail\sendMail;

class CitaController extends Controller
{
    public function index(){
        if(Auth::user()->super_user){
            $citas = Cita::all();
        }else{
            $citas = Cita::whereHas('vehiculo', function ($query){
                $query->where('user_id', Auth::id());
            })->with('vehiculo')->get();
        }
        
        return view('citas.index', compact('citas'));
    }

    public function create(){
        $vehiculos = Auth::user()->vehiculos;

        return view('citas.create', compact('vehiculos'));
    }

    public function store(Request $request){

        $request->validate([
            'vehiculo_id'=> 'required|exists:vehiculos,id',
            'fecha'=> 'required|date',
            'hora'=> 'required',
            'motivo'=> 'required|max:255'
        ]);

          
        $cita = Cita::create([
            'vehiculo_id' => $request->vehiculo_id,
            'fecha' => $request->fecha,
            'hora'  => $request->hora,
            'motivo' => $request->motivo,
            'agendada' => true,
        ]);

        Mail::to(Auth::user()->email)->send(new sendMail($cita));

        return redirect()->route('citas.index');
    }

    public function edit(Cita $cita){

        if ($cita->vehiculo->user_id !== Auth::id()){
            abort(403);
        }

        $vehiculos = Auth::user()->vehiculos;
        return view('citas.edit', compact('vehiculos','cita'));
    }

    public function update(Request $request, Cita $cita){

        if ($cita->vehiculo->user_id !== Auth::id()){
            abort(403);
        }

        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|max:255'
        ]);


        $cita->update([
            'vehiculo_id' => $request->vehiculo_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
        ]);

        return redirect()->route('citas.index');
    }

    public function destroy(Cita $cita){

        if ($cita->vehiculo->user_id !== Auth::id()) {
            abort(403);
        }

        $cita->delete();

        return redirect()->route('citas.index');
    }
}
