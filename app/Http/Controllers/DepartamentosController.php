<?php

namespace Inventario\Http\Controllers;
use Inventario\Departamentos;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use Inventario\Http\Requests\DepartamentosRequest;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use DB;

class DepartamentosController extends Controller
{

    public function index()
    {



       if (request()->ajax()) {
            return Datatables::of(Departamentos::query())
            ->addColumn('action',function($departa){
                return 
                '<button type="button" class="btn btn-info btn-sm btnEdit" data-edit="/Departamen/'.$departa->idDepartamento.'/edit">Editar</button>
               <a data-toggle="modal" data-target="#deletD" onclick="eliminar('.$departa->idDepartamento.')"> <button type="button" class="btn btn-xs btn-danger" id=""><i class="glyphicon glyphicon-remove">Eliminar</button></a>';

            })
            ->make(true);
        }
        return view('Departamentos.indexDepar');
    }





   public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:32',

        ];

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else{

            $crud = new Departamentos();
            $crud->nombre_depar = $request->name;
            $crud->save();

            return response()->json(array("success"=>true));
        }



    }



    public function mostrar(Request $request)
    {
        $id = $request->input('id');
        $student = Departamentos::find($id);
        return response()->json($student);

    }


   public function edit($id)
    {
        $data = Departamentos::find($id);
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'edit_name' => 'required|min:2|max:32',
            
        ];

        $message = [
            'edit_name.required' => 'El nombre es Obligatorio.',
            'edit_name.min' => 'El nombre debe tener al menos 7 caracteres.',
            'edit_name.max' => 'El nombre no puede tener más de 32 caracteres.',



        ];

        $Validator = Validator::make(Input::all(),$rules,$message);

        if ($Validator->fails()) {
            return response()->json(array('errors' => $Validator->getMessageBag()->toArray()));
        }else{
            $crud =Departamentos::find($id);
            $crud->nombre_depar = $request->edit_name;
            $crud->save();

            return response()->json(array("success"=>true));
        }
    }


public function eliminar($id){
        $depar=Departamentos::find($id);
        $depar->delete();
        echo json_encode($depar);
}



}
