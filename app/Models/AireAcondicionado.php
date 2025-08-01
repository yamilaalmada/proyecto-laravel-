<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AireAcondicionado extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'ubicacion'
    ];

    // Relación con su historial de uso
    public function historiales()
    {
        return $this->hasMany(HistorialUsoAireAcondicionado::class);
    }

    // Puede estar en muchas reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
