<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\Http\Requests;
use Inventario\Mobiliarios;
use Inventario\Categoria;
use Inventario\Departamentos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Inventario\Http\Requests\DepartamentosRequest;
use Inventario\Http\Requests\CategoriaFormRequest;
use Inventario\Http\Requests\Mobiliariorequest;
use DB;

class MobiliarioController extends Controller
{
    public function __construct()
    {


    }

    public function index(Request $request){
    if($request){

    	$query=trim($request->get('searchText'));
    	$mobiliarios=DB::table('mobiliario as m')
    	->join('departamento as de','m.Departamento_idDepartamento', '=','de.idDepartamento')
    	->join('categoria as ca', 'm.categoria_idcategoria','=','ca.idcategoria')
    	->select('m.nombre_Mobi', 'm.idMobiliario','m.marca_Mobi','m.serie_Mobi','cantidad_Mobi','m.estado','m.fecaRe_Mobi','m.comentario','de.idDepartamento','de.nombre_depar','ca.idcategoria','ca.nombre_cate','m.imagen')

    	->where('nombre_Mobi','like','%'.$query.'%')
    	->orwhere('m.marca_Mobi','LIKE','%'.$query.'%')
    	->orwhere('cantidad_Mobi','LIKE','%'.$query.'%')
    	 ->orderBy('m.nombre_Mobi','desc')

    	->paginate(7);
    	
    	return view('Mobiliarios.indexMobi',['mobiliarios'=>$mobiliarios,'searchText'=>$query]);



    }

    }
    public function create(){
       $departamento=Departamentos::all();
        $categoria=Categoria::all();
return view('Mobiliarios.create',['departamento'=>$departamento,'categoria'=>$categoria]);
    }
    public function store(Mobiliariorequest $request){
    	$mobiliario=new Mobiliarios();
    	$mobiliario->nombre_Mobi=$request->get('nombre');
    	$mobiliario->marca_Mobi=$request->get('marca');
    	$mobiliario->serie_Mobi=$request->get("serie");
    	$mobiliario->cantidad_Mobi=$request->get("cantidad");
    	$mobiliario->estado='Activo';
    	$mobiliario->fecaRe_Mobi=$request->get("fecha");
        $mobiliario->comentario=$request->get("comentario");
        $mobiliario->Departamento_idDepartamento=$request->get('nombre_depar');
        $mobiliario->categoria_idcategoria=$request->get('nombre_cate');
         if(Input::hasFile('imagen')){
         	$file=Input::file('imagen');
         	$file->move(public_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
         	$mobiliario->imagen=$file->getClientOriginalName();

         }
        $mobiliario->save();
   
    	return Redirect::to('Mobiliarios');
    }

    public function show(){
    	
    }
    public function edit($id){
        $mobiliario=Mobiliarios::findOrFail($id);
    	 $departamento=Departamentos::all();
        $categoria=Categoria::all();

        return view("Mobiliarios.editMobi",[ "mobiliario"=>$mobiliario,"departamento"=>$departamento,"categoria"=>$categoria]);

    }
    public function update(Mobiliariorequest $request,$id){
        $mobiliario=Mobiliarios::findOrFail($id);

       $mobiliario->nombre_Mobi=$request->get('nombre');
        $mobiliario->marca_Mobi=$request->get('marca');
        $mobiliario->serie_Mobi=$request->get("serie");
        $mobiliario->cantidad_Mobi=$request->get("cantidad");
        $mobiliario->fecaRe_Mobi=$request->get("fecha");
        $mobiliario->comentario=$request->get("comentario");
        $mobiliario->Departamento_idDepartamento=$request->get('nombre_depar');
        $mobiliario->categoria_idcategoria=$request->get('nombre_cate');
         $mobiliario->idMobiliario=$request->get('idMobi');
         if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
            $mobiliario->imagen=$file->getClientOriginalName();

         }
        $mobiliario->update();
   
        return Redirect::to('Mobiliarios');
    




    }

    public function destroy($id){
    	$mobiliario=Mobiliarios::findOrFail($id);
        $mobiliario->delete();

          return Redirect::to('Mobiliarios');
    }


    
}
