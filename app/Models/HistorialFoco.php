<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialFoco extends Model
{
    use HasFactory;

    protected $fillable = [
        'foco_id',
        'estado',
        'fecha'
    ];

    // Cada historial pertenece a un foco
    public function foco()
    {
        return $this->belongsTo(Foco::class);
    }
}
