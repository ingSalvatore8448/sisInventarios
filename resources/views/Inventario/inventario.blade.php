@extends('layaouts.admin')

  @section('contenido')
      <!-- Main content -->
      <section class="content">

          @if(Auth::user()->idRol==1)
              <div class="callout callout-danger">
                  <h4>Inventario</h4>

                  <p>Bienvenido Administrador:<strong><span class="hidden-xs"> {{ Auth::user()->username }}</span></strong>al inventario de los mobiliarios</p>
              </div><br>
              @elseif(Auth::user()->idRol==2)
              <div class="callout callout-info">
                  <h4>Inventario</h4>

                  <p>Bienvenido Docente:<strong><span class="hidden-xs"> {{ Auth::user()->username }}</span></strong>Sea cuidadoso al realizar Inventario</p>
              </div><br>
          @endif

<input value="{{ Auth::user()->Persona_idPersona }}" id="iduser" type="hidden">
          @if(Auth::user()->idRol==1)
          <div class="input-group">
              <div class="input-group-btn">
                  <button type="button" class="btn btn-danger">Buscar Docente</button>
              </div>
              <!-- /btn-group -->
              <input type="text" id="docente" name="docente" class="form-control">
          </div><br>
      @endif
          <!-- Default box -->
              @if(Auth::user()->idRol==1)
          <div class="box">
              <input type="text" class="form-control" id="idPersona"
                     required="Campo Obligatorio" hidden  name="idPersona"  placeholder="Descripcion">
              <div class="box-header with-border">
                  <h3 class="box-title">Inventario de Mobiliarios</h3><br>
                <br>  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="table-responsive">
                              <table id="tbinve" class="table">
                                  <thead>
                                  <th>Responsable</th>
                                  <th>Mobiliario</th>
                                  <th>Marca</th>
                                  <th>Serie</th>
                                  <th>Fecha del Invenatrio</th>
                                  <th>Departamento</th>
                                  <th>Categoria</th>
                                  <th>Descripcion</th>
                                  <th>Estado</th>
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
              @endif
              @if(Auth::user()->idRol==2)
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Inventario de Mobiliarios</h3><br>
                      <br>  <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                  <table id="tbmobi" class="table">
                                      <thead>
                                      <th>Responsable</th>
                                      <th>Mobiliario</th>
                                      <th>Marca</th>
                                      <th>Serie</th>
                                      <th>Fecha del Invenatrio</th>
                                      <th>Departamento</th>
                                      <th>Categoria</th>
                                      <th>Descripcion</th>
                                      <th>Estado</th>
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
          @endif
          <!-- /.box -->

      </section>
      <!-- /.content -->
      <div class="modal fade modal-slide-in-right" aria-hidden="true"
           role="dialog" tabindex="-1" id="updatePro">
          <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="modal-header">
                      <h1 class="modal-title">Inventariado</h1>

                  </div>
                  <div class="modal-body">
                      <form id="UpdateInven"  >
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
                                      <select class="form-control" id="estado"required="Campo Obligatorio" name="estado">
                                          <option value="bueno">Bueno</option>
                                          <option value="regular">Regular</option>
                                          <option value="malo">Malo</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Departamento</label>
                                      <select class="form-control" id="departamento"
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
                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Descripcion</label>
                                      <input type="text" class="form-control" id="descripcion"
                                             required="Campo Obligatorio" name="descripcion"  placeholder="Descripcion">
                                  </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Nombre Responsable</label>
                                      <input type="text" class="form-control" id="nombres"
                                             required="Campo Obligatorio" readonly="readonly" name="nombre"  placeholder="Descripcion">
                                  </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Apellidos Responsable</label>
                                      <input type="text" class="form-control" id="apellidos"
                                             required="Campo Obligatorio" readonly="readonly"  name="apelli"  >
                                      <input type="hidden" class="form-control" id="idpersona"
                                             required="Campo Obligatorio"  name="idpersona"  placeholder="Descripcion">
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



      @endsection

@section('footer_scripts')
    <script>
        var table;
        var idMobi=$('#iduser').val();

            $('#docente').autocomplete({
                source:function (request ,response) {
                    $.ajax({
                        url:'{{url('cargarCliente')}}',
                        dataType:'json',
                        type:'get',
                        data:{
                            texto:request.term
                        },
                        success:function (data) {
                            response(data.list_cliente);
                        }

                    });

                },
                delay:900,
                minlength:8,
                select:function (event,ui) {

                    $('#docente').val(ui.item.value);

                   $('#idPersona').val(ui.item.idpersona);
                    table = $('#tbinve').dataTable({
                        stateSave: true,
                        responsive: true,
                        processing: false,
                        serverSide : true,
                        bDestroy: true,
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

                        ajax: '{{url('InventarioAdmin')}}/'+ui.item.idpersona,


                        columns: [
                            {data: 'fullname', name:'fullname'},
                            {data: 'nombre_Mobi', name:'nombre_Mobi'},
                            {data: 'marca_Mobi', name:'marca_Mobi'},
                            {data: 'serie_Mobi',name:'serie_Mobi'},
                            {data: 'fecaRe_Mobi', name:'fecaRe_Mobi'},
                            {data: 'nombre_depar',name:'nombre_depar'},
                            {data: 'nombre_cate',name:'nombre_cate'},
                            {data: 'comentario', name:'Comentario'},
                            {data: 'estado',name:'estado'},




                        ]



                    });
                    return false;




                }
            });




        function Vincular(idMobiliario) {

            if(idMobiliario){
                $.ajax({
                    url: '{{url('cargarMobi')}}/' + idMobiliario,
                    dataType: 'json',
                    type: 'get',
                    success:function (response) {
                     $.each(response.mobi,function (index,mobi) {
                         $('#nombre').val(mobi.nombre_Mobi);
                         $('#marca_mobi').val(mobi.marca_Mobi);
                         $('#serie_mobi').val(mobi.serie_Mobi);
                         $('#nombres').val(mobi.nombre);
                         $('#idpersona').val(mobi.idPersona);
                         $('#apellidos').val(mobi.apellido_Paterno+' '+mobi.apellido_Materno);


                         $.each(response.cate,function (index,cate) {
                             if(cate.idcategoria===mobi.categoria_idcategoria){
                                 $('#categoria').append('<option  value='+cate.idcategoria+' selected>'+cate.nombre_cate+'</option>');
                             } else {
                                 $('#categoria').append('<option  value='+cate.idcategoria+' >'+cate.nombre_cate+'</option>');
                             }


                         });
                         $.each(response.depa,function (index,depar) {
                             if(depar.idDepartamento===mobi.Departamento_idDepartamento){
                                 $('#departamento').append('<option  value='+depar.idDepartamento+' selected>'+depar.nombre_depar+'</option>');
                             }else {
                                 $('#departamento').append('<option  value='+depar.idDepartamento+' >'+depar.nombre_depar+'</option>');
                             }

                         })


                     });
                     $('#updaMobi').click(function (e) {
                         var frm=$('#UpdateInven');
                         $.ajaxSetup({
                             headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                         });
                         e.preventDefault();
                         $.ajax({
                             url:'{{url('regisInven')}}/'+idMobiliario,
                             dataType:'json',
                             type:'post',
                             data:frm.serialize(),
                             success:function (response) {
                                 $('#updatePro').modal('hide');
                                 swal({
                                     position: 'center',
                                     type: 'success',
                                     title: 'Exito al realizar  Inventario',
                                     showConfirmButton: false,
                                     timer: 1500
                                 });
                                 table.ajax.reload(null,false);

                             }
                         });

                     })

                    }



            })
            }

        }
        $('body').on('hidden.bs.modal', '.modal', function () {

            $("#categoria").empty();
            $("#departamento").empty();


        });
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
            ajax: '{{url('Inventario')}}/'+idMobi,
            columns: [
                {data: 'fulname', name:'fulname'},
                {data: 'nombre_Mobi', name:'nombre_Mobi'},
                {data: 'marca_Mobi', name:'marca_Mobi'},
                {data: 'serie_Mobi',name:'serie_Mobi'},
                {data: 'fecaRe_Mobi', name:'fecaRe_Mobi'},
                {data: 'nombre_depar',name:'nombre_depar'},
                {data: 'nombre_cate',name:'nombre_cate'},
                {data: 'comentario', name:'Comentario'},
                {data: 'estado',name:'estado'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    </script>
    @endsection