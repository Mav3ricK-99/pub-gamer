<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';

    public function category(){
        return $this->belongsTo(Category::class, 'categoria_id');
    }

    public function product(){
        return $this->hasMany(Product::class, 'categoria');
    }
}
