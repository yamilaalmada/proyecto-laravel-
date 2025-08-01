<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'email'];

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}
