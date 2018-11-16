<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table="inventarios";
    protected $primaryKey="iddetalleMobiliario";
    public $timestamps=false;

    protected $fillable=[
        'DescripMobiliario',
        'RegisFechaMobi',
        'EstadoMob',
        'Persona_idPersona',
        'Mobiliario_idMobiliario',

    ];

}
