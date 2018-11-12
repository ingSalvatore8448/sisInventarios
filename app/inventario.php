<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table="inventarios";
    protected $primaryKey="	idinventario";
    public $timestamps=false;

    protected $fillable=[
        'DescripMobiliario',
        'RegisFechaMobi',
        'CantidadMobi',
        'EstadoMob',
        'Persona_idPersona',
        'Mobiliario_idMobiliario',

    ];
    public function persona(){
        return $this->hasMany(Inventario/Persona,'idPersona','idMobiliario');
    }
}
