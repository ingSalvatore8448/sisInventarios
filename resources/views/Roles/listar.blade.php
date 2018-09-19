
@extends('layaouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
		<h3>Listado de Categorías <a data-toggle="modal" data-target="#regi"><button class="btn btn-success">Nuevo</button></a></h3>
@include('Roles.search')
			
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
            @foreach($rol as $ro)
					<tr>
						<td>{{$ro->nombre_rol}}</td>
						<td>
						<a href="" data-target="#modal-update-{{$ro->idRol}}" data-toggle="modal"><button class="btn btn-info">Editar</button></a>

			<a href="" data-target="#modal-delete-{{$ro->idRol}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>


                    </td>


					</tr>
@include('Roles.modaldelete')
@include('Roles.modaledit')

                  @endforeach
				</table>

			</div>
		{{$rol->render()}}
		</div>

	</div>
      <!-- modal Cretae-->

      <div id="regi" class="modal fade" role="dialog" >

	{!! Form::open(array('url'=>'Roles','method'=>'POST','autocomplete'=>'off')) !!}
 {{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Rol</h3>
			</div>
			
				<div class="modal-body">				
					<div class="form-group">
						<label for="name">Rol</label>
						<input type="text" name="nombre" class="form-control" placeholder="Rol..">
					</div>
								
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" id="submit">
				</div>
			
		</div>
	</div>
	
</div>
 {!!Form::close()!!}   



  @endsection
