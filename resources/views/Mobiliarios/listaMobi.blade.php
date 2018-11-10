@extends('layaouts.admin')
@section('contenido')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Mobiliarios</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table id="tbmobi" class="table">
                    <thead>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Serie</th>
                    <th>Fecha</th>
                    <th>Comentario</th>
                    <th>Departamento</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Estado</th>

                    <th>Opciones</th>
                    </thead>
                </table>

            </div>
        </div>
    </div>


@endsection

@section('footer_scripts')

    <script type="text/javascript">
$(document).ready(function () {
    $('#tbmobi').dataTable({
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
               ajax: '{{url('mobiliario')}}',

            columns: [
                {data: 'nombre_Mobi', name:'nombre_Mobi'},
                {data: 'marca_Mobi', name:'marca_Mobi'},
                {data: 'serie_Mobi',name:'serie_Mobi'},
                {data: 'fecaRe_Mobi', name:'fecaRe_Mobi'},
                {data: 'comentario', name: 'comentario'},
                {data: 'nombre_depar',name:'nombre_depar'},
                {data: 'nombre_cate',name:'nombre_cate'},
                {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                {data: 'estado',name:'estado'},
                {data: 'action', name: 'action', orderable: false, searchable: false},


            ]



    });

});


    </script>
@endsection