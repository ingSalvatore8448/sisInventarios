<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table="persona";
       protected $primaryKey="idPersona";
    public $timestamps=false;
   
   protected $fillable=[
        'nombre',
        'apellido_Paterno',
        'apellido_Materno',
        'telefono',
        'dni',
        'correo',
        'sexo',
        'Fecha_cumple',
        'Rol_idRol',
        'Departamento_idDepartamento',
         'imagen',
   


    ];

 }
