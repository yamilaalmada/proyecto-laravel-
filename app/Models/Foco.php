<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foco extends Model

{
     protected $fillable = ['codigo', 'ubicacion'];

    public function historialFocos()
    {
        return $this->hasMany(HistorialFoco::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}


