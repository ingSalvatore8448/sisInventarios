@extends('Layaouts.admin')
@section('contenido')
<div class="row" style="">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h1 >Nuevo Usuario</h1>
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
  {!! Form::open(array('url'=>'Usuario','method'=>'POST','autocomplete'=>'off','files'=>true)) !!}
 {{Form::token()}}

 <div class="row">

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">nombre</label>
    <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" value="{{old("nombre")}}" name="nombre"  placeholder="nombre">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Apellido Paterno</label>
    <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio" value="{{old("apellido_pa")}}" name="apellido_pa"  placeholder="Apellido Paterno">
     </div>
   </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Apellido Materno</label>
    <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio" value="{{old("apellido_ma")}}" name="apellido_ma"  placeholder="Apellido Materno">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text"  onkeypress="return controltag(event)" maxlength="9"  class="form-control"  id="telefono" size="9" required="Campo Obligatorio" value="{{old("telefono")}}" name="telefono"  placeholder="Telefono">
     </div>
   </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">N°DNI</label>
    <input  onkeypress="return controltag(event)" maxlength="8" class="form-control"  id="dni" required="Campo Obligatorio" value="{{old("dni")}}" name="dni"  placeholder="DNI">
     </div>
   </div>
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="username" required="Campo Obligatorio" value="{{old("username")}}" name="username"  placeholder="Correo">
     </div>
   </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Departamento</label>
    <select name="departamento" class="form-control">
       <option value="">Seleccione departamento</option>
      @foreach($departamento as $depa)
      <option value="{{$depa->idDepartamento}}">{{$depa->nombre_depar}}</option>
      @endforeach
    </select>
     </div>
   </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Sexo</label>
    <select name="sexo" class="form-control">
       <option value="">Seleccione tu sexo</option>

      <option value="Masculino">Masculino</option>
        <option value="Femenino">Feminino</option>
    </select>
     </div>
   </div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <label for="exampleInputEmail1">Fecha Cumpleaños</label>
<div class="input-group date"  data-provide="datepicker">
    <input type="text" value="{{old("Fecha_cumple")}}" name="Fecha_cumple" placeholder="Fecha Cumpleaños" id="date" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>

 </div>
 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
    <label for="exampleInputEmail1">Rol</label>
    <select name="rol" class="form-control" onreset="" >
        <option value="">Seleccione tu Rol</option>
        @foreach($rol as $ro)
        <option value="{{$ro->idRol}}">{{$ro->nombre_rol}}</option>
      @endforeach
    </select>
     </div>
 </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="text" class="form-control" id="email" required="Campo Obligatorio" value="{{old("email")}}" name="email"  placeholder="email">
     </div>
   </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="password" required="Campo Obligatorio" value="{{old("password")}}" name="password"  placeholder="password">
     </div>
   </div>
   <div  class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
 <div class="form-group">
    <label for="exampleInputEmail1">Imagen</label>
  <center><input type="file" class="form-control" id="imagen" align="right" width="48" height="48" name="imagen"></center>
     </div>
   </div>
   </div>
</center>
<center>
 <div class="form-group">
              <button class="btn btn-primary"  type="submit">Guardar</button>
            <a href="{{url('Usuario')}}"
            ><button class="btn btn-danger" style="margin: 20px" type="button">Cancelar</button></a>
           </div>

</center>
  {!!Form::close()!!}
    @endsection
@section('footer_scripts')

    <script>
        function controltag(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            patron =/[0-9\s]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
    </script>

@endsection