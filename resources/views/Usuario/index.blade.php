@extends('layaouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Listado de Usuario<a href="Usuario/create" ><button class="btn btn-success">Nuevo</button></a></h3>
			@include('Usuario.seachUser')

		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table">
					<thead>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>telefono</th>
					<th>DNI</th>
					<th>correo</th>
					<th>sexo</th>
					<th>Cumpleaños</th>
					<th>usuario</th>
					<th>Rol</th>
					<th>Departamento</th>
					<th>imagen</th>
					<th>Opciones</th>
					</thead>
					<tr>
					@foreach ($user as $use)
						<tr>
							<td>{{$use->nombre}}</td>
							<td>{{$use->apellido_Paterno.' '.$use->apellido_Materno}}</td>
							<td>{{$use->telefono}}</td>
							<td>{{$use->dni}}</td>
							<td>{{$use->correo}}</td>
							<td>{{$use->sexo}}</td>
							<td>{{$use->Fecha_cumple}}</td>
							<td>{{$use->email}}</td>
							<td>{{$use->nombre_rol}}</td>
							<td>{{$use->nombre_depar}}</td>
							<td> <img src="{{asset('Imagenes/Usuarios/'.$use->imagen)}}" alt="{{ $use->nombre}}" height="60px" width="60px" class="img-thumbnail"></td>
							<center><td>
									<a href="{{URL::action('UsuarioController@show', $use->idPersona)}}"  > <span class="glyphicon glyphicon-eye-open"></span></a>

									<a href="" data-target="#modal-delete-{{$use->id}}" data-toggle="modal">
										<span class="glyphicon glyphicon-trash" style="color: black; width: 10px"></span>
									</a> </td>

							</center>
						</tr>

						@include('Usuario.eliminar')
					@endforeach

				</table>

			</div>
			{{$user->render()}}

		</div>
	</div>


@endsection