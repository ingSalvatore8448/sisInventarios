@extends('layaouts.admin')

@section('contenido')
    <!-- Main content -->
    <section class="content">
        @if(Auth::user()->idRol==1)
            <div class="callout callout-danger">
                <h4>Inventario</h4>

                <p>Bienvenido Administrador:<strong><span class="hidden-xs"> {{ Auth::user()->username }}</span></strong>   al inventario de los mobiliarios</p>
            </div><br>
        @elseif(Auth::user()->idRol==2)
            <div class="callout callout-info">
                <h4>Inventario</h4>

                <p>Bienvenido Docente:<strong><span class="hidden-xs"> {{ Auth::user()->username }}</span></strong>  Sea cuidadoso con su inventariado</p>
            </div><br>
        @endif
        <input value="{{ Auth::user()->id }}" id="iduser" type="hidden">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Historial del Inventariado</h3><br>
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
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>

    @endsection
@section('footer_scripts')


    <script>
        var idMobi=$('#iduser').val();
        $(document).ready( function () {
            $('#tbIstori').DataTable({

                stateSave: true,
                responsive: true,
                processing: false,
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
                    },



                },

                ajax: '{{url('cargarHis')}}/'+idMobi,


                columns: [
                    {data: 'fulname', name:'fulname'},
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