@extends('Layaouts.admin')

@section('contenido')
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
<div class="container-fluid">
		<h3>Listado de Departamento <a data-toggle="modal" id="add_data"><button class="btn btn-success">Nuevo</button></a></h3>
    
    <div class="table-responsive">
        <table class="table table-striped" id="users-table">
            <thead>
                <tr>
                    <th>Nombre Departamento</th>
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
                <h4 class="modal-title">Registrar Departamento</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="frmDataAdd">
                    <div class="form-group">
                        <label for="name" class="control-label">
                            nombre departamento<span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="nombre_depar">
                        <p class="errorName text-danger hidden"></p>
                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave"><i class="glyphicon glyphicon-save"></i>&nbsp;Save</button>
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
                <h4 class="modal-title">Edit Form</h4>
            </div>
            <div class="modal-body">
            <form role="form" id="frmDataEdit">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="edit_ID" name="edit_ID" disabled>
                </div>
                <div class="form-group">
                    <label for="edit_name" class="control-label">
                    Name<span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name">
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
<!-- end editmodal-->
<!--  vermodal-->
<div id="mdlVerData" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter First Name</label>
                        <input type="text" name="nombre_depar" id="nombre_depar" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
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
            data : {
                'csrf-token': $('input[name=_token]').val(), 
                 name : $('#name').val(),
        
            },
            success:function(data){
                $('.errorName').addClass('hidden');
                if (data.errors) {
                    if (data.errors.name) {
                        $('.errorName').removeClass('hidden');
                        $('.errorName').text(data.errors.name);
                    }
            
                }
                if (data.success == true) {
                    $('#mdlAddData').modal('hide');
                    frm.trigger('reset');
                     table.ajax.reload(null,false);
                    swal('success!','Se registro departamento Correctamente','success');
                    

                }
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
                            $('.edit_errorName').addClass('hidden');
                            $('#mdlEditData').modal('show');

                        }

                    });

    });
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
                if (data.errors) {

                    if (data.errors.edit_name) {
                        $('.edit_errorName').removeClass('hidden');
                        $('.edit_errorName').text(data.errors.edit_name);
                    }

                }
                if (data.success == true) {
                    // console.log(data);
                    $('.edit_errorName').addClass('hidden');
                    frm.trigger('reset');
                    $('#mdlEditData').modal('hide');
                    swal('Success!','Departamaneto actualisado correctamente','success');
                    table.ajax.reload(null,false);
                }
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

</script>
@endsection


