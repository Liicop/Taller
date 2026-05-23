<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Cita;

class Vehiculo extends Model
{
    /** @use HasFactory<\Database\Factories\VehiculoFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cita(){
        return $this->hasMany(Cita::class);
    }

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'color',
        'user_id'
    ];
}
