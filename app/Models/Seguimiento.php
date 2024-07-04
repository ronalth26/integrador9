<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'especialista_id',
        'estado',
        'observaciones',
        'medicacion',
        'diagnostico',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }

    public function especialista()
    {
        return $this->belongsTo(User::class, 'especialista_id');
    }

    public function estadoSeguimiento()
    {
        return $this->belongsTo(EstadoSeguimiento::class, 'estado');
    }

    public function sesiones()
    {
        return $this->hasMany(Sesion::class);
    }
}
