<?php

namespace Inventario\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Inventario\Departamentos;
use Inventario\Categoria;
use Inventario\inventario;
use Inventario\Mobiliarios;
use Yajra\Datatables\Datatables;
use Validator;
class inventarioController extends Controller
{

    public function listar(){

        return view('Inventario.inventario');
    }
    public function listarMobiID(Request $request,$id)

    {

        $mobi=DB::select("SELECT m.idMobiliario, m.nombre_Mobi,m.marca_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi, m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen ,m.idPersona ,Concat(p.nombre,' ',p.apellido_Paterno,' ',p.apellido_Materno) as fulname, d.nombre_depar,c.nombre_cate FROM mobiliario as m , departamento as d , categorias as c , users as u, persona as p WHERE m.Departamento_idDepartamento=d.idDepartamento and m.categoria_idcategoria=c.idcategoria AND m.idPersona=p.idPersona and u.Persona_idPersona=p.idPersona and u.idRol>1 and m.idPersona=$id");


        if ($request->ajax()){
            return Datatables::of($mobi)
                ->addColumn('action', function ($id){
                    return ' <a   data-toggle="modal" data-target="#updatePro" onclick="Vincular('.$id->idMobiliario.')" class="btn bg-navy margin">Inventario<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong></strong></span>            
    </a>
   
    
    ';})->rawColumns(['action'])->make(true);
        }
    }

    public function CargarMobi($id){
        $mobi=DB::select("SELECT m.idMobiliario,m.marca_Mobi,m.nombre_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi,m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen,m.codigo,p.idPersona,p.nombre,p.apellido_Paterno,p.apellido_Materno FROM mobiliario as m ,departamento as d, categorias as c ,persona as p WHERE m.Departamento_idDepartamento=d.idDepartamento and m.idPersona=p.idPersona and m.categoria_idcategoria=c.idcategoria AND m.idMobiliario=$id");
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

    public function RegisInv(Request $request,$id){
        $valida=[
            'estado'=>'required | max:50 ',
            'fecha_regi'=>'required | max:50',
            'descripcion'=>'required | max:50',



        ];
        $validate=Validator::make(Input::all(),$valida);

        if($validate->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{

            $mobis=Mobiliarios::find($id);
            $inven=new  inventario();
            $inven->DescripMobiliario=$request->get('descripcion');
            $inven->RegisFechaMobi=$request->get('fecha_regi');
            $inven->EstadoMob=$request->get('estado');
            $inven->Persona_idPersona=$request->get('idpersona');
            $inven->Mobiliario_idMobiliario=$mobis->idMobiliario;
            $inven->save();

        }
        return response()->json($inven);

    }

    public function Histo(){
       return view('Inventario.historial');
    }
    public function cargarHis(Request $request,$id)
    {


        $mobi = DB::select("SELECT i.iddetalleMobiliario,m.idMobiliario, m.nombre_Mobi,m.marca_Mobi,Concat( m.comentario,' -- ',m.serie_Mobi) as comse,m.estado,m.fecaRe_Mobi, m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen ,m.idPersona ,Concat(p.nombre,' ',p.apellido_Paterno,' ',p.apellido_Materno) as fulname, d.nombre_depar,c.nombre_cate ,i.DescripMobiliario,i.RegisFechaMobi,i.EstadoMob FROM mobiliario as m , departamento as d , categorias as c , inventarios as i, users as u, persona as p WHERE m.Departamento_idDepartamento=d.idDepartamento and m.categoria_idcategoria=c.idcategoria AND m.idPersona=p.idPersona and u.Persona_idPersona=p.idPersona and u.idRol>1 and i.Persona_idPersona=p.idPersona and i.Mobiliario_idMobiliario=m.idMobiliario and i.Persona_idPersona=$id");
        if ($request->ajax()){
            return Datatables::of($mobi)
                ->addColumn('action', function ($id){
                    return ' <a data-toggle="modal" data-target="#updaInv" onclick="actualizaIn('.$id->iddetalleMobiliario.')" class="btn btn-warning"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong></strong></span>            
    </a>
    
    ';})->rawColumns([ 'action'])->make(true);
        }

    }

        public function listarhi(){
            return view('Inventario.histoGene');
        }
        public function HistoGene(){
            $mobi=DB::select("SELECT inventarios.DescripMobiliario,inventarios.RegisFechaMobi,inventarios.EstadoMob,Concat(persona.nombre,' ',persona.apellido_Paterno,' ',persona.apellido_Materno) as fullname ,mobiliario.nombre_Mobi,mobiliario.marca_Mobi,Concat(mobiliario.comentario,' ',mobiliario.serie_Mobi) as comse,mobiliario.estado,mobiliario.fecaRe_Mobi,mobiliario.imagen,departamento.nombre_depar,categorias.nombre_cate FROM inventarios ,persona ,mobiliario,departamento,categorias WHERE inventarios.Persona_idPersona=persona.idPersona and inventarios.Mobiliario_idMobiliario=mobiliario.idMobiliario and mobiliario.Departamento_idDepartamento=departamento.idDepartamento and mobiliario.categoria_idcategoria=categorias.idcategoria");
            return Datatables::of($mobi)
            ->make(true);

        }

        public function CargarHisto($id){
            $mobi = DB::select("SELECT i.iddetalleMobiliario,m.idMobiliario, m.nombre_Mobi,m.marca_Mobi,m.comentario,m.serie_Mobi,m.estado,m.fecaRe_Mobi, m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen ,m.idPersona ,p.nombre,p.apellido_Paterno,p.apellido_Materno, d.nombre_depar,c.nombre_cate ,i.DescripMobiliario,i.RegisFechaMobi,i.EstadoMob FROM mobiliario as m , departamento as d , categorias as c , inventarios as i, users as u, persona as p WHERE m.Departamento_idDepartamento=d.idDepartamento and m.categoria_idcategoria=c.idcategoria AND m.idPersona=p.idPersona and u.Persona_idPersona=p.idPersona and u.idRol>1 and i.Persona_idPersona=p.idPersona and i.Mobiliario_idMobiliario=m.idMobiliario and i.iddetalleMobiliario=$id");
            $depar=Departamentos::all();
            $cate=Categoria::all();
            $data=array('mobi'=>$mobi,'depa'=>$depar,'cate'=>$cate);

            return response()->json($data);
        }

        public  function actualizarInv(Request $request,$id){

            $valida=[
                'estado'=>'required | max:50 ',
                'fecha_regi'=>'required | max:50',
                'descripcion'=>'required | max:50',



            ];
            $validate=Validator::make(Input::all(),$valida);

            if($validate->fails()){
                return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
            }else{

                $inven= inventario::find($id);
                $inven->DescripMobiliario=$request->get('descripcion');
                $inven->RegisFechaMobi=$request->get('fecha_regi');
                $inven->EstadoMob=$request->get('estado');
                $inven->update();

            }
            return response()->json($inven);

        }





}
