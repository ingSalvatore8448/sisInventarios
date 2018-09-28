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
    <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio" value="{{old("nombre")}}" name="apellido_pa"  placeholder="Apellido Paterno">
     </div>
   </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Apellido Materno</label>
    <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio" value="{{old("nombre")}}" name="apellido_ma"  placeholder="Apellido Materno">
     </div>
   </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text" maxlength="5"  class="form-control"  id="telefono" size="9" required="Campo Obligatorio" value="{{old("nombre")}}" name="telefono"  placeholder="Telefono">
     </div>
   </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">N°DNI</label>
    <input type="number"  class="form-control"  id="dni" required="Campo Obligatorio" value="{{old("nombre")}}" name="dni"  placeholder="DNI">
     </div>
   </div>
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" id="Correo" required="Campo Obligatorio" value="{{old("nombre")}}" name="correo"  placeholder="Correo">
     </div>
   </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Departamento</label>
    <select name="departamento" class="form-control">
       <option value="selecione categoria"></option>
      @foreach($departamento as $depa)
      <option value="{{ $depa->idDepartamento}}">{{$depa->nombre_depar}}</option>
      @endforeach
    </select>
     </div>
   </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Sexo</label>
    <select name="sexo" class="form-control">
       <option value="selecione categoria"></option>

      <option value="Masculino">Masculino</option>
        <option value="Femenino">Feminino</option>
    </select>
     </div>
   </div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <label for="exampleInputEmail1">Fecha Cumpleaños</label>
<div class="input-group date"  data-provide="datepicker">
    <input type="text" name="Fecha_cumple" placeholder="Fecha Cumpleaños" id="date" class="form-control">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>

 </div>
 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
    <label for="exampleInputEmail1">Rol</label>
    <select name="rol" class="form-control" onreset="" >
        @foreach($rol as $ro)
        <option value="{{$ro->idRol}}">{{$ro->nombre_rol}}</option>
      @endforeach
    </select>
     </div>
 </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="email" required="Campo Obligatorio" value="{{old("nombre")}}" name="email"  placeholder="Usuario">
     </div>
   </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="usuarios" required="Campo Obligatorio" value="{{old("nombre")}}" name="password"  placeholder="password">
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
    <script type="text/javascript">
        var numero="1234567890";
        $(document).ready(function(){
            validarCualquierNumero()
        });
        function validarCualquierNumero(){
            $(".numeric").numeric();
            $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
            $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
            $(".positive-integer").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });
            $(".decimal-2-places").numeric({ decimalPlaces: 2 });
            $(".decimal-3-places").numeric({ decimalPlaces: 3 });
            $("").keypress(function (e) {
                var caracter=String.fromCharCode(e.which);
                if(numero.indexOf(caracter)<0)
                    return false;

            });
            $("#remove").click(
                function(e)
                {
                    e.preventDefault();
                    $(".numeric,.integer,.positive,.positive-integer,.decimal-2-places").removeNumeric();
                }
            );
        }
    </script>

    @endsection