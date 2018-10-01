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
        $mobi = DB::table('mobiliario as m')
            ->join('departamento as de', 'm.Departamento_idDepartamento', '=', 'de.idDepartamento')
            ->join('categorias as c', 'm.categoria_idcategoria', '=', 'c.idcategoria')
            ->select(['m.nombre_Mobi', 'm.idMobiliario', 'm.marca_Mobi', 'm.serie_Mobi', 'm.fecaRe_Mobi',
                'm.comentario', 'de.idDepartamento', 'de.nombre_depar', 'c.idcategoria', 'c.nombre_cate', 'm.estado', 'm.imagen'
            ]);
        if (request()->ajax()) {
            return Datatables::of($mobi)
                ->make(true);

        }
        $departamento=Departamentos::all();
        $categoria=Categoria::all();
          return view('MobiResponsable.lisUser',['departamento'=>$departamento,'categoria'=>$categoria]);

    }

    public function edit($id){
        $mobiliario=Mobiliarios::findOrFail($id);
        $departamento=Departamentos::all();
        $categoria=Categoria::all();

        return view("MobiResponsable.updateMobiliario",[ "mobiliario"=>$mobiliario,"departamento"=>$departamento,"categoria"=>$categoria]);

    }
}
