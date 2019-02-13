@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')



  <div class="row">
    <div class="col-lg-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-bar-chart-o fa-fw"></i> Cerradura
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
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
              @csrf
              <div class="form-group">

                <div class="col-xs-6 cutText">
                  <label for="first_name"><h4>Nombre de la cerradura</h4></label>
                  <p>{{$lock->name}}</p>
                </div>
                <div class="col-xs-6 cutText" >
                  <label for="first_name"><h4>Dueño</h4></label>
                  <p><a href="/admin/user/{{$lock->user->id}}">{{$lock->user->email}}</a></p>
                </div>
                <div class="col-xs-6">
                  <label for="first_name"><h4>Numero de serie</h4></label>
                  <p>{{$lock->serial_n}}</p>
                </div>
              </div>
              <div class="col-xs-6 cutText" >
                <label for="first_name"><h4>Fecha de Registro</h4></label>
                <p>{{$lock->created_at}}</p>
              </div>
              <div class="col-lg-6">
                <form class="" action="##" method="post">
                  @csrf
                  <button class="btn btn-lg btn-danger" formaction="/admin/lock/delete/{{$lock->id}}" type="submit"><i class="fa fa-trash fa-1x"></i> @lang('adminUser.delete')</button>
                </form>
                <!-- /.table-responsive -->
              </div>
              <div class="col-xs-6">
                  <form class="form" action="{{route('admin.locks.update',$lock->id)}}" method="post" >
                      @csrf
                      @method('put')
                      <label for="name">Nuevo nombre de la cerradura:</label>
                      <br>
                      <input type="text" name="newLockName" placeholder="{{$lock->name}}" />
                      <br>
                      <br>
                      <button type="submit" class="btn btn-default btn-primary">Cambiar</button>
                  </form>
              </div>
              <hr>
            </div>
          </div><!--/col-9-->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-bar-chart-o fa-fw"></i> Permisos
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="col-lg-6">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Fecha permiso</th>
                    <th>Permiso</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lock->privileges as $privilege)
                    <tr>
                      <td>{{$privilege->id}}</td>
                      <td><a href="/admin/user/{{$privilege->id}}">{{$privilege->email}}</a></td>
                      <td>{{$privilege->created_at}}</td>
                      <td>{{$privilege->pivot->privilege}}</td>
                      <td><a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.locks.deletePrivilege',[$lock->id, $privilege->id]) }}" role="button">Eliminar</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <div class="col-xs-4 " >
            <form class="form" action="{{route('admin.locks.insertPrivilege',$lock->id)}}" method="post" >
              @csrf
              @method('post')
              <label for="name">Email:</label>
              <br>
              <input type="text" name="email" placeholder="Inserta un email" />
              <br>
              <label for="name">Permiso:</label>
              <br>
              <select name="role" class="form-control">
              <option value="0">Basico</option>
              <option value="1">Administrador</option>
              </select>
              <br>
              <button type="submit" class="btn btn-default btn-primary">Dar permiso</button>
            </form>
          </div>

        </div>
        <div class="panel-body">
          <div class="col-lg-6">

            <!-- /.table-responsive -->
          </div>
        </div>
        <!-- /.panel-body -->
      </div>
    </div>
    <!-- /.col-lg-8 -->

    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-bell fa-fw"></i> Notifications Panel
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body scroll">
          <div class="list-group">
              @if (isset($notifications))
              @foreach ($notifications as $notification)
                <div class="panel panel-default panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">
                        <i class="fa fa-unlock fa-fw"></i>{{$notification->title}}</a>
                      </h4>
                    </div>
                    <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {{$notification->message}}
                      </div>
                    </div>
                  </div>
                @endforeach
              @else
                <h2>No hay notificaciones</h2>
              @endif


          </div>
          <!-- /.list-group -->
          <a href="#" class="btn btn-default btn-block">View All Alerts</a>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->


      <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-4 -->
  </div>



@stop
