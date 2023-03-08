<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

//Quitar este modelo?
class Post extends Model
{
    use HasUuids;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'producto_id',
    ];

    protected $table = 'publicaciones';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function comments()
    {            
        return $this->morphMany(Comment::class, 'comentable', Post::class);
    } 

    public function user(){
        return $this->belongsTo(User::class, 'autor');
    }
}
