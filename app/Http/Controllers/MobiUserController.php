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


    public function index(Request $request)

    {
        $mobi = DB::table('mobiliario')
            ->join('departamento', 'mobiliario.Departamento_idDepartamento', '=', 'departamento.idDepartamento')
            ->join('categorias', 'mobiliario.categoria_idcategoria', '=', 'categorias.idcategoria')
            ->select(['nombre_Mobi', 'idMobiliario', 'marca_Mobi', 'serie_Mobi', 'fecaRe_Mobi',
                'comentario', 'departamento.idDepartamento', 'departamento.nombre_depar', 'categorias.idcategoria', 'categorias.nombre_cate', 'estado', 'imagen'
            ]);
        if (request()->ajax()) {
            return Datatables::of($mobi)
                ->addColumn('action', function ($id){

                    return '<a data-toggle="modal" data-target="#modal-editMobi" onclick="editar('. $id->idMobiliario . ')" class="btn btn-primary">Edit</a>
                       <button class="btn btn-danger" data-remote="/news/' . $id->idMobiliario . '">Delete</button>
                  ';
                })

                ->make(true);

        }
          return view('MobiResponsable.lisUser');

    }

    public function cargardatos($id){
        $mobiliario=Mobiliarios::findOrFail($id);
        $departamento=Departamentos::all();
        $categoria=Categoria::all();
$datos=array('mobi'=>$mobiliario,'depa'=>$departamento,'categoriass'=>$categoria);
        return response()->json($datos);


    }
}
