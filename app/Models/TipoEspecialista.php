<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEspecialista extends Model
{
    use HasFactory;

    protected $table = 'tipo_especialista';
    protected $fillable = ['nombre'];
    
}
