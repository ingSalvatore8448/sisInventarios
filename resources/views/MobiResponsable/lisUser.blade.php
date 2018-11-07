@extends('layaouts.admin')
@section('contenido')

    <div class="container-fluid">
        <h3>Listado de Mobiliarios<a href="Mobiliarios/create" ><button class="btn btn-success">Nuevo</button></a></h3>
       <strong><h3>Reportes</h3></strong>

        <div class="table-responsive">
            <table class="table table-striped  hover  "  id="users-table">
                <thead>

                <th>NOMBRE</th>
                <th>Marca</th>
                <th>Serie</th>
                <th>Fecha</th>
                <th>Comentario</th>
                <th>Departamento</th>
                <th>CATEGORIA</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>ID</th>
                <th>Opciones</th>
                </thead>
            </table>
        </div>
    </div>
    <form id="actualidarDatos" >
        <div class="modal fade" id="modal-editMobi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Modificar país:</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre" class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre_mobi"    maxlength="2">
                            <input type="hidden" class="form-control" id="id_mobi" name="id">
                        </div>
                       </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="marca" class="control-label">Marca:</label>
                            <input type="text" class="form-control" id="marca" name="marca"  maxlength="45">
                        </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                             <div class="form-group">
                            <label for="serie" class="control-label">Serie:</label>
                            <input type="text" class="form-control" id="serie" name="serie"  maxlength="3">
                        </div>
                        </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="estado" id="esta" class="control-label">Estado:</label>
                                    <input type="text" class="form-control" id="estado"  disabled maxlength="30">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="comentario" class="control-label">Comentario:</label>
                                    <input type="text"  class="form-control" id="comentario" name="capital"  maxlength="30">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="departamento" class="control-label">Departamento:</label>
                                    <select class="form-control" id="departamento" name="departamento" >


                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cate" class="control-label">Categoria:</label>
                                    <select class="form-control" id="cate" name="cate" >

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <label for="exampleInputEmail1">Fecha</label>
                                <div class="input-group date"  data-provide="datepicker">
                                    <input type="text" name="fecha"  id="fecha" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="imagen" class="control-label">Imagen:</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" >

                                </div>
                            </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar datos</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>


@endsection
@section('footer_scripts')
    <script>
       $(document).ready(function () {
           var  table;

           table =   $('#users-table').DataTable({
               stateSave: true,
               responsive: true,
               processing: true,
               serverSide : true,
               dom: 'Bfrtip',
               buttons: [
                   {
                       extend: 'excelHtml5',
                       title: "Listado de Mobiliario",
                       exportOptions: {
                           columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                       }
                   },
                   {
                       extend: 'pdfHtml5',
                       title: "Listado de Mobiliario",
                       exportOptions: {
                           columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                       }

                   },
                   {
                       extend: 'print',
                       title: "Listado de Mobiliario",
                       exportOptions: {
                           columns: [ 0, 1,2, 3, 4, 5,6,7,8 ]
                       }

                   }



               ],
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
                   },



               },
               ajax: '{{route('MobiResponsable.index')}}',

               columns: [

                   {data: 'nombre_Mobi', name: 'nombre_Mobi'},
                   {data: 'marca_Mobi', name: 'marca_Mobi'},
                   {data: 'serie_Mobi', name: 'serie_Mobi'},
                   {data: 'fecaRe_Mobi', name: 'fecaRe_Mobi'},
                   {data: 'comentario', name: 'comentario'},
                   {data: 'nombre_depar', name: 'departamento.nombre_depar'},
                   {data: 'nombre_cate', name: 'categorias.nombre_cate'},
                   {data: 'imagen', name: 'imagen'},
                   {data: 'estado', name: 'estado'},
                   {data: 'idMobiliario', name: 'idMobiliario'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},



               ]



           });



       });


        function editar(idMobiliario) {
            if (idMobiliario){

                $.ajax({
                    url:'{{url('editar/')}}'+idMobiliario,
                    type:'get',
                    dataType:'json',

                    success:function (response) {


                    $('#nombre').val(response.mobi.nombre_Mobi);
                    $('#marca').val(response.mobi.marca_Mobi);
                    $('#serie').val(response.mobi.serie_Mobi);
                    $('#estado').val(response.mobi.serie_Mobi);
                    $('#fecha').val(response.mobi.fecaRe_Mobi);
                    $('#comentario').val(response.mobi.comentario);
                    $.each(response.depa,function (index,i) {
                        $("#departamento").append('<option value='+i.idDepartamento+'>'+i.nombre_depar+'</option>');

                    });
                    $.each(response.categoriass,function (index,val) {
                        $("#cate").append('<option value='+val.idcategoria+ '  selected >'+val.nombre_cate+ '</option>');
                    });



                    }




                });

            }


        }





    </script>
    @endsection
