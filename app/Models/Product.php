<?php

namespace App\Models;

use App\Events\ProductIsCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use Spatie\Tags\HasTags;

class Product extends Model
{
    use HasTags;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'stock',
        'precio',
        'subcategoria',
        'fabricante',
        'descripcion',
        'sku',
        'garantia',
        'path_imagen',
    ];

    protected $dispatchesEvents = [
        'created' => ProductIsCreated::class,
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }

}
