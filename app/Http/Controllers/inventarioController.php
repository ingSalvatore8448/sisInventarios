<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Yajra\Datatables\Datatables;
class inventarioController extends Controller
{

    public function listar(){

        return view('Inventario.inventario');
    }
    public function listarMobiID(Request $request,$id)

    {
        $mobi=DB::select("
      SELECT m.idMobiliario, m.nombre_Mobi,m.marca_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi,
      m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen ,
       d.nombre_depar,c.nombre_cate FROM mobiliario as m , departamento as d , categorias 
       as c , persona as p WHERE m.Departamento_idDepartamento=d.idDepartamento 
       and m.categoria_idcategoria=c.idcategoria AND m.idPersona=p.idPersona and m.idPersona=45
        ");
        if ($request->ajax()){
            return Datatables::of($mobi)
                ->addColumn('action', function ($id){
                    return ' <a   data-toggle="modal" data-target="#updatePro" onclick="Vincular('.$id->idMobiliario.')" class="btn bg-navy margin">Inventario<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong></strong></span>            
    </a>
   
    
    ';})->rawColumns(['action'])->make(true);
        }



    }

    public function carData($id){
        $mobi=DB::select("SELECT m.idMobiliario,m.marca_Mobi,m.nombre_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi,m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen,m.codigo FROM mobiliario as m ,departamento as d, categorias as c WHERE m.Departamento_idDepartamento=d.idDepartamento
 and m.categoria_idcategoria=c.idcategoria AND m.idMobiliario=$id");
        $depar=Departamentos::all();
        $cate=Categoria::all();
        $data=array('mobi'=>$mobi,'depa'=>$depar,'cate'=>$cate);

        return response()->json($data);
    }






    public function cargarCliente(){
        $Cliente=Input::get('texto');
        $resulta=array();
        $query=DB::select("SELECT p.idPersona,p.nombre,p.apellido_Paterno,p.apellido_Materno FROM persona as p  WHERE  p.nombre
LIKE '%".$Cliente."%' OR p.apellido_Paterno LIKE '%".$Cliente."%' OR p.apellido_Materno LIKE '%".$Cliente."%'");
        foreach ($query as $quer)
        {
            $resulta[] = ['idpersona' => $quer->idPersona,  'value' =>$quer->nombre.' '.$quer->apellido_Paterno.' '.$quer->apellido_Materno];
        }
        $data=array('hecho'=>'si','list_cliente'=>$resulta);

        echo json_encode($data);
    }
}
