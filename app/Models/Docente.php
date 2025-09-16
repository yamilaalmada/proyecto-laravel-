<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'materia',
        'hora_clase',
        'curso',
        'estado'
    ];

    protected $casts = [
        'hora_clase' => 'datetime:H:i',
    ];
}