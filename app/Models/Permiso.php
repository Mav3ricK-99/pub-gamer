<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class Permiso extends Model
{
    use HasFactory;

    protected $fillable = [
        'permiso',
        'role_id'
    ];

    protected static function booted()
    {
        static::deleting(function ($permiso) {
            $permiso->roles()->detach();
        });
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    
}
