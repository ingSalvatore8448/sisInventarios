<?php

namespace Inventario;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
       protected $table='users';
   protected $primaryKey='id';

 public $timestamps=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','Persona_idPersona' ,'created_at','idRol',
        'updated_at','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    


    public function rol()
    {
        return $this->hasMany(Inventario/Rol,'idRol','id');
    }
}
