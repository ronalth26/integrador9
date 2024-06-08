<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacitado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'id_tipo',
        'grado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
