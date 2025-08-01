<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialUsoAireAcondicionado extends Model
{
    use HasFactory;

    protected $fillable = [
        'aire_acondicionado_id',
        'estado',
        'fecha'
    ];

    public function aireAcondicionado()
    {
        return $this->belongsTo(AireAcondicionado::class);
    }
}
