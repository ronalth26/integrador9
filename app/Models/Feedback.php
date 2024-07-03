<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'descripcion',
        'fecha',
        'hora',
        'estado_feedback',
        'id_user',
        'id_admin',
        'tipo',
         // Añadir el campo 'estado_feedback' al $fillable
    ];

    // Definir la relación con TipoFeedback
    public function tipof()
    {
        return $this->belongsTo(TipoFeedback::class, 'tipo');
    }
    public function estadof()
    {
        return $this->belongsTo(EstadoFeedback::class, 'estado_feedback');
    }
    public function tipoFeedback()
    {
        return $this->belongsTo(TipoFeedback::class, 'tipo');
    }
     public function estadoFeedback()
    {
        return $this->belongsTo(EstadoFeedback::class, 'estado_feedback');
    }
}

    