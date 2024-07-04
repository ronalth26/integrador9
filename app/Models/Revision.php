<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Revision extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_revision';

    protected $fillable = ['id_revision','id_especialista', 'hora', 'fecha', 'estado','pdf'];

    public function especialista()
    {
        return $this->belongsTo(User::class, 'id_especialista');
    }
     // Deshabilitar los timestamps
     public $timestamps = false;
}
