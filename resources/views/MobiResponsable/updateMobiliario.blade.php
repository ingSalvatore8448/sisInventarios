@extends('layaouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h1>Editar Mobiliario</h1>{{$mobiliario->idMobiliario}}
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>




    {!!Form::model($mobiliario,['method'=>'PATCH','route'=>['MobiResponsable.update',$mobiliario->idMobiliario],'files'=>'true'])!!}


    {{Form::token()}}

    <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Mobiliario</label>
                <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" value="{{$mobiliario->	nombre_Mobi}}" name="nombre" >
                <input type="hidden"  class="form-control" id="nombre" value="{{$mobiliario->idMobiliario}}" name="idMobi" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Departamento</label>
                <select name="nombre_depar" class="form-control">
                    <option value="selecione categoria"></option>
                    @foreach($departamento as $depa)
                        @if($depa->idDepartamento==$mobiliario->idMobiliario)

                            <option value="{{ $depa->idDepartamento}}" >{{$depa->nombre_depar}}</option>
                        @else
                            <option value="{{ $depa->idDepartamento}}" selected>{{$depa->nombre_depar}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" id="marca" required="Campo Obligatorio" value="{{$mobiliario->		marca_Mobi}}" name="marca">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Serie</label>
                <input type="text" class="form-control" id="serie" required="Campo Obligatorio" value="{{$mobiliario->		serie_Mobi}}" name="serie"  placeholder="serie">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
                <label for="exampleInputEmail1">Categoria</label>
                <select name="nombre_cate" class="form-control" >
                    <option value="selecione categoria"></option>
                    @foreach($categoria as $cate)
                        @if($cate->idcategoria==$mobiliario->idMobiliario)

                            <option value="{{$cate->idcategoria}}"  >{{$cate->nombre_cate}}</option>
                        @else
                            <option value="{{$cate->idcategoria}}"  selected>{{$cate->nombre_cate}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" required="Campo Obligatorio" name="cantidad" value="{{$mobiliario->cantidad_Mobi}}">
            </div>

        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="exampleInputEmail1">Fecha</label>
            <div class="input-group date"  data-provide="datepicker">
                <input type="text" name="fecha" value="{{$mobiliario->fecaRe_Mobi}}" id="date" class="form-control">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Comentario</label>
                <input type="text" class="form-control" id="comentario" required="Campo Obligatorio" name="comentario"  value="{{$mobiliario->comentario}}">
            </div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                @if(($mobiliario->imagen)!="")
                    <img src="{{asset('Imagenes/Mobiliario/'.$mobiliario->imagen)}}" height="100px" width="100px" class="img-thumbnail">
                @endif
            </div>
        </div></br>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"></br>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{URL('MobiResponsable')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}

@endsection