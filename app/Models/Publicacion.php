<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class Publicacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'producto_id',
        'autorPublicacion',
        'comentarios',
    ];

    protected $table = 'publicaciones';

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function comentarios()
    {            
        return $this->morphMany(Comentario::class, 'comentable')->whereNull('respuesta_id');
    } 

    public function user(){
        return $this->belongsTo(User::class, 'autorPublicacion');
    }
}
