@extends('Layaouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
    <div class="container-fluid">
        <h3>Listado de Departamento <a data-toggle="modal" id="ADCate"><button class="btn btn-success">Nuevo</button></a></h3>
        <div class="table-responsive">
            <table class="table table-striped" id="users-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
        </div>
    </div>

    <!-- start addmodal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="mlcate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Categoria</h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="frmCateAdd">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="cate_id" name="cate_id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">
                                nombre departamento<span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="nombre_Cate" name="nombre_Cate">
                            <p class="errorName text-danger hidden"></p>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="savct"><i class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="mlcat">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Categoria</h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="frmCateAdd">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="cate_id" name="cate_id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">
                                nombre departamento<span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="nombre_Cate" name="nombre_Cate">
                            <p class="errorName text-danger hidden"></p>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="savct"><i class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- start endmodal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="mdlEditData">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Form</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="frmDataEdit">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="cate_id" name="cate_id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nombre_Cate" class="control-label">
                                Name<span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                            <p class="edit_errorName text-danger hidden"></p>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnUpdate"><i class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript" charset="utf-8" async defer>
        var table;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            table = $('#users-table').DataTable({
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
                ajax: '{!! route('Categorias.index') !!}',
                columns: [
                    { data: 'idcategoria', name: 'idcategoria' },
                    { data: 'nombre_cate', name: 'nombre_cate' },
                    { "data": "action", orderable:false, searchable: false}

                ]
            });
        })

$('#ADCate').click(function () {
    $('#mlcate').modal('show');
})
        $('#savct').click(function (e) {

            e.preventDefault();
            var frm=$('#frmCateAdd');
            var route='http://localhost:8000/Categorias'
            $.ajax({
                url:route,
                type:'POST',
                dataType:'json',
                data : {
                    'csrf-token': $('input[name=_token]').val(),
                    name : $('#nombre_Cate').val(),

                },
                success:function (data) {
                   $('.errorName').addClass('hidden');
                   if(data.errors){
                       if(data.errors.name){
                           $('.errorName').removeClass('hidden');
                           $('.errorName').text(data.errors.name);
                       }

                   }

                   if(data.success==true){

                       $('#mlcate').modal('hide');
                       frm.trigger('reset');
                       table.ajax.reload(null,false);
                       swal('success!','Se registro Categoria Correctamente','success')

                   }



                }


            });

        });

        $('#users-table').on('click','.btnEdit[data-edit]',function(e){
            e.preventDefault();
            var url = $(this).data('edit');
            $.ajax({
                url : url,
                type : 'GET',
                datatype : 'json',
                success:function(data){
                    $('#cate_id').val(data.idcategoria);
                    $('#nombre').val(data.nombre_cate);
                    $('.edit_errorName').addClass('hidden');
                    $('#mdlEditData').modal('show');

                }

            });

        });


         $('#btnUpdate').on('click',function(e) {
             e.preventDefault();
             var url="http://localhost:8000/Categorias/"+$('#cate_id').val();
             var frm=$('#frmDataEdit');
             $.ajax({
                 type:'PUT',
                 url:url,
                 dataType:'json',
                 data : frm.serialize(),
                 success:function (data) {

                     if(data.errors){
                         if(data.errors.nombre){
                             $('.edit_errorName').removeClass('hidden');
                             $('.edit_errorName').text(data.errors.nombre);
                         }
                     }
                         if (data.success == true) {
                             // console.log(data);
                             $('.edit_errorName').addClass('hidden');
                             frm.trigger('reset');
                             $('#mdlEditData').modal('hide');
                             swal('Success!','Categorias actualisado correctamente','success');
                             table.ajax.reload(null,false);
                         }


                 },
                 error: function (jqXHR, textStatus, errorThrown)
                 {
                     alert('porfavor buelva a cargar su formulario');
                 }
             });
         });

    </script>
    @endsection