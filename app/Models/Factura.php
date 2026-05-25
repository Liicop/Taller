<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cita;
use App\Models\DetalleFactura;

class Factura extends Model
{
    /** @use HasFactory<\Database\Factories\FacturaFactory> */
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'total',
        'pdf_path',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function detallefactura(){
        return $this->hasMany(DetalleFactura::class);
    }

    public function detalles(){
        return $this->hasMany(DetalleFactura::class);
    }
}
