<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;

use Illuminate\Support\Facades\Storage;

class RepuestoController extends Controller
{
    public function index(){

        $repuestos = Repuesto::all();

        return view('repuestos.index', compact('repuestos'));
    }

    public function create(){
        return view('repuestos.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required|max:150',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|max:2048'

        ]);

        $path =null;

        if ($request->hasFile('imagen')){
            
            $path = $request->file('imagen')->store('repuestos', 'public');
        }

        Repuesto::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'imagen' => $path,
        ]);

        return redirect()->route('repuestos.index');
    }

    public function edit(Repuesto $repuesto){
        return view('repuestos.edit', compact('repuesto'));
    }

    public function update(Request $request, Repuesto $repuesto){

         $request->validate([
            'codigo' => 'required',
            'nombre' => 'required|max:150',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $path = $repuesto->imagen;

        if ($repuesto->imagen && 
        Storage::disk('public')->exists($repuesto->imagen)){

            Storage::disk('public')->delete($repuesto->imagen);
        }

        $path = $request->file('imagen')->store('repuestos', 'public');

        $repuesto->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'imagen' => $path,
        ]);

        return redirect()->route('repuestos.index');
    }

    public function destroy(Repuesto $repuesto){

        if( $repuesto->imagen &&
        Storage::disk('public')->exists($repuesto->imagen)){

            Storage::disk('public')->delete($repuesto->imagen);
        }

        $repuesto->delete();

        return redirect()->route('repuestos.index');
    }
}