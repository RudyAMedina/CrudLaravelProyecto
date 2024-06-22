<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion'];
    public function posts()
        {
            return $this->hasMany(ModeloCrud::class);
        }
}
