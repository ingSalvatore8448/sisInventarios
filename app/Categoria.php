<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table="categorias";
    protected $primaryKey="idcategoria";

    public $timestamps=false;

    protected $fillable=[
        'nombre_cate',
   

    ];
}
