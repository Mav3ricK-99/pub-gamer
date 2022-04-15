<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoria_id';

    public function subcategoria(){
        return $this->hasMany(Subcategoria::class, 'categoria_id');
    }
}
