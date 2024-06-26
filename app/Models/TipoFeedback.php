<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFeedback extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion'];
     // Definir la relación inversa con Feedback
     public function feedbacks()
     {
         return $this->hasMany(Feedback::class, 'tipo');
     }
}
