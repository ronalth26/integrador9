<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDiscapacidad extends Model
{
    use HasFactory;

    protected $table = 'tipo_discapacidad';
    protected $fillable = ['nombre'];
    
}
