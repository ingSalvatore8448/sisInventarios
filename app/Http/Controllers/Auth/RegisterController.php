<?php

namespace Inventario\Http\Controllers\Auth;

use Inventario\User;
use Inventario\Persona;
use Response;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Inventario\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Inventario\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
         return Redirect::to('Usuario')->with('msg', 'La cuenta se creo correctamente...');
    }

 public  function index(Request $request ){
        if ($request) {
            $qury = trim($request->get('searchText'));
            $user = DB::table('Persona as p')
                ->join('usuarios as u', 'p.idPersona', '=', 'u.Persona_idPersona')
                ->join('rol as r', 'p.Rol_idRol', '=', 'r.idRol')
                ->join('departamento as d', 'p.Departamento_idDepartamento', '=', 'd.idDepartamento')
                ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'p.correo', 'p.sexo', 'p.Fecha_cumple', 'p.imagen', 'u.email', 'r.nombre_rol', 'd.nombre_depar', 'u.Persona_idPersona','u.id')
                ->where('p.nombre', 'like', '%' . $qury . '%')
                ->orwhere('p.apellido_Paterno', 'like', '%' . $qury . '%')
                ->orwhere('p.apellido_Materno', 'like', '%' . $qury . '%')
                ->orderBy('p.nombre', 'desc')
                ->paginate(7);
        $rol = DB::table('rol')->get();
        $departamento = DB::table('departamento')->get();
            return view('Usuario.index',['user'=>$user,'rol'=>$rol,'departamento'=>$departamento,'searchText'=>$qury]);
        }
    }

}
