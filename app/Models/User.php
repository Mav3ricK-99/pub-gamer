<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\Models\Cart;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password'
    ];

    protected $appends = [
        'permisos'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPermisosAttribute(){
        
        $permisos = [];
        foreach($this->roles as $rol){
            array_push($permisos, $rol->getPermisosPorRol());
        }

        return Arr::flatten($permisos);
    }

    public function asignarRol($role) {
        $role = Role::where('descripcion', $role)->get()->first();
        return $this->roles()->save($role); 
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }
}
