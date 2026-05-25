<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DetalleFactura;

class Repuesto extends Model
{
    /** @use HasFactory<\Database\Factories\RepuestoFactory> */
    use HasFactory;
    
    protected $fillable = [
        'codigo',
        'nombre',
        'cantidad',
        'precio',
        'imagen'
    ];

    public function detallefactura(){
        return $this->hasMany(DetalleFactura::class);
    }
}
