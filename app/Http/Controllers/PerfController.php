<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Inventario\Http\Requests\UserRequest;
use Inventario\Http\Requests\PersonaRequest;
use Inventario\Persona;
use Inventario\User;
use Response;
use DB;

class PerfController extends Controller
{
    public function index(Request $request){
        $id_tra = Auth::user()->Persona_idPersona;
        $persona1=DB::table('persona as p')
            ->join('users as u','p.idPersona','u.Persona_idPersona')
            ->join('rol as r','p.Rol_idRol','=','r.idRol')
            ->join('departamento as de','p.Departamento_idDepartamento','=','de.idDepartamento')
            ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'p.correo', 'p.sexo', 'p.Fecha_cumple', 'p.imagen', 'u.email', 'r.nombre_rol', 'de.nombre_depar', 'u.Persona_idPersona','u.id','u.idRol')
            ->where('p.idPersona', '=', $id_tra)
            ->first();
        $rol=DB::table('rol')->get();
        $departamento=DB::table('departamento')->get();
        return view('Perfil.perfil',['persona1'=>$persona1,'rol'=>$rol,'departamento'=>$departamento]);
    }

    public function updatePersona(UserRequest $request, $id)
    {
        $persona=Persona::findOrfail($id);
        $persona->nombre=$request->get('nombre');
        $persona->apellido_Paterno=$request->get('apellido_pa');
        $persona->apellido_Materno=$request->get('apellido_ma');
        $persona->telefono=$request->get('telefono');
        $persona->dni=$request->get('dni');
        $persona->Fecha_cumple=$request->get('Fecha_cumple');
        $persona->sexo=$request->get('sexo');
        $persona->correo=$request->get('correo');
        $persona->Rol_idRol=$request->get('rol');
        $persona->Departamento_idDepartamento=$request->get('departamento');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '/Imagenes/Usuarios/', $file->getClientOriginalName());
            $persona->imagen = $file->getClientOriginalName();
        }
        $persona->update();
        return Redirect::to('Perfil');
    }
    public function updateUser(PersonaRequest $request, $id)
    {

        $usuarios=User::findOrFail($id);
        $usuarios->email= $request->get('email');
        $usuarios->update();
        return Redirect::to('Perfil');
    }
}
