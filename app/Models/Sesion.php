<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;
    protected $table = 'sesiones';
    protected $fillable = [
        'numero',
        'seguimiento_id',
        'fecha_inicio',
        'fecha_fin',
        'medicación',
        'diagnóstico',
        'observaciones',
        'resultado',
        'estado',
    ];

    public function seguimiento()
    {
        return $this->belongsTo(Seguimiento::class);
    }
}
