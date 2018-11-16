
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title> SIA Inventario | I.E.Buen pastor</title>
    <link rel="icon" type="image/png" href="{{asset('Imagen/logo.png')}}" />


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="{{asset('sweetalert/sweetalert2.min.css')}}">
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- datatables cdn-->
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/eliminar.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('Tablero')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>SIA</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SIA</b>INVENTARIO</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less aqiooo-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('Imagenes/Usuarios/'.Auth::user()->imagen)}}"   class="user-image" alt="User Image">
                            <span class="hidden-xs"> {{ Auth::user()->email }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('Imagenes/Usuarios/'.Auth::user()->imagen)}}"   class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->email }}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">


                                    <i class="fa fa-street-view" aria-hidden="true">  <a href="{{url('Perfil')}}" class="btn btn-default btn-flat">Perfil</a></i>
                                </div>

                                <div class="pull-right">

                                    @if(auth()->check())
                                        <i class="fa fa-sign-in"  aria-hidden="true">  <a {{ route('logout') }} class="btn btn-default btn-flat" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();" >Cerrar secion</a></i>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('Imagenes/Usuarios/'.Auth::user()->imagen)}}"   class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p> {{ Auth::user()->email }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                @if(Auth::user()->idRol==1)
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-institution"  style="color: white" aria-hidden="true"></i><span>Departamento</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{url('Departamen')}}"><i class="fa fa-circle-o"></i>Registros</a></li>

                        </ul>
                    </li>

                    <li class="treeview">

                        <a href="">
                            <i class="fa fa-user-plus"  style="color: white" aria-hidden="true"></i>

                            <span>GESTION DE USUARIOS</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('Usuario/create')}}"><i class="fa fa-circle-o"></i>REGISTRAR USUARIOS</a></li>
                            <li><a href="{{url('Usuario')}}"><i class="fa fa-circle-o"></i>Listar Usuarios</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="">

                            <i class="fa fa-credit-card-alt" style="color: white" aria-hidden="true"></i>
                            <span>Categorias</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('Categorias')}}"><i class="fa fa-circle-o"></i>Listado de Categorias</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-secret" style="color: white" aria-hidden="true"></i>
                            <span>Roles</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('Roles')}}"><i class="fa fa-circle-o"></i>REGISTRAR ROLES</a></li>
                            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i>Lista Roles</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">

                            <i class="fa fa-gear" style="color: white" aria-hidden="true"></i>
                            </i> <span>Mobiliarios Administrador</span>
                            <span class="pull-right-container">
              <i class=" fa fa-angle-left pull-right" ></i>
            </span>
                        </a>
                        <ul class="treeview-menu">

                        <!--   <li><a href="#"><i class="fa fa-circle-o"></i>Registro Partes Mobiliario</a></li>   -->
                            <li><a href="{{URL('mobiliario')}}"><i class="fa fa-circle-o"></i>LISTAR  Mobiliario</a></li>
                            <li><a href="{{URL('Mob/mobicre')}}"><i class="fa fa-circle-o"></i>Registrar solo  Mobiliario</a></li>


                        </ul>
                    </li>
                @endif

                <li class="treeview">
                    <a href="#">

                        <i class="fa fa-gear" style="color: white" aria-hidden="true"></i>
                        </i> <span>Gestion de Mobiliarios</span>
                        <span class="pull-right-container">
              <i class=" fa fa-angle-left pull-right" ></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{URL('Mob/mobicre')}}"><i class="fa fa-circle-o"></i>Registrar  Mobiliario</a></li>
                        <li><a href="{{URl('MobiResponsable')}}"><i class="fa fa-circle-o"></i>Listar  Responsable</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">

                        <i class="fa fa-line-chart" style="color: white" aria-hidden="true"></i>
                        <span>Inventario</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('Inventarios')}}"><i class="fa fa-circle-o"></i> Registrar Inventarios</a></li>
                        <li><a href="{{url('Historial')}}"><i class="fa fa-circle-o"></i>Historial Inventario</a></li>
                        @if(Auth::user()->idRol==1)
                        <li><a href="{{url('HistoGeneral')}}"><i class="fa fa-circle-o"></i>Historial General</a></li>
                   @endif
                    </ul>
                </li>

            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <!-- Main content -->
        <section class="content">

            @yield('contenido')


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
   <center><strong>UPEU &copy; 2014-2016 <a href="https://adminlte.io">Derecho de actor salvatore</a>.</strong> All rights
       reserved.</center>
</footer>
</center>
<!-- Control Sidebar -->

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<!-- Sparkline -->

<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{asset('sweetalert/sweetalert2.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

@yield('footer_scripts')

<script src="{{asset('pages/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{asset('pages/js/gsdk-bootstrap-wizard.js')}}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('pages/js/jquery.validate.min.js')}}"></script>
</body>
</html>
