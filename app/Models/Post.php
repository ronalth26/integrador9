<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'status',
        'id_user',
        'id_category',
    ];

    // Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    // Relación muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relación uno a uno polimórfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
