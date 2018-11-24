@extends('layaouts.admin')

@section('contenido')
    <!-- Main content -->
    <section class="content">

            <div class="callout callout-success">
                <h4>Historial de los Mobiliarios</h4>

                <p>Bienvenido Administrador:<strong><span class="hidden-xs"> {{ Auth::user()->username }}</span></strong>  Historial General de los Inventarios</p>
            </div><br>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Descargar o Imprimir los Reportes del Inventario</h3><br>
                <br>  <div class="row">
                    <div class="col-lg-15 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="tbIstori" class="table">
                                <thead>
                                <th>Responsable</th>
                                <th>Mobiliario</th>
                                <th>Estado Registro</th>
                                <th>Marca</th>
                                <th>Fecha registro</th>
                                <th>Descripcion y serie</th>
                                <th>Departamento</th>
                                <th>Categoria</th>
                                <th>Descripcion inventario</th>
                                <th>Estado Inventario</th>
                                <th>Fecha inventario</th>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
        <label class="btn btn-warning btn-flat btn-xs"> Historial de todos los inventarios realizados por todos los docentes</label>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>

@endsection
@section('footer_scripts')


    <script>
        $(document).ready( function () {
            $('#tbIstori').DataTable({

                stateSave: true,
                responsive: true,
                processing: false,
                serverSide : true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: "SisInventario | I.E.Buen pastor",
                        text: 'Descargar en Excel',
                        className:'btn btn-danger ',

                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7,8,9,10 ]
                        }
                    },
                    {
                        extend: 'print',
                        title: "SisInventario | I.E.Buen pastor",
                        text: 'Imprimir',
                        className: 'btn btn-outline-warning btn-icon-text ',
                        exportOptions: {
                            columns: [ 0, 1,2, 3, 4, 5,6,7,8,9,10 ]
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

                ajax: '{{url('HistoGenera')}}',


                columns: [
                    {data: 'fullname', name:'fullname'},
                    {data: 'nombre_Mobi', name:'nombre_Mobi'},
                    {data: 'estado',name:'estado'},
                    {data: 'marca_Mobi', name:'marca_Mobi'},
                    {data: 'fecaRe_Mobi', name:'fecaRe_Mobi'},
                    {data: 'comse',name:'comse'},
                    {data: 'nombre_depar',name:'nombre_depar'},
                    {data: 'nombre_cate',name:'nombre_cate'},
                    {data: 'DescripMobiliario', name:'DescripMobiliario'},
                    {data: 'EstadoMob', name:'EstadoMob'},
                    {data: 'RegisFechaMobi',name:'RegisFechaMobi'},


                ]





            });

        } );
    </script>
@endsection