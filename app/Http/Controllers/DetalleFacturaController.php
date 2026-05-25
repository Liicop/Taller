<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Repuesto;
use App\Models\Factura;
use App\Models\DetalleFactura;

class DetalleFacturaController extends Controller
{
    public function store(Request $request, Factura $factura){

        $request->validate([
            'repuesto_id' => 'required|exists:repuestos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $repuesto = Repuesto::findOrFail($request->repuesto_id);

        if ($repuesto->cantidad < $request->cantidad){
            return back()->withErrors([
                'cantidad' => 'No hay suficiente inventario'
            ]);
        }

        $subtotal = $repuesto->precio * $request->cantidad;

        DetalleFactura::create([
            'factura_id' => $factura->id,
            'repuesto_id' => $repuesto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $repuesto->precio,
            'subtotal' => $subtotal,
        ]);

        $repuesto->decrement('cantidad', $request->cantidad);

        $total = $factura->detalles->sum('subtotal');

        $factura->update([
            'total' => $total,
        ]);

        return back()->with('success', 'Repuesto agregado correctamente');

    }

    public function destroy(DetalleFactura $detalle){
           
        $repuesto = $detalle->repuesto;

        $repuesto->increment('cantidad', $detalle->cantidad);

        $factura = $detalle->factura;

        $detalle->delete();

        $total = $factura->detalles->sum('subtotal');

        $factura->update([
            'total' => $total,
        ]);

        return back();
    }
}
