<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inventario\Http\Requests;
use Inventario\Mobiliarios;
use Inventario\Categoria;
use Inventario\PartesModel;
use Inventario\Departamentos;
use Inventario\Persona;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Inventario\Http\Requests\DepartamentosRequest;
use Inventario\Http\Requests\CategoriaFormRequest;
use Inventario\Http\Requests\Mobiliariorequest;
use Inventario\Http\Requests\MobiRes;
use Validator;
use DB;
use Yajra\Datatables\Datatables;
use Mockery\Exception;

class MobiliarioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $mobi=DB::select("
        SELECT m.idMobiliario, m.nombre_Mobi,m.marca_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi,m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen , d.nombre_depar,c.nombre_cate 
        FROM mobiliario as m , departamento as d , categorias as c WHERE m.Departamento_idDepartamento=d.idDepartamento
         and m.categoria_idcategoria=c.idcategoria
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

        return view('Mobiliarios.listaMobi');
    }




    public function actualizar( Request $request,$id){
        $array=[

            'nombre'=>'required',
            'marca_mobi'=>'required',
            'serie_mobi'=>'required',
            'departamento'=>'required',
            'Categoria'=>'required',
            'fecha_regi'=>'required',
        ];
        $valida=Validator::make(Input::all(),$array);
        if ($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));

        }else{
            $mobiliario=Mobiliarios::findOrFail($id);
            $mobiliario->nombre_Mobi=$request->get('nombre');
            $mobiliario->marca_Mobi=$request->get('marca_mobi');
            $mobiliario->serie_Mobi=$request->get("serie_mobi");
            $mobiliario->fecaRe_Mobi=$request->get("fecha_regi");
            $mobiliario->estado=$request->get('estado');
            $mobiliario->comentario=$request->get("comentario");
            $mobiliario->Departamento_idDepartamento=$request->get('departamento');
            $mobiliario->categoria_idcategoria=$request->get('Categoria');
            if(Input::hasFile('imagen')){
                $file=Input::file('imagen');
                $file->move(Storage_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
                $mobiliario->imagen=$file->getClientOriginalName();

            }
            $mobiliario->update();
        }

   
        return response()->json($mobiliario);

    }



       public function CrearMobi(){
        $mobiliario=Categoria::all();
        $departamento=Departamentos::all();
        $persona=DB::select("SELECT Concat(nombre,' ',apellido_Paterno,' ',apellido_Materno) as nombres,idPersona,telefono,dni,sexo,Fecha_cumple,Rol_idRol,Departamento_idDepartamento FROM persona");
        return view('Mobiliarios.createRespo',['categoria'=>$mobiliario,'departamento'=>$departamento,'perso'=>$persona]);
       }

       public function registrar(Mobiliariorequest $request){

           $mobiliario=new Mobiliarios();
           $mobiliario->nombre_Mobi=$request->get('nombre');
           $mobiliario->marca_Mobi=$request->get('marca');
           $mobiliario->serie_Mobi=$request->get("serie");
           $mobiliario->estado=$request->get('estado');
           $mobiliario->fecaRe_Mobi=$request->get("fecha");
           $mobiliario->comentario=$request->get("comentario");
           $mobiliario->Departamento_idDepartamento=$request->get('nombre_depar');
           $mobiliario->categoria_idcategoria=$request->get('nombre_cate');
           $mobiliario->idPersona=$request->get('persona');
           if(Input::hasFile('imagen')){
               $file=Input::file('imagen');
               $file->move(public_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
               $mobiliario->imagen=$file->getClientOriginalName();


           }

           $mobiliario->save();

           return Redirect::to('mobiliario');

       }


       public function getpartes(){
        $departamento=Departamentos::all();
        $categoria=Categoria::all();
        return view('PartesMobi.createParMob',['depar'=>$departamento,'cate'=>$categoria]);

       }

       public function crearpartesmobi(Request $request){

           $valida=[
               'nombre'=>'required | max:50 ',
               'marca'=>'required | max:50',
               'serie'=>'required | max:50',
               'estado'=>'required | max:50',
               'fecha'=>'required | max:50',
               'comentario'=>'required | max:50',
               'categoria'=>'required ',
               'imagen'=>'mimes:jpeg,bmp,PNG ',
               'departamento'=>'required | max:50 ',
               'par_nombre'=>'required | max:50',
               'par_marca'=>'required | max:50',
               'par_seri'=>'required | max:50',
               'par_canti'=>'required | max:50',
               'par_descr'=>'required | max:50',
               'par_code'=>'required',


           ];
           $validate=Validator::make(Input::all(),$valida);

           if($validate->fails()){
               return Redirect('partMobi/mobi')->withErrors($validate);
           }
           else{
               DB::beginTransaction();
               $mobi=new Mobiliarios();
               $mobi->nombre_Mobi=$request->get('nombre');
               $mobi->Departamento_idDepartamento=$request->get('departamento');
               $mobi->marca_Mobi=$request->get('marca');
               $mobi->serie_Mobi=$request->get('serie');
               $mobi->categoria_idcategoria=$request->get('categoria');
               $mobi->estado=$request->get('estado');
               $mobi->comentario=$request->get('comentario');
               $mobi->fecaRe_Mobi=$request->get('fecha');
               if($mobi->imagen==null){
                   if(Input::hasFile('imagen')){
                       $file=Input::file('imagen');
                       $file->move(public_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
                       $mobi->imagen=$file->getClientOriginalName();
               } else{
                       $mobi->imagen='imagen-default.jpg';
                   }



               }

               $mobi->save();
               $parts=new PartesModel();
               $parts->Mobiliario_idMobili= $mobi->idMobiliario;
               $parts->nombre=$request->get('par_nombre');
               $parts->marca=$request->get('par_marca');
               $parts->serie=$request->get('par_seri');
               $parts->cantidad=$request->get('par_canti');
               $parts->descripcion=$request->get('par_descr');
               $parts->codigo=$request->get('par_code');
               $parts->save();
               DB::commit();


           }
           return Redirect::to('Mobiliarios');



       }
       public function cargarMobi($id){

        $mobi=DB::select("SELECT m.idMobiliario,m.marca_Mobi,m.nombre_Mobi,m.serie_Mobi,m.estado,m.fecaRe_Mobi,m.comentario,m.Departamento_idDepartamento,m.categoria_idcategoria,m.imagen,m.codigo FROM mobiliario as m ,departamento as d, categorias as c WHERE m.Departamento_idDepartamento=d.idDepartamento
 and m.categoria_idcategoria=c.idcategoria AND m.idMobiliario=$id");
        $depar=Departamentos::all();
        $cate=Categoria::all();
        $data=array('mobi'=>$mobi,'depa'=>$depar,'cate'=>$cate);

          return response()->json($data);

       }
       public function eliminar($id){
        $mobi=Mobiliarios::find($id);
        $mobi->delete();
        return response()->json($mobi);
       }


    
}
