<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloCrud extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = ['title', 'slug', 'content', 'category_id', 'description',
    'posted', 'image'];

    public function category()
        {
            return $this->belongsTo(categorias::class);
        }
}
