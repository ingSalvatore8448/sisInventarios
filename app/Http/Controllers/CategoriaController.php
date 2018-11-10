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

        if($request->ajax()){
            return Datatables::of(Categoria::query())
                ->addColumn('action',function($cate){
                    return
                        '<button type="button" class="btn btn-info btn-sm btnEdit" data-edit="/Categorias/'.$cate->idcategoria.'/edit">Actualizar</button>
                 <a data-toggle="modal" data-target="#deletD" onclick="eliminar('.$cate->idcategoria.')"> <button type="button" class="btn btn-xs btn-danger" id=""><i class="glyphicon glyphicon-remove">Eliminar</button></a>';

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
            'estado' => 'required|min:2|max:32' ,
        ];
        $valida= Validator::make(Input::all(),$Rules);
        if($valida->fails()){
            return response()->json(array('errors' => $valida->getMessageBag()->toArray()));
        }else{
            $categoria=new Categoria();
            $categoria->nombre_cate=$categoriaFormRequest->name;
            $categoria->cate_estado=$categoriaFormRequest->estado;
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
    public function eliminar($id){
        $depar=Categoria::find($id);
        $depar->delete();
        echo json_encode($depar);
    }





}
