<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    public function index(Request $request){
        $vehiculos = $request->user()->vehiculos;

        return view(
            'vehiculos.index', 
            compact('vehiculos')
        );
    }
    public function create(){
        return view('vehiculos.create');
    }

    public function store(Request $request){
        Vehiculo::create([
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
            'user_id' => $request->user()->id
        ]);
        return redirect()->route('vehiculos.index');
    }

    public function edit(Vehiculo $vehiculo){

        if ($vehiculo->user_id !== Auth::id()){

            abort(403);
        }
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo){
        
        if ($vehiculo->user_id !== $request->user()->id){
            abort(403);
        }

        $vehiculo->update([
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
        ]);

        return redirect()->route('vehiculos.index');
    }

    public function destroy(Vehiculo $vehiculo){

        if ($vehiculo->user_id !== Auth::id()){
            abort(403);
        }

        $vehiculo->delete();

        return redirect()->route('vehiculos.index');
    }
}
