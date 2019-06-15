<div id="modal-update-{{$persona1->id}}" class="modal fade" role="dialog" >
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            {{Form::Open(array('action'=>array('PerfController@updateUser',$persona1->id),'method'=>'patch'))}}
            {{Form::token()}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h3>Editar Usuario</h3>

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)

                                        <li> {{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach

                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Correo</label>
                            <input type="text" name="email"  value="{{$persona1->email}}" class="form-control" >
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="username"  value="{{$persona1->username}}" class="form-control">
                        </div>
                    </div>
                    <div style="padding-bottom: 50px"  class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                            @if(($persona1->imagen)!="")
                                <img src="{{asset('/Imagenes/Usuarios/'.$persona1->imagen)}}" height="100px" width="100px" class="img-thumbnail">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" id="submit">
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>