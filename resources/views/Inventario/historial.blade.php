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
                                <th>Opciones</th>
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
    <div class="modal fade modal-slide-in-right" aria-hidden="true"
         role="dialog" tabindex="-1" id="updaInv">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header">
                    <h1 class="modal-title">Actualizar Inventario</h1>

                </div>
                <div class="modal-body">
                    <form id="UpdateHist"  >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Mobiliario</label>
                                    <input type="text" readonly="readonly" class="form-control" id="his_nombre" required="Campo Obligatorio" name="nombre" placeholder="nombre" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marca</label>
                                    <input type="text" readonly="readonly" class="form-control" id="his_marca_mobi" required="Campo Obligatorio"
                                           name="marca_mobi"  placeholder="Marca">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Serie</label>
                                    <input type="text" readonly="readonly" class="form-control" id="his_serie_mobi" required="Campo Obligatorio"
                                           name="serie_mobi" placeholder="Serie" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado Inventario</label>
                                    <select class="form-control" id="his_estado"required="Campo Obligatorio" name="estado">
                                        <option value="bueno">bueno</option>
                                        <option value="regular">regular</option>
                                        <option value="malo">malo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Departamento</label>
                                    <select readonly="readonly" class="form-control" id="his_departamento"
                                            name="departamento" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categoria</label>
                                    <select readonly="readonly" class="form-control" id="his_categoria"
                                            required="Campo Obligatorio"  name="Categoria" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <label for="exampleInputEmail1">Fecha Inventario</label>
                                <div class="input-group date"  data-provide="datepicker">
                                    <input type="text" name="fecha_regi" id="his_fecha_regi" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripcion Inventario</label>
                                    <input type="text"  class="form-control" id="his_descripcion"
                                           required="Campo Obligatorio" name="descripcion"  placeholder="Descripcion">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre Responsable</label>
                                    <input type="text" class="form-control" id="his_nombres"
                                           required="Campo Obligatorio" readonly="readonly" name="nombre"  placeholder="Descripcion">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellidos Responsable</label>
                                    <input type="text" class="form-control" id="his_apellidos"
                                           required="Campo Obligatorio" readonly="readonly"  name="apelli"  >
                                    <input type="hidden" class="form-control" id="idpersona"
                                           required="Campo Obligatorio"  name="idpersona"  placeholder="Descripcion">


                                </div>
                            </div>


                        </div><br>
                        <center><div class="modal-footer">
                                <button type="button"  id="prueba" class="btn btn-default"data-dismiss="modal" >Close</button>
                                <button type="button"  class="btn btn-success" id="actua">Actualizar</button>
                            </div></center>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('footer_scripts')


    <script>
        var idMobi=$('#iduser').val();
        var tabla;
        $(document).ready( function () {
          tabla=  $('#tbIstori').DataTable({

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
                    {data: 'action', name: 'action', orderable: false, searchable: false},


                ]





            });

        } );
        function actualizaIn(iddetalleMobiliario) {

            if(iddetalleMobiliario){
                $.ajax({
                    url: '{{url('cargar/histo')}}/' + iddetalleMobiliario,
                    dataType: 'json',
                    type: 'get',
                    success:function (response) {
                        $.each(response.mobi,function (index,mobi) {
                            $('#his_nombre').val(mobi.nombre_Mobi);
                            $('#his_marca_mobi').val(mobi.marca_Mobi);
                            $('#his_serie_mobi').val(mobi.serie_Mobi);
                            $('#his_descripcion').val(mobi.DescripMobiliario);
                            $('#his_estado').val(mobi.EstadoMob);
                            $('#his_fecha_regi').val(mobi.RegisFechaMobi);
                            $('#his_nombres').val(mobi.nombre);
                            $('#his_apellidos').val(mobi.apellido_Paterno+' '+mobi.apellido_Materno);


                            $.each(response.cate,function (index,cate) {
                                if(cate.idcategoria===mobi.categoria_idcategoria){
                                    $('#his_categoria').append('<option  value='+cate.idcategoria+' selected>'+cate.nombre_cate+'</option>');
                                } else {
                                    $('#his_categoria').append('<option  value='+cate.idcategoria+' >'+cate.nombre_cate+'</option>');
                                }


                            });
                            $.each(response.depa,function (index,depar) {
                                if(depar.idDepartamento===mobi.Departamento_idDepartamento){
                                    $('#his_departamento').append('<option  value='+depar.idDepartamento+' selected>'+depar.nombre_depar+'</option>');
                                }else {
                                    $('#his_departamento').append('<option  value='+depar.idDepartamento+' >'+depar.nombre_depar+'</option>');
                                }

                            });

                            $('#actua').click(function (e) {
                                var frm=$('#UpdateHist');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                e.preventDefault();
                                $.ajax({
                                    url:'{{url('Update/histo/')}}/'+iddetalleMobiliario,
                                    dataType:'json',
                                    type:'post',
                                    data:frm.serialize(),
                                    success:function (response) {
                                        $('#updaInv').modal('hide');
                                        swal({
                                            position: 'center',
                                            type: 'success',
                                            title: 'Actualizado  Correctamente',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });




                                    },
                                    Error:function () {
                                      alert('error');
                                    }
                                });
                                setTimeout(window.location.reload.bind(window.location), 1000);
                                return false;
                            })


                        });


                    }



                })
            }

        }

        $('body').on('hidden.bs.modal', '.modal', function () {

            $("#his_categoria").empty();
            $("#his_departamento").empty();


        });
    </script>
    @endsection