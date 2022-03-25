<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Permiso;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'descripcion',
    ];

    protected static function booted()
    {
        static::deleting(function ($rol) {
            $rol->permisos()->detach();
            $rol->users()->detach();
        });
    }

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function getPermisosArray(){

        $permisosArray = [];
        foreach($this->permisos as $permisos){
            array_push($permisosArray, $permisos->permiso);
        }

        return $permisosArray;
    }
}
