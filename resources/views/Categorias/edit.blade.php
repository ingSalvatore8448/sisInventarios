@extends('layaouts.admin')
@section('contenido')

<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
	<H3>Editar Categoria</H3>
    @if (count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)

        <li> {{$error}}</li>
    @endforeach
    </ul>
</div>
    @endif

    



{!!Form::model($categoria,['method'=>'PATCH','route'=>['Categorias.update',$categoria->idcategoria]])!!}

{{Form::token()}}
 <div class="form-group">
    <label for="exampleInputEmail1">Categorias</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre_cate}}" placeholder="Categoria">
     </div>
       <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
           <a href="Categorias"><button class="btn btn-danger" type="button">Cancelar</button></a>
            </div>

{!!Form::close()!!}		
</div>
</div>
  @endsection