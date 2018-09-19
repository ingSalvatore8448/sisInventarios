<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table='departamento';
    
     protected $primaryKey="idDepartamento";
    public $timestamps=false;

    protected $fillable=[
    	 'nombre_depar',
    ];

}
