@extends('layaouts.admin')
@section('contenido')

    <div class="container-fluid">
        <h3>Listado de Mobiliarios<a href="Mobiliarios/create" ><button class="btn btn-success">Nuevo</button></a></h3>

        <div class="table-responsive">
            <table class="table table-striped" id="users-table">
                <thead>

                <th>NOMBRE</th>
                <th>Marca</th>
                <th>Serie</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Comentario</th>
                <th>Departamento</th>
                <th>CATEGORIA</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="modal-editPersona-">



        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <center></center>
                </div>




                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">nombre</label>
                                <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" value="" name="nombre"  >
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellido_pa" required="Campo Obligatorio"
                                       value="" name="apellido_pa"  placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_ma" required="Campo Obligatorio"
                                       value=""  name="apellido_ma" >
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type="number" class="form-control" id="telefono" required="Campo Obligatorio" value="" name="telefono"  placeholder="Telefono">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">N°DNI</label>
                                <input type="number" class="form-control" id="dni" required="Campo Obligatorio"
                                       value="" name="dni"  placeholder="DNI">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="text" class="form-control" id="Correo" required="Campo Obligatorio"
                                       value="" name="correo"  placeholder="Correo">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Departamento</label>
                                <select name="departamento" class="form-control" >
                                    @foreach($departamento as $depa)
                                        <option value="{{$depa->idDepartamento}}">{{$depa->nombre_depar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <label for="exampleInputEmail1">Fecha Cumpleaños</label>
                            <div class="input-group date"  data-provide="datepicker">
                                <input type="text" name="Fecha_cumple"  required="Campo Obligatorio" value="" id="date" class="form-control">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Rol</label>
                                <select name="rol" class="form-control" >
                                    @foreach($categoria as $ro)
                                        <option value="{{$ro->idcategoria}}">{{$ro->nombre_cate}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div  class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">

                            </div>
                        </div>
                    </div>
                    </center>
                    <center>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" id="submit">
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer_scripts')
    <script>
        var  table;
        table =   $('#users-table').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide : true,
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Ningún dato disponible en esta tabla",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            ajax: '{{route('MobiResponsable.index')}}',
            columns: [

                {data: 'nombre_Mobi', name: 'm.nombre_Mobi'},
                {data: 'marca_Mobi', name: 'm.marca_Mobi'},
                {data: 'serie_Mobi', name: 'm.serie_Mobi'},
                {data: 'cantidad_Mobi', name: 'm.cantidad_Mobi'},
                {data: 'fecaRe_Mobi', name: 'm.fecaRe_Mobi'},
                {data: 'comentario', name: 'm.comentario'},
                {data: 'nombre_depar', name: 'de.nombre_depar'},
                {data: 'nombre_cate', name: 'c.nombre_cate'},
                {data: 'imagen', name: 'm.imagen'},
                {data: 'estado', name: 'm.estado'},
                {"defaultContent": "<a href='{{route('MobiResponsable.edit',$id)}}' type='button' class='form btn btn-primary btn-xs '> EDITAR " +
                "</a> "+
                    "<button type='button'  class='form btn btn-danger btn-xs '> " +
                        "SHOW</button> "

                }

            ]
        });


    </script>
    @endsection
