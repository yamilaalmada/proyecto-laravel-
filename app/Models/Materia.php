<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'docente_id'];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
