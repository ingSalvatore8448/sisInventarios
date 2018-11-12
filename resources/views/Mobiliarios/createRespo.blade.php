@extends('layaouts.admin')
@section('contenido')

<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <h3>Nuevo Mobiliario</h3>
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
  {!! Form::open(array('route'=>'registrar','method'=>'POST','autocomplete'=>'off','files'=>true)) !!}
 {{Form::token()}}

 <div class="row">
   
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">

    <label for="exampleInputEmail1">Mobiliario</label>
    <input  type="text" class="form-control" id="nombre" required="Campo Obligatorio" value="{{old("nombre")}}" name="nombre"  placeholder="Mobiliario">
     </div>
   </div>
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Departamento</label>
    <select name="nombre_depar" class="form-control">
      <option value="">Seleccione departamento</option>
      @foreach($departamento as $depa)
      <option value="{{ $depa->idDepartamento}}">{{$depa->nombre_depar}}</option>
      @endforeach
    </select>
     </div>
   </div>
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
  <div class="form-group">
    <label for="exampleInputEmail1">Marca</label>
    <input type="text" class="form-control" id="marca" required="Campo Obligatorio" value="{{old("Marca")}}" name="marca"  placeholder="Marca">
     </div>
</div>
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
     <div class="form-group">
    <label for="exampleInputEmail1">Serie</label>
    <input type="text" class="form-control" id="serie" required="Campo Obligatorio" value="{{old("serie")}}" name="serie"  placeholder="serie">
     </div>
   </div>
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <select name="nombre_cate" class="form-control" >
      <option value="">Seleccione categoria</option>
      @foreach($categoria as $cate)

      <option value="{{$cate->idcategoria}}">{{$cate->nombre_cate}}</option>
      @endforeach
    </select>
     </div>
 </div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
    <label for="exampleInputEmail1">ESTADO</label>
    <select name="estado" class="form-control" >
       <option>Seleccione estado</option>
       <option value="bueno">bueno</option>
        <option value="regular">Regular</option>
          <option value="malo">malo</option>
     
    </select>
     </div>
 </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <label for="exampleInputEmail1">Fecha</label>
<div class="input-group date"  data-provide="datepicker">
    <input type="text" name="fecha" id="date" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>
   
 </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
    <label for="exampleInputEmail1">Comentario</label>
  <input type="text" class="form-control" id="comentario" required="Campo Obligatorio" name="comentario"  placeholder="comentario">
     </div>
   
 </div>
 
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
 <div class="form-group">
    <label for="exampleInputEmail1">Imagen</label>
    <input type="file" class="form-control" id="imagen" name="imagen">
     <input type="hidden"  class="form-control" src="{{asset('dist/img/user2-160x160.jpg')}}" id="imag" name="imagen">
     </div>
   </div></br>
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"></br>
       <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('Mobiliarios')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
            </div>
</div>
</div>
  {!!Form::close()!!}   

  @endsection