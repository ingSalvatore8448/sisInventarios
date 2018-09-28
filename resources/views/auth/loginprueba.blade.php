<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->

    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="{{asset('js/html5shiv.js')}}"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
<style>
    /*
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
*/
    /* Import fonts */

    @import url(https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic);



    body {

        color: #797979;

        background: #eeeeee;

        font-family: 'Lato', sans-serif;

        padding: 0px !important;

        margin: 0px !important;


        font-size:14px !important;
        background-image: url('../Imagenes/bg-1.jpg');
        -webkit-background-size: cover;

        -moz-background-size: cover;

        -o-background-size: cover;

        background-size: cover;

    }

    h1,h2,h3,h4,h5{

        font-weight: 300;

    }

    label{

        font-weight: 300;

    }

    ul li {

        list-style: none;

    }



    a, a:hover, a:focus {

        text-decoration: none;

        outline: none;

        outline: 0;

    }

    input:focus, textarea:focus { outline: none; }

    table tr th { color: #688a7e;}

    *:focus {outline: none;}

    ::selection {

        background: #688a7e;

        color: #fff;

    }

    ::-moz-selection {

        background: #688a7e;

        color: #fff;

    }



    #container {

        width: 100%;

        height: 100%;

    }



    .Creative-pro, .Creative-pro h3{

        display: block;

        position: fixed;

        bottom:0;

        z-index: 100000;

        width: 100%;

        overflow: hidden;

        height: 50px;

        margin:0px;

    }

    .Creative-pro h3{

        padding-bottom: 10px;

        padding-top: 10px;

    }

    .lite{

        color: #00a0df !important;

    }



    /*login page*/



    .login-body {

        background-color: #f1f2f7;

    }




    .login-form {

        max-width: 350px;

        margin: 200px auto 0;

        background: #d5d7de;

    }

    .login-img-body .login-form{

        max-width: 350px;

        margin: 200px auto 0;

        background: rgba(213,215,222,0.4);

        border: 1px solid #B0B6BE;

    }

    .login-img2-body .login-form{

        border: 1px solid #B0B6BE;

        background: rgba(213,215,222,0.7);

    }

    .login-img3-body .login-form{

        border: 1px solid #B0B6BE;

        background: rgba(213,215,222,0.9);

    }

    .login-form a{

        color: #688a7e !important;

    }

    .login-form h2.login-form-heading {

        margin: 0;

        padding:20px 15px;

        text-align: center;

        background: #34aadc;

        border-radius: 5px 5px 0 0;

        -webkit-border-radius: 5px 5px 0 0;

        color: #fff;

        font-size: 18px;

        text-transform: uppercase;

        font-weight: 300;

        font-family: 'Lato', sans-serif;

    }



    .login-form .checkbox {

        margin-bottom: 14px;

    }

    .login-form .checkbox {

        font-weight: normal;

        font-weight: 300;

        font-family: 'Lato', sans-serif;

    }

    .login-form .form-control {

        position: relative;

        font-size: 16px;

        height: auto;

        padding: 10px;

        -webkit-box-sizing: border-box;

        -moz-box-sizing: border-box;

        box-sizing: border-box;

    }

    .login-form .form-control:focus {

        z-index: 2;

    }

    .login-form .login-img{

        font-size: 50px;

        font-weight: 300;

    }

    .login-form .input-group{

        padding-bottom: 10px;

    }

    .login-form .input-group-addon{


        color: #8b9199;

        font-weight: normal;

        line-height: 1;

        text-align: center;

        background-color: #ffffff;

        border: none;

        border-radius: 0;

    }

    .login-form input[type="email"], .login-form input[type="password"] {

        border: none;

        box-shadow: none;

        font-size: 16px;

        border-radius: 0;

    }

    .login-form .btn{

        border-radius: 0;

    }

    .login-form .btn-login {

        background: #f67a6e;

        color: #fff;

        text-transform: uppercase;

        font-weight: 300;

        font-family: 'Lato', sans-serif;

        box-shadow: 0 4px #e56b60;

        margin-bottom: 20px;

    }



    .login-form p {

        text-align: center;

        color: #b6b6b6;

        font-size: 16px;

        font-weight: 300;

    }

    .login-img3-body .login-form p,.login-img2-body .login-form p {

        color: #34aadc;

    }

    .login-form a {

        color: #b6b6b6;

    }



    .login-form a:hover {

        color: #34aadc;

    }

    .form .required{

        font-size: 16px;

        color: #00a0df;

    }



    .login-wrap {

        padding: 20px;

    }



</style>
<body class="login-img3-body">
<
<div class="container">

    <form class="login-form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>

            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">

                <span class="input-group-addon"><i class="icon_profile"></i></span>

                <input id="email" type="email" class="form-control" name="email" required  autofocus>
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif


            </div>
            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}" >
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                <span class="pull-right"> <a href="{{ route('password.request') }}"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

        </div>
    </form>
    <div class="text-right">
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</div>


</body>

</html>
