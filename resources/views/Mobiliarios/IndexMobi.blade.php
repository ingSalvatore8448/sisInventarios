@extends('layaouts.admin')
@section('contenido')

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Mobiliarios</h3>
@include('Mobiliarios.searchMobi')
			
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="myTable" class="table">
				<thead>
		
				    <th>Nombre</th>
					<th>Marca</th>
					<th>Serie</th>
					<th>Cantidad</th>
					<th>Fecha</th>
					<th>Comentario</th>
					<th>Departamento</th>
					<th>Categoria</th>
					<th>Imagen</th>
					<th>Estado</th>
					
					<th>Opciones</th>
				</thead>
               @foreach ($mobiliarios as $mobi)

				<tr>
					<td>{{ $mobi->nombre_Mobi}}</td>
					<td>{{ $mobi->marca_Mobi}}</td>
				    <td>{{ $mobi->serie_Mobi}}</td>
					<td>{{ $mobi->cantidad_Mobi}}</td>
					<td>{{ $mobi->fecaRe_Mobi}}</td>
					<td>{{ $mobi->comentario}}</td>
					<td>{{ $mobi->nombre_depar}}</td>
					<td>{{ $mobi->nombre_cate}}</td>
					<td>
					<img src="{{asset('Imagenes/Mobiliario/'.$mobi->imagen)}}" alt="{{ $mobi->nombre_Mobi}}" height="60px" width="60px" class="img-thumbnail">	
					</td>
					<td>{{ $mobi->estado}}</td>
			
					<td>

						<a href="{{URL::action('MobiliarioController@edit', $mobi->idMobiliario)}}"><button  class="btn btn-info"  >
								<i class="fa fa-edit" aria-hidden="true"></i>

							</button></a>

						 <a href="" data-target="#modal-delete-{{$mobi->idMobiliario}}" data-toggle="modal"><button  class="btn btn-danger">

								 <i class="fa fa-trash" aria-hidden="true"></i>

							 </button></a>
						@if($mobi->estado==1){
						<a href="" data-target="" data-toggle="modal"><button  class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

						}@else{
						<a href="" data-target="" data-toggle="modal"><button  class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
						}
							@endif


	
                    </td>


				</tr>
						
			    	@include('Mobiliarios.deletem')
				@endforeach

			</table>

		</div>
		{{$mobiliarios->render()}}
			
	</div>
</div>
 
@endsection


