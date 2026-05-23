<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Vehiculo;

class Cita extends Model
{
    /** @use HasFactory<\Database\Factories\CitaFactory> */
    use HasFactory;

    protected $fillable = [
        'vehiculo_id',
        'fecha',
        'hora',
        'motivo',
        'agendada',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
