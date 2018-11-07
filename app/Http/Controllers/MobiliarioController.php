<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inventario\Http\Requests;
use Inventario\Mobiliarios;
use Inventario\Categoria;
use Inventario\PartesModel;
use Inventario\Departamentos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Inventario\Http\Requests\DepartamentosRequest;
use Inventario\Http\Requests\CategoriaFormRequest;
use Inventario\Http\Requests\Mobiliariorequest;
use Inventario\Http\Requests\MobiRes;
use Validator;
use DB;

use Mockery\Exception;

class MobiliarioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request) {

            $query = trim($request->get('searchText'));
            $mobiliarios = DB::table('mobiliario as m')
                ->join('departamento as de', 'm.Departamento_idDepartamento', '=', 'de.idDepartamento')
                ->join('categorias as ca', 'm.categoria_idcategoria', '=', 'ca.idcategoria')
                ->select('m.nombre_Mobi', 'm.idMobiliario', 'm.marca_Mobi', 'm.serie_Mobi', 'm.estado', 'm.fecaRe_Mobi', 'm.comentario', 'de.idDepartamento', 'de.nombre_depar', 'ca.idcategoria', 'ca.nombre_cate', 'm.imagen')
                ->where('nombre_Mobi', 'like', '%' . $query . '%')
                ->orwhere('m.marca_Mobi', 'LIKE', '%' . $query . '%')
                ->orderBy('m.nombre_Mobi', 'desc')
                ->paginate(7);

            return view('Mobiliarios.indexMobi', ['mobiliarios' => $mobiliarios, 'searchText' => $query]);


        }

    }

    public function show()
    {

    }

    public function edit($id)
    {
        $mobiliario = Mobiliarios::findOrFail($id);
        $departamento = Departamentos::all();
        $categoria = Categoria::all();

        return view("Mobiliarios.editMobi", ["mobiliario" => $mobiliario, "departamento" => $departamento, "categoria" => $categoria]);

    }

    public function canbiarestado($id)
    {

    }


    public function update( Mobiliariorequest $request,$id){
        $mobiliario=Mobiliarios::findOrFail($id);
       $mobiliario->nombre_Mobi=$request->get('nombre');
        $mobiliario->marca_Mobi=$request->get('marca');
        $mobiliario->serie_Mobi=$request->get("serie");
        $mobiliario->fecaRe_Mobi=$request->get("fecha");
        $mobiliario->estado=$request->get('estado');
        $mobiliario->comentario=$request->get("comentario");
        $mobiliario->Departamento_idDepartamento=$request->get('nombre_depar');
        $mobiliario->categoria_idcategoria=$request->get('nombre_cate');
         $mobiliario->idMobiliario=$request->get('idMobi');
         if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(Storage_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
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


       public function CrearMobi(){
        $mobiliario=Categoria::all();
        $departamento=Departamentos::all();
        return view('Mobiliarios.createRespo',['categoria'=>$mobiliario,'departamento'=>$departamento]);
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
           if(Input::hasFile('imagen')){
               $file=Input::file('imagen');
               $file->move(public_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
               $mobiliario->imagen=$file->getClientOriginalName();


           }

           $mobiliario->save();

           return Redirect::to('mob/lisMobi');

       }

       public function listar(Request $request){
           if($request){

               $query=trim($request->get('buscar'));
               $mobiliarios=DB::table('mobiliario as m')
                   ->join('departamento as de','m.Departamento_idDepartamento', '=','de.idDepartamento')
                   ->join('categorias as ca', 'm.categoria_idcategoria','=','ca.idcategoria')

                   ->select('m.nombre_Mobi', 'm.idMobiliario','m.marca_Mobi','m.serie_Mobi','m.estado','m.fecaRe_Mobi','m.comentario','de.idDepartamento','de.nombre_depar','ca.idcategoria','ca.nombre_cate','m.imagen')
                   ->where('nombre_Mobi','like','%'.$query.'%')
                   ->orwhere('m.marca_Mobi','LIKE','%'.$query.'%')
                   ->orderBy('m.nombre_Mobi','desc')

                   ->paginate(7);

               return view('Mobiliarios.listaMobi',['mobiliarios'=>$mobiliarios,'buscar'=>$query]);



           }

       }

       public function eliminar($id){
           $mobi=Mobiliarios::find($id);
           $mobi->delete();
           return Redirect::to('mob/lisMobi');

       }
       public function editar($id){
           $mobiliario=Mobiliarios::findOrFail($id);
           $departamento=Departamentos::all();
           $categoria=Categoria::all();

           return view("Mobiliarios.updateRes",[ "mobiliario"=>$mobiliario,"departamento"=>$departamento,"categoria"=>$categoria]);


       }
       public function updateMobi(MobiRes $request,$id){

           $mobiliario=Mobiliarios::findOrFail($id);

           $mobiliario->nombre_Mobi=$request->get('nombre');
           $mobiliario->marca_Mobi=$request->get('marca');
           $mobiliario->serie_Mobi=$request->get("serie");
           $mobiliario->fecaRe_Mobi=$request->get("fecha");
           $mobiliario->comentario=$request->get("comentario");
           $mobiliario->Departamento_idDepartamento=$request->get('nombre_depar');
           $mobiliario->categoria_idcategoria=$request->get('nombre_cate');
           $mobiliario->idMobiliario=$request->get('idMobi');
           if(Input::hasFile('imagen')){
               $file=Input::file('imagen');
               $file->move(Storage_path().'/Imagenes/Mobiliario/',$file->getClientOriginalName());
               $mobiliario->imagen=$file->getClientOriginalName();

           }
           $mobiliario->update();

           return Redirect::to('mob/lisMobi');

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


    
}
