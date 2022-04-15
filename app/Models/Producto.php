<?php

namespace App\Models;

use App\Events\ProductoIsCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use App\Models\Publicacion;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombreProducto',
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
        'created' => ProductoIsCreated::class,
    ];

    public static function productoTieneStock(Producto $prod, $stock){

        return true ? Producto::find($prod->id)->stock >= $stock : false;
    }

    public function categoria(){
        return $this->belongsTo(Subcategoria::class, 'categoria');
    }

    public function publicacion()
    {
        return $this->hasOne(Publicacion::class);
    }

}
