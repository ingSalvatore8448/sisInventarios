<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Mobiliarios extends Model
{
    protected $table="mobiliario";
    protected $primaryKey="idMobiliario";
     public $timestamps=false;

    protected $fillable=[
        'nombre_Mobi',
        'marca_Mobi',
        'serie_Mobi',
        'cantidad_Mobi',
        'estado',
        'fecaRe_Mobi',
        'comentario',
        'Departamento_idDepartamento',
        'categoria_idcategoria',
         'imagen',
   

    ];

}
