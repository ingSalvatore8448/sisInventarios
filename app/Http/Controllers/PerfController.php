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
use Validator;
use DB;
use Hash;

class PerfController extends Controller
{
    public function index(Request $request){
        $id_tra = Auth::user()->Persona_idPersona;
        $persona1=DB::table('persona as p')
            ->join('users as u','p.idPersona','u.Persona_idPersona')
            ->join('rol as r','p.Rol_idRol','=','r.idRol')
            ->join('departamento as de','p.Departamento_idDepartamento','=','de.idDepartamento')
            ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'u.username', 'p.sexo', 'p.Fecha_cumple', 'p.imagen', 'u.email', 'r.nombre_rol', 'de.nombre_depar', 'u.Persona_idPersona','u.id','u.idRol')
            ->where('p.idPersona', '=', $id_tra)
            ->first();
        $rol=DB::table('rol')->get();
        $departamento=DB::table('departamento')->get();
        return view('Perfil.perfil',['persona1'=>$persona1,'rol'=>$rol,'departamento'=>$departamento]);
    }

    public function updatePersona(Request $request, $id)
    {
        $valida=[
            'nombre'=>'required | max:50 ',
            'apellido_pa'=>'required | max:50 ',
            'apellido_ma'=>'required | max:50 ',
            'telefono'=>'required | max:50 ',
            'dni'=>'required | max:50 ',
            'sexo'=>'required | max:50 ',
            'Fecha_cumple'=>'required | max:50 ',
            'rol'=>'required | max:50 ',
            'departamento'=>'required | max:50 ',
            'imagen'=>'mimes:jpeg,bmp,PNG ',



        ];
        $validator = Validator::make(Input::all(),$valida);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));

        }else{
            $persona=Persona::findOrfail($id);
            $persona->nombre=$request->get('nombre');
            $persona->apellido_Paterno=$request->get('apellido_pa');
            $persona->apellido_Materno=$request->get('apellido_ma');
            $persona->telefono=$request->get('telefono');
            $persona->dni=$request->get('dni');
            $persona->sexo=$request->get('sexo');
            $persona->Fecha_cumple=$request->get('Fecha_cumple');
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

    }
    public function updateUser(Request $request, $id)
    {

        $regla=[
            'username'=>'required |max:50'

        ];
        $validate=Validator::make(Input::all(),$regla);
        if($validate->fails()){
            return response()->json(array('errors' => $validate->getMessageBag()->toArray()));
        } else{
            $usuarios=User::findOrFail($id);
            $usuarios->email= $request->get('email');
            $usuarios->username=$request->get('username');
            $usuarios->update();
            return Redirect::to('Perfil');
        }

    }
     /**
     * valido si la contraseña es correcta y requerida mas el minimo y el maximo de caracteres
     *
     * 
     */
    public function canbiarpass(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
 /**
     * si existe algun error en la validacion retorno a la vista perfil con el error y
     valido si las contraseñas son iguales la actual mas la existente. luego creo un new objeto  y le digo que me agarre solo el usuario que esta autoentificado  luego hago el update del password finalmente mando un error de validacion al perfil si es error o exito.
     *
     * 
     */
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('Perfil')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                    ->update(['password' => bcrypt($request->password)]);
                return redirect('Perfil')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('Perfil')->with('message', 'Credenciales incorrectas');
            }
        }

    }
}
