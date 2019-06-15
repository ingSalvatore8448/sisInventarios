<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\Mobiliarios;
use Inventario\Categoria;
use Inventario\Departamentos;
use Yajra\Datatables\Datatables;
use DB;

class MobiUserController extends Controller
{


    public function index()

    {

        return view('MobiResponsable.lisUser');

    }
public function listarrrr(Request $request,$id){
    $mobi=DB::select("
      SELECT m.idMobiliario, m.nombre_Mobi,m.marca_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi,m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen , d.nombre_depar,c.nombre_cate 
        FROM mobiliario as m , departamento as d , categorias as c WHERE m.Departamento_idDepartamento=d.idDepartamento 
         and m.categoria_idcategoria=c.idcategoria and m.idPersona=$id
        ");
    if ($request->ajax()){
        return Datatables::of($mobi)
            ->addColumn('action', function ($id){
                return ' <a data-toggle="modal" data-target="#updatePro" onclick="editarMobi('.$id->idMobiliario.')" class="btn btn-warning"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong></strong></span>            
    </a>
     <a  onclick="delteMobi('.$id->idMobiliario.')" data-toggle="modal" data-target="#deletMobi" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        <span><strong></strong></span>            
    </a>
    
    ';
            })->addColumn('imagen', function ($mobi){
                $url= asset('Imagenes/Mobiliario/'.$mobi->imagen);
                return '<img src="'.$url.'"  height="60px" width="60px"/>';


            })->rawColumns(['imagen', 'action'])->make(true);
    }


}
    public function cargardatos($id){
        $mobiliario=Mobiliarios::findOrFail($id);
        $departamento=Departamentos::all();
        $categoria=Categoria::all();
$datos=array('mobi'=>$mobiliario,'depa'=>$departamento,'categoriass'=>$categoria);
        return response()->json($datos);


    }
}
