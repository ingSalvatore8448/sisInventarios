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
                ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'p.correo', 'p.sexo', 'p.Fecha_cumple', 'p.imagen', 'u.email', 'r.nombre_rol', 'd.nombre_depar', 'u.Persona_idPersona','u.id')
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
            $persona->correo= $request->get('correo');
            $persona->sexo= $request->get('sexo');
            $persona->Fecha_cumple= $request->get('Fecha_cumple');
            $persona->Rol_idRol= $request->get('rol');
            $persona->Departamento_idDepartamento= $request->
            get('departamento');
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/Imagenes/Usuarios/', $file->getClientOriginalName());
                $persona->imagen = $file->getClientOriginalName();
            }
            $persona->save();
            $usuarios = new User;
            $usuarios->Persona_idPersona = $persona->idPersona;
            $usuarios->email= $request->get('usuarios');
            $usuarios->Password= bcrypt($request->get('password'));
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
            ->join('usuarios as u','p.idPersona','u.Persona_idPersona')
            ->join('rol as r','p.Rol_idRol','=','r.idRol')
            ->join('departamento as de','p.Departamento_idDepartamento','=','de.idDepartamento')
            ->select('p.idPersona', 'p.nombre', 'p.apellido_Paterno', 'p.apellido_Materno', 'p.telefono', 'p.dni', 'p.correo', 'p.sexo', 'p.Fecha_cumple', 'p.imagen', 'u.email', 'r.nombre_rol', 'de.nombre_depar', 'u.Persona_idPersona','u.id')
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
    public function update(UserRequest $request, $id)
    {

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
        return Redirect::to('Usuario');
    }
    public function updateUser(PersonaRequest $request, $id)
    {

        $usuarios=User::findOrFail($id);
        $usuarios->email= $request->get('usuarios');
        $usuarios->update();
        return Redirect::to('Usuario');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $usuarios=User::findOrfail($id);
        $usuarios->delete();
        return Redirect::to('Usuario');
    }
    public function prueba(){
        return view('auth.loginprueba');
    }
}