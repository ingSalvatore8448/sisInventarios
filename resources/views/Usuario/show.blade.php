@extends('layaouts.admin')
@section('contenido')
<div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card">

                <div class="author col-md-8 col-md-offset-2">
                    <div class="content">
                    	<center><h3>Usuario</h3></center>

                  <img class="img-responsive" src="{{asset('Imagenes/Usuarios/'.$persona1->imagen)}}"/>


                    </div>
                </div>

                <div  class="text-center">
                   <div class="row" style="padding: 10;">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text"  class="form-control text-center" value="{{$persona1->email}}"
                                       disabled>
                            </div>
                        </div>


                    </div>

                    <div class="text-center">
                        <a data-target="#modal-update-{{$persona1->id}}" data-toggle="modal">
                            <button class="btn btn-success">Editar usuario {{$persona1->email}} </button>



                        </a>
                    </div>
                    <br>


                </div>

            </div>

        </div>

        <div class="col-lg-8 col-md-7">
            <div class="card f-b">
                <div class="col-md-6 col-md-offset-4">
                    <h4 class="title">Datos Personal</h4>
                </div>
                <div class="content">

                    <div class="row">

                    	 <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->nombre}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>DNI</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->dni}}" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->telefono}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->apellido_Paterno}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->apellido_Materno}}" disabled>
                            </div>
                        </div>
                    </div>
                      <center>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>	correo</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->	correo}}" disabled>

                            </div>
                        </div>
                         <div class="col-md-5">
                    <div class="form-group">
                                <label>Rol</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->nombre_rol}}"
                                       disabled>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Departamento</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->nombre_depar}}" disabled>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sexo</label>
                                <input type="text" class="form-control text-center" value="{{$persona1->sexo}}" disabled>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de nacimiento </label>
                                <input type="text" class="form-control text-center" value="{{$persona1->Fecha_cumple}}" disabled>

                            </div>
                        </div>
                    </div>

                    <div class="text-center">


                        <a data-target="#modal-editPersona-{{$persona1->idPersona}}" data-toggle="modal">
                            <button class="btn btn-success">Editar datos de {{$persona1->nombre}} </button>
                        </a>
                    </div>
                </div>
            </div>
         @include('Usuario.editUser')

        </div>


    </div>

    </div>
@include('Usuario.editPersona')
@endsection
