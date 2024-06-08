<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    use HasFactory;

    protected $fillable = [
        'licencia',
        'id_user',
        'tipo_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
