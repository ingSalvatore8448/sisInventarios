<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class PartesModel extends Model
{
    protected $table='partesmobi';
    protected $primaryKey='idpartes';
    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'marca',
        'serie',
        'cantidad',
        'descripcion',
        'Mobiliario_idMobili',
        'codigo',

        ];
}
