@extends('layouts.userDashboard')
@section('css')
<link href="{{asset('assets/user/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@stop
@section('title', 'LockSEK')
@section('content')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card">
        <div class="header">
            <h2>TASK INFOS</h2>

        </div>
        <div class="body">
          <div class="row clearfix">
            <div class="col-sm-3"><!--left col-->


              <div class="text-center">
                <img src="https://cdn.website.thryv.com/716ee54454d94272ba5bf64e492f084d/MOBILE/png/961.png" class="avatar img-thumbnail" alt="avatar">
                <div class="prf-img-inp config">
                  <input type="file" class="text-center center-block file-upload">
                </div>

              </div></hr><br>

            </div><!--/col-3-->
            <div class="col-sm-9">
              <div class="tab-content">
                <hr>
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="lockName">Nombre de la cerradura:</label>
                    <p>{{$lock->name}}</p>
                  </div>

                  <div class="col-xs-6">
                    <label for="lockName">Creada:</label>
                    <p>{{$lock->created_at}}</p>
                  </div>
                <div class="col-xs-6">
                  <form class="form" action="{{route('locks.update',$lock->id)}}" method="post" >
                    @csrf
                    @method('put')
                    <label for="name">Nuevo nombre de la cerradura:</label>
                    <br>
                    <div class="form-line">
                        <input type="text" class="form-control" name="newLockName" placeholder="{{$lock->name}}" />
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cambiar</button>
                  </form>
                </div>



                <div class="col-xs-6">
                  <div class="button-demo js-modal-buttons">
                    <button type="button" data-color="red" class="btn btn-danger m-t-15 waves-effect">Eliminar Cerradura</button>
                  </div>
                </div>
              </div>
              <hr>
            </div>

          </div>

          </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card">
        <div class="header">
            <h2>TASK INFOS</h2>

        </div>
        <div class="body">
          <div class="row clearfix">

            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>

                      <th>Usuario</th>
                      <th>Permiso</th>
                      <th>Fecha de registro</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($lock->privileges as $privilege)
                      <tr>
                        <td>{{$privilege->email}}</td>
                        <td>
                          @if ($privilege->privilege == 1)
                            <span class="label label-info">admin</span>
                          @else
                            <span class="label label-primary">basico</span>
                          @endif
                        </td>
                        <td>{{$privilege->created_at}}</td>
                        <td><a class="btn btn-danger m-t-15 waves-effect" href="/locks/{{$lock->id}}/{{$privilege->id}}/delete" role="button">Eliminar</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <div class="col-xs-4 pull-right">
              <form class="form" action="{{route('locks.insertPrivilege',$lock->id)}}" method="post" >
                @csrf
                @method('post')
                <label for="name">Email:</label>
                <br>
                <input type="text" name="email" placeholder="Inserta un email" />
                <br>
                <label for="role">Permiso:</label>
                <br>

                <select name="role" class="form-control show-tick">
                    <option value="">-- Please select --</option>
                    <option value="0">Basico</option>
                    <option value="1">Administrador</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Dar permiso</button>
              </form>
            </div>
          </div>
          <!-- For Material Design Colors -->
          <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="defaultModalLabel">Atencion!</h4>
                      </div>
                      <div class="modal-body">
                          Esta usted a punto de eliminar la cerradura {{$lock->name}}
                      </div>
                      <form class="form" action="{{route('locks.destroy',$lock->id)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-link waves-effect">Eliminar</button>
                          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          </div>
        </div>
    </div>
@stop
@section('scripts')
<!-- Custom Js -->
<script src="{{asset('assets/user/js/pages/ui/modals.js')}}"></script>
@stop
