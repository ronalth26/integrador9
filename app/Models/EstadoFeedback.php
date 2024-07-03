<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoFeedback extends Model
{
    use HasFactory;
    protected $fillable = ['estado','descripcion'];
     // Definir la relación inversa con Feedback
     public function feedbacks()
     {
         return $this->hasMany(Feedback::class, 'estado_feedback');
     }
}
