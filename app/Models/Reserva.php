<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['materia_id', 'horario_id', 'foco_id', 'aire_acondicionado_id'];

    public function materia() {
        return $this->belongsTo(Materia::class);
}

    public function horario() {
        return $this->belongsTo(Horario::class);
    }

    public function foco() {
        return $this->belongsTo(Foco::class);
    }

    public function aireAcondicionado() {
        return $this->belongsTo(AireAcondicionado::class);
    }
}

