@extends('layaouts.admin')

@section('contenido')
    <!-- CSS Files -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('pages/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />
    <link href="{{asset('pages/css/demo.css')}}" rel="stylesheet" />

    <div class="container">
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    {!! Form::open(array('url'=>'PartCreate/Mobi','method'=>'POST','autocomplete'=>'off','files'=>true)) !!}
                    {{Form::token()}}

                            <div class="wizard-header">
                                <h3>
                                    <b>Registro</b> de Mobiliarios <br>

                                </h3>
                            </div>

                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">Mobiliario</a></li>
                                    <li><a href="#address" data-toggle="tab">Partes</a></li>
                                </ul>

                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h4 class="info-text">Registro de mobiliarios y sus partes</h4>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="{{asset('pages/img/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input name="imagen"  type="file" id="wizard-picture">
                                                </div>
                                                <h6>Imagen</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Mobiliario<small></small></label>

                                                <input name="nombre"  type="text" required class="form-control" placeholder="Mobiliario">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Departamento</label><br>
                                                <select name="departamento" class="form-control">
                                                    <option>Elige Departamento</option>
                                                    @foreach($depar as $depa)
                                                        <option value="{{$depa->idDepartamento}}">{{$depa->nombre_depar}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Marca <small></small></label>
                                                <input name="marca"  type="text" class="form-control" required placeholder="Marca">

                                            </div>
                                            <div class="form-group">
                                                <label>Serie<small></small></label>
                                                <input name="serie" type="text" id="serie" required  class="form-control" placeholder="Serie">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Categoria</label><br>
                                                <select id="categoria"   name="categoria" class="form-control">
                                                    <option>Elige Categoria</option>
                                                    @foreach($cate as $categoria)
                                                        <option value="{{$categoria->idcategoria}}">{{$categoria->nombre_cate}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ESTADO</label>
                                                <select name="estado" class="form-control" >
                                                    <option>Seleccione estado</option>
                                                    <option value="Bueno">Bueno</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Malo">Malo</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Comentario <small></small></label>
                                                <input name="comentario"  required type="text" class="form-control" placeholder="Comentario">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="exampleInputEmail1">Fecha</label>
                                            <div class="input-group date"  data-provide="datepicker">
                                                <input type="text"   name="fecha" id="date" class="form-control">

                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text">Partes del Mobiliario</h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="par_nombre" required class="form-control" placeholder="Nombre">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" name="par_marca"  required class="form-control" placeholder="Marca">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Serie</label>
                                                <input type="text" name="par_seri" required class="form-control" placeholder="Serie">

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>cantidad</label>
                                                <input type="number" name="par_canti" required class="form-control" placeholder="Cantidad">

                                            </div>
                                        </div>

                                        <div class="col-sm-6" >
                                            <div class="form-group">
                                                <label>Descripcion</label>
                                                <input type="text" align="center" name="par_descr" required class="form-control" placeholder="Descripcion">

                                            </div>
                                        </div>
                                        <div class="col-sm-6" >
                                            <div class="form-group">
                                                <label>Codigo</label>
                                                <input type="text" align="center" name="par_code" required  class="form-control" placeholder="Codigo">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button'  class='btn btn-next btn-fill btn-warning btn-wd btn-sm ' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='Registrar' value='Registrar' />

                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterior' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        {!!Form::close()!!}

                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->



@endsection


