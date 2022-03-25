<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Publicacion;

class Comentario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'autorComentario',
        'mensaje',
    ];

    public function respuestas()
    {            
        return $this->hasMany(Comentario::class, 'respuesta_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'autorComentario');
    }

    public function publicacion(){
        
        return $this->belongsTo(Publicacion::class);
    }

}
