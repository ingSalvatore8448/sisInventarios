<?php
namespace Inventario\Http\Controllers;
use Illuminate\Http\Request;
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
class UsuarioController extends Controller
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
        if ($request) {
            $qury = trim($request->get('searchText'));
            $user = DB::table('Persona as p')
                ->join('users as u', 'p.idPersona', '=', 'u.Persona_idPersona')
                ->join('rol as r', 'p.Rol_idRol', '=', 'r.idRol')
                ->join('departamento as d', 'p.Departamento_idDepartamento', '=', 'd.idDepartamento')
                ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'p.sexo', 'p.Fecha_cumple', 'u.imagen', 'u.email','u.username', 'r.nombre_rol', 'd.nombre_depar', 'u.Persona_idPersona','u.id','u.idRol')
                ->where('p.nombre', 'like', '%' . $qury . '%')
                ->orwhere('p.apellido_Paterno', 'like', '%' . $qury . '%')
                ->orwhere('p.apellido_Materno', 'like', '%' . $qury . '%')
                ->orderBy('p.nombre', 'desc')
                ->paginate(7);
            return view('Usuario.index',['user'=>$user,'searchText'=>$qury]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = DB::table('rol')->get();
        $departamento = DB::table('departamento')->get();
        return view('Usuario.create', ['rol' => $rol, 'departamento' => $departamento]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            $persona= new Persona;
            $persona->nombre= $request->get('nombre');
            $persona->apellido_Paterno= $request->get('apellido_pa');
            $persona->apellido_Materno = $request->get('apellido_ma');
            $persona->telefono = $request->get('telefono');
            $persona->dni= $request->get('dni');
            $persona->sexo= $request->get('sexo');
            $persona->Fecha_cumple= $request->get('Fecha_cumple');
            $persona->Rol_idRol= $request->get('rol');
            $persona->Departamento_idDepartamento= $request->get('departamento');

            $persona->save();
            $usuarios = new User;
            $usuarios->Persona_idPersona = $persona->idPersona;
            $usuarios->email= $request->get('email');
            $usuarios->idRol= $request->get('rol');
            $usuarios->username=$request->get('username');
            $usuarios->Password= bcrypt($request->get('password'));
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/Imagenes/Usuarios/', $file->getClientOriginalName());
                $usuarios->imagen =  $file->getClientOriginalName();
            }
            $usuarios->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return Redirect::to('Usuario')->with('msg', 'La cuenta se creo correctamente...');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $persona1=DB::table('persona as p')
            ->join('users as u','p.idPersona','u.Persona_idPersona')
            ->join('rol as r','p.Rol_idRol','=','r.idRol')
            ->join('departamento as de','p.Departamento_idDepartamento','=','de.idDepartamento')
            ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'p.sexo', 'p.Fecha_cumple', 'u.imagen', 'u.email','u.username', 'r.nombre_rol', 'de.nombre_depar', 'u.Persona_idPersona','u.id','u.idRol')
            ->where('p.idPersona','=',$id)
            ->first();

        $rol=DB::table('rol')->get();
        $departamento=DB::table('departamento')->get();
        return view('Usuario.show',['persona1'=>$persona1,'rol'=>$rol,'departamento'=>$departamento]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


            $persona->update();
            return Redirect::to('Usuario');
        }



    }
    public function updateUser( Request $request, $id)
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
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/Imagenes/Usuarios/', $file->getClientOriginalName());
                $usuarios->imagen = $file->getClientOriginalName();
            }
            $usuarios->update();
            return Redirect::to('Usuario');
        }


    }

    public function destroy($id)
    {

        $usuarios=User::findOrfail($id);
        $usuarios->delete();
        return Redirect::to('Usuario');
    }

}