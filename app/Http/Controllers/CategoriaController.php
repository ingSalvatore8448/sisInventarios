<?php

namespace Inventario\Http\Controllers;
use Illuminate\Http\Request;
use Inventario\Http\Requests;
use Inventario\Categoria;
use Illuminate\Support\Facades\Redirect;
use Inventario\Http\Requests\CategoriaFormRequest;
use Yajra\Datatables\Datatables;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
class CategoriaController extends Controller
{

    public function __construct()
    {


    }
    public function index(Request $request){
        $cate= Categoria::select(['idcategoria','nombre_cate']);
        if($request->ajax()){
            return Datatables::of($cate)
                ->addColumn('action',function($cate){
                    return
                        '<button type="button" class="btn btn-info btn-sm btnEdit" data-edit="/Categorias/'.$cate->idcategoria.'/edit">Edit</button>
                <button type="button" class="btn btn-xs btn-primary edit" id="'.$cate->idDepartamento.'"><i class="glyphicon glyphicon-edit">Ver</button>';

                })
            ->make(true);
        }
        return view('Categorias.index');
    }

    public function create(){
        return view("Categorias.create");

    }
    public function store(Request $categoriaFormRequest){

        $Rules =[
          'name' => 'required|min:2|max:32' ,
        ];
        $valida= Validator::make(Input::all(),$Rules);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{
            $categoria=new Categoria();
            $categoria->nombre_cate=$categoriaFormRequest->name;
            $categoria->save();
            return response()->json(array("success"=>true));
        }
    }
    public function show($id){

    }
    public function edit($id){
        $data = Categoria::find($id);
        return response()->json($data);

    }
    public function update(Request $request, $id){
        $rules= [
            'nombre' => 'required|min:2|max:32',

        ];

        $message = [
            'nombre.required' => 'El nombre es Obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 7 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 32 caracteres.',



        ];
        $Validator = Validator::make(Input::all(),$rules,$message);

        if ($Validator->fails()) {
            return response()->json(array('errors' => $Validator->getMessageBag()->toArray()));
        }else{
            $crud =Categoria::find($id);
            $crud->nombre_cate = $request->nombre;
            $crud->save();

            return response()->json(array("success"=>true));
        }
    }
    public function delete(){

    }
    public function destroy($id){
        $categoria=Categoria::findOrFail($id);
      
        $categoria->delete();
        return Redirect::to('Categorias');
    }
       



}
