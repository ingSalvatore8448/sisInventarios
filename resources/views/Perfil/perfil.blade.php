@extends('layaouts.admin')
@section('contenido')
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
                            <button type="button" class="btn btn-primary btn-sm"> Editar datos de: {{$persona1->email}} </button>
                        </a>
                    </div>
                @include('Perfil.updaUser')
                <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    Overview </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Account Settings </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    Tasks </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="glyphicon glyphicon-flag"></i>
                                    Help </a>
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
                                            <button class="btn btn-success">Editar datos de: {{$persona1->nombre}} </button>
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
    @include('Perfil.updatePer')
@endsection