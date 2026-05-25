<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Factura;


class DetalleFactura extends Model
{
    /** @use HasFactory<\Database\Factories\DetalleFacturaFactory> */
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'repuesto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    public function factura(){
        return $this->belongsTo(Factura::class);
    }

    public function repuesto(){
        return $this->belongsTo(Repuesto::class);
    }
}
