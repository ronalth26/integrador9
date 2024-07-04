<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSeguimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    // Relación uno a muchos con seguimientos
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class, 'estado');
    }
}
