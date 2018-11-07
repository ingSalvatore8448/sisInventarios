<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistema de Inventario | LOGIN</title>
    <link rel="icon" type="image/png" href="" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->

    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

    <style>
        form {
            max-width: 360px;
            border: 2px solid #dedede;
            padding: 38px;
            margin-top: 25px;
            border-radius: 25px;
            background-color:transparent ;

            /* background: #fff; */
        }
        body {
            background-color: #ecf0f5;
            background-image: url('../Imagen/bg-1.jpg');
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<center>
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h1 class="h3 mb-3 font-weight-normal" style="color: #00a300">Sistema De Inventario</h1>
        <hr>
        <div class="form-group">
            <label for="in_usu_nombre" style="color: #00a7d0">Usuario</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required >
            @if ($errors->has('username'))
                <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label for="in_usu_clave" style="color: #00a7d0">Contraseña</label>

            <input type="password" id="password" name="password" class="form-control" placeholder="Clave" required>
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>
        <label class="checkbox">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
            <span class="pull-right"> <a href="{{ route('password.request') }}"> Olvido su Contraseña?</a></span>
        </label>
        <hr>
        <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
        <a>
            <strong><br><label style="color: black">Copyright © 2018 Derechos reservados <a>Desarollado Por el ingeniero Salvatore</a>
                </label></strong>
        </a>
    </form>
</center>
</body>
</html>
