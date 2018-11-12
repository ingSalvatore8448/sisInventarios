@extends('layaouts.admin')

@section('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Mobiliarios Responsable</h3>
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
                    <th>Fecha Registro</th>
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

    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="updatePro">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Actualizar Mobiliarios</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="UpdateMobi"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Mobiliario</label>
                                    <input type="text" class="form-control" id="nombre" required="Campo Obligatorio" name="nombre" placeholder="nombre" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marca</label>
                                    <input type="text" class="form-control" id="marca_mobi" required="Campo Obligatorio"
                                           name="marca_mobi"  placeholder="Marca">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Serie</label>
                                    <input type="text" class="form-control" id="serie_mobi" required="Campo Obligatorio"
                                           name="serie_mobi" placeholder="Serie" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado</label>
                                    <input type="text" readonly="readonly" class="form-control" id="estado"
                                           required="Campo Obligatorio" name="estado"  placeholder="estado">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Departamento</label>
                                    <select class="form-control" id="departamento" required="Campo Obligatorio"
                                            name="departamento" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categoria</label>
                                    <select class="form-control" id="categoria"
                                            required="Campo Obligatorio"  name="Categoria" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <label for="exampleInputEmail1">Fecha Registro</label>
                                <div class="input-group date"  data-provide="datepicker">
                                    <input type="text" name="fecha_regi" id="fecha_regi" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>


                        </div><br>
                        <center><div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button"  class="btn btn-success" id="updaMobi">Registrar</button>
                            </div></center>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--modal eliminar-->
    <div id="deletMobi" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <form id="eliminar"></form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <button type="button" id="cancel" onreset="eliminar()" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="submit"  id="delete" class="btn btn-danger" >Eliminar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')

    <script type="text/javascript">
        var table;
        $(document).ready(function () {
            table = $('#tbmobi').dataTable({
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
                    {data: 'nombre_depar',name:'nombre_depar'},
                    {data: 'nombre_cate',name:'nombre_cate'},
                    {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                    {data: 'estado',name:'estado'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},


                ]



            })

        })

        function editarMobi(idMobiliario) {
            if(idMobiliario){
                $.ajax({
                    url:'{{url('mobiliarios')}}/'+idMobiliario,
                    dataType:'json',
                    type:'get',
                    success:function (response) {
                        $.each(response.mobi,function (index,mobi) {
                            $('#nombre').val(mobi.nombre_Mobi);
                            $('#marca_mobi').val(mobi.marca_Mobi);
                            $('#serie_mobi').val(mobi.serie_Mobi);
                            $('#estado').val(mobi.estado);
                            $('#fecha_regi').val(mobi.fecaRe_Mobi);



                            $.each(response.depa,function (index,val) {


                                if(val.idDepartamento===mobi.Departamento_idDepartamento){
                                    $("#departamento").append('<option  value='+val.idDepartamento+' selected>'+val.nombre_depar+'</option>');


                                }else {
                                    $("#departamento").append('<option  value='+val.idDepartamento+' >'+val.nombre_depar+'</option>');
                                }

                            });

                            $.each(response.cate,function (index,va) {
                                if(va.idcategoria===mobi.categoria_idcategoria){
                                    $("#categoria").append('<option  value='+va.idcategoria+' selected>'+va.nombre_cate+'</option>');

                                }else {
                                    $("#categoria").append('<option  value='+va.idcategoria+' >'+va.nombre_cate+'</option>');
                                }

                            });
                        });
                        $('#updaMobi').click(function (e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            e.preventDefault();
                            var frm=$('#UpdateMobi');
                            $.ajax({
                                url:'{{url('update/mobi')}}/'+idMobiliario,
                                dataType:'json',
                                type:'post',
                                data:frm.serialize(),
                                success:function (response) {
                                    frm.trigger('reset');
                                    $('#updatePro').modal('hide');
                                    swal({
                                        position: 'center',
                                        type: 'success',
                                        title: 'Actualizado Correctamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(window.location.reload.bind(window.location), 1000);
                                    return false;

                                },
                                error:function () {
                                    alert('error al registrar');
                                }
                            })

                        })


                    },

                    Error:function () {
                        alert('error al cargar sus datos');
                    }

                })
            }

        }
        function delteMobi(idMobiliario){
            if (idMobiliario){
                $('#delete').click(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var frm=$('#eliminar');
                    $.ajax({
                        url:'{{url('eliminar')}}/'+idMobiliario,
                        dataType:'json',
                        type:'post',
                        data:frm.serialize(),
                        success:function () {
                            frm.trigger('reset');
                            $('#deletMobi').modal('hide');
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Eliminado Correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(window.location.reload.bind(window.location), 4000);
                            return false;

                        },
                        error:function () {
                            alert('error al Eliminar');
                        }


                    });
                });


            } else {
                alert('error');
            }

        }

        $('body').on('hidden.bs.modal', '.modal', function () {

            $("#categoria").empty();
            $("#departamento").empty();


        });
        $('#deletMobi').on('hidden.bs.modal', function (e) {
            // do something...
            location.reload();


        })


    </script>
@endsection