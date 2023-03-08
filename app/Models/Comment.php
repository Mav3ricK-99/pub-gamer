<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comentarios';

    protected $fillable = [
        'user_id',
        'mensaje',
        'comentable_type',
    ];
    
    public function comentable()
    {
        return $this->morphTo();
    }

    public function respuestas()
    {
        return $this->morphMany(Comment::class, 'comentable', Comment::class);
    }

    public function user(){

        return $this->belongsTo(User::class, 'autorComentario');
    }

    public function post(){
        
        return $this->belongsTo(Post::class);
    }

}
