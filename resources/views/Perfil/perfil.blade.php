@extends('layaouts.admin')
@section('contenido')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    @include('Perfil.updatePer')
    @if (Session::has('message'))
        <div class="text-danger">
            {{Session::get('message')}}
        </div>
    @endif
    <style>
        body {
            background: #F1F3FA;
        }

        /* Profile container */
        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }

    </style>
    @if (Session::has('status'))
        <hr />
        <div class='text-success'>
            {{Session::get('status')}}
        </div>
        <hr />
    @endif

    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{asset('Imagenes/Usuarios/'.$persona1->imagen)}}" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name" name="usuarios">
                            {{$persona1->email}}
                        </div>
                        <div class="profile-usertitle-job" name="">
                            {{$persona1->nombre_rol}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <a data-target="#modal-update-{{$persona1->id}}" data-toggle="modal">
                            <button type="button" class="btn btn-success btn-sm"> Editar datos:  {{$persona1->email}} </button>
                        </a>
                    </div>
                @include('Perfil.updaUser')
                <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#contact-modal">

                                    <i class="glyphicon glyphicon-user"> </i>
                                    Canbiar Contraseña </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>

            <div class="col-md-7">
                <div class="profile-content">
                    Some user related content goes here... <div class="card f-b">
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
                                            <label>Usuario</label>
                                            <input type="text" class="form-control text-center" value="{{$persona1->username}}" disabled>

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
                                            <button class="btn btn-warning">Editar datos de: {{$persona1->nombre}} </button>
                                        </a>
                                    </div>
                                </div>
                            </center>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                 <center> <h3>Canbiar Contraseña</h3></center>
                </div>
                <form action="{{url('user/Password')}}" method="post" >
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Introduce tu actual password:</label>
                            <input type="password" name="mypassword" class="form-control">
                            <div class="text-danger">{{$errors->first('mypassword')}}</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Introduce tu nuevo password:</label>
                            <input type="password" name="password" class="form-control">
                            <div class="text-danger">{{$errors->first('password')}}</div>

                        </div>
                        <div class="form-group">
                            <label for="password">Confirma tu nuevo password:</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            <div class="text-danger">{{$errors->first('password')}}</div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" id="submit">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/contact.js"></script>


@endsection