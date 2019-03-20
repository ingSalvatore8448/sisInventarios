@extends('Layaouts.admin')
@section('contenido')


    <style type="text/css">
        body {
            font-family: 'Varela Round', sans-serif;
        }
        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>


    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
<div class="container-fluid">
		<h3>Lista de Departamento <a data-toggle="modal" id="add_data"><button class="btn btn-success">Nuevo</button></a></h3>
    
    <div class="table-responsive">
        <table class="table table-striped" id="users-table">
            <thead>
                <tr>
                    <th>Nombre departamento</th>
                    <th>Estado</th>
                     <th>Operaciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

    </div>

<!-- start addmodal-->
<div class="modal fade" tabindex="-1" role="dialog" id="mdlAddData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar departamento</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmDataAdd">
                    <div class="form-group">
                        <label for="name" class="control-label">
                            Nombre departamento<span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="nombre_Depar">
                        <p class="errorName text-danger hidden"></p>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">
                            Nombre estado<span class="required">*</span>
                        </label>
                        <select type="text"  class="form-control" id="name" name="estado">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnSave"><i class="glyphicon glyphicon-save"></i>&nbsp;Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- start endmodal-->




   <!--  modal editar -->

<div class="modal fade" tabindex="-1" role="dialog" id="mdlEditData">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Departamento</h4>
            </div>
            <div class="modal-body">
            <form role="form" id="frmDataEdit">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="edit_ID" name="edit_ID" disabled>
                </div>
                <div class="form-group">
                    <label for="edit_name" class="control-label">
                    Nombre Departamento<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name">
                    <p class="edit_errorName text-danger hidden"></p>
                </div>
                <div class="form-group">
                    <label for="edit_name" class="control-label">
                        Estado Departamento <span class="required">*</span>
                    </label>
                    <input type="text" disabled class="form-control" id="estado" name="estado">
                    <p class="edit_errorName text-danger hidden"></p>
                </div>
            </form>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
                <button type="button" class="btn btn-primary" id="btnUpdate"><i class="glyphicon glyphicon-save"></i>&nbsp;Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end editmodal-->
<!--  vermodal-->


    <div id="deletD" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="icon-box">
                        <i class="fa fa-trash"></i>
                    </div>
                    <h4 class="modal-title">Estas seguro?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>¿Realmente quieres borrar estos registro? Este proceso no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel"  class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="submit"  id="delete"   class="btn btn-danger" >Eliminar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('footer_scripts')

<script type="text/javascript" charset="utf-8" async defer>
 var table;
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
        ajax: '{!! route('Departamen.index') !!}',
        columns: [

            { data: 'nombre_depar', name: 'nombre_depar' },
            { data: 'depa_estado', name: 'depa_estado' },
            { "data": "action", orderable:false, searchable: false}
           
        ]
    });
})
$('#add_data').click(function (e) {
   $ ('#mdlAddData').modal('show');

})

 //Adding new data

 $('#btnSave').click(function (e) {
     e.preventDefault();
        var frm = $('#frmDataAdd');
        $.ajax({
            url : 'http://127.0.0.1:8000/Departamen',
            type : 'POST',
            dataType: 'json',
            data : frm.serialize(),
            success:function(data){

                   frm.trigger('reset');
                   $('#mdlAddData').modal('hide');
                   swal('Success!','Registro completo','success');
                   table.ajax.reload(null,false);

            }
        });
    });


//cargar informacion de la lista


        $('#users-table').on('click','.btnEdit[data-edit]',function(e){
            e.preventDefault();
            var url = $(this).data('edit');
            $.ajax({
                url : url,
                type : 'GET',
                datatype : 'json',
                success:function(data){
                    $('#edit_ID').val(data.idDepartamento);
                    $('#edit_name').val(data.nombre_depar);
                    $('#estado').val(data.depa_estado);
                    $('.edit_errorName').addClass('hidden');
                    $('#mdlEditData').modal('show');

                }

            });

    });
  <!--eliminar-->
function eliminar(idDepartamento) {
    if(idDepartamento){
        $('#delete').click(function () {

                $.ajax({
                    url:'delete/'+idDepartamento,
                    dataType:'json',
                    type:'get',
                    success:function (response) {

                        $('#deletD').modal('hide');
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Eliminado Correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.ajax.reload(null,false);


                    }


                });





        });
    }
}


// updating data infomation
    $('#btnUpdate').on('click',function(e){
        e.preventDefault();
        var url = "http://127.0.0.1:8000/Departamen/"+$('#edit_ID').val();
        var frm = $('#frmDataEdit');
        $.ajax({
            type :'PUT',
            url : url,
            dataType : 'json',
            data : frm.serialize(),
            success:function(data){
                // console.log(data);

                    // console.log(data);
                $('.edit_errorName').addClass('hidden');
                frm.trigger('reset');
                $('#mdlEditData').modal('hide');
                swal('Success!','Categorias actualisado correctamente','success');
                table.ajax.reload(null,false);

            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('porfavor buelva a cargar su formulario');
                }
        });
    });
 $('#users-table').on('click','.edit',function(e){
     var id = $(this).attr("id");

     var url="{!! route('showdepar') !!}"
     $.ajax({
         url : url,
         type : 'GET',
         data:{id:id},
         datatype : 'json',
         success:function(data){
             $('#nombre_depar').val(data.nombre_depar);
             $('#student_id').val(id);
             $('#mdlVerData').modal('show');


         }

     });

 });
 $('#deletD').on('hidden.bs.modal', function (e) {
     // do something...

 })
</script>
@endsection


