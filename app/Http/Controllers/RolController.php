<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Inventario\Http\Requests\RolRequest;
use Inventario\Rol;
use Illuminate\Support\Facades\Redirect;
use DB;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {


    }
    public function index(Request $request)
    {
        if($request){
        $query =trim($request->get('searchText'));
        $rol=DB::table('rol')->where('nombre_rol','like','%'.$query.'%')
         ->orderBy('nombre_rol','desc')
        ->paginate(7);
        
        return view('Roles.listar',['rol'=>$rol,'searchText'=>$query]);

        }
      


    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolRequest $request)

    {
        $rol= new Rol();
        $rol->nombre_rol=$request->get('nombre');
        $rol->save();
    
    return Redirect::to('Roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolRequest $request, $id)
    {
    $rol=Rol::findOrfail($id);
      $rol->nombre_rol=$request->get('nombre');
      $rol->update();
      return Redirect::to('Roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $rol=Rol::findOrfail($id);
        $rol->delete();
           return Redirect::to('Roles');
    }
}
