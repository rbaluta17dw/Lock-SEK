@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atencion!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <h1>Esta usted a punto de eliminar la cerradura {{$lock->name}}</h1>
      </div>
      <div class="modal-footer">

        <form class="form" action="{{route('locks.destroy',$lock->id)}}" method="POST" >
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->


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
            <div class="form-group">
              <div class="col-xs-6">
                <label for="keyName">Nombre de la cerradura:</label>
                <p>{{$lock->name}}</p>
              </div>

              <div class="col-xs-6">
                <label for="keyName">Creada:</label>
                <p>{{$lock->created_at}}</p>
              </div>

              <div class="col-xs-6">
                <form class="form" action="{{route('locks.update',$lock->id)}}" method="post" >
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

              <div class="col-xs-6">
                <button type="submit" class="btn btn-default btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar cerradura</button>
              </div>
            </div>
          </div>
          <hr>
        </div>
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
                  <td><a class="btn btn-danger" href="#" role="button">Eliminar</a></td>
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
      <!-- /.panel-body -->
    </div>
  </div>
  <!-- /.col-lg-8 -->

 <!-- <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Notifications Panel
      </div>
     
      <div class="panel-body">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-success">
            <i class="fa fa-unlock fa-fw"></i> <span class="negrita">Asier</span> apertura de cerradura
            <span class="pull-right text-muted small"><em>4 minutes ago</em>
            </span>
          </a>
          <a href="#" class="list-group-item list-group-item-info">
            <i class="fa fa-key fa-fw"></i> <span class="negrita">Aitor</span> ha creado llave
            <span class="pull-right text-muted small"><em>12 minutes ago</em>
            </span>
          </a>
          <a href="#" class="list-group-item list-group-item-warning">
            <i class="fa fa-trash-o fa-fw"></i> Message Sent
            <span class="pull-right text-muted small"><em>27 minutes ago</em>
            </span>
          </a>
          <a href="#" class="list-group-item list-group-item-danger">
            <i class="fa fa-lock fa-fw"></i> Intento de acceso
            <span class="pull-right text-muted small"><em>43 minutes ago</em>
            </span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-exclamation-circle fa-fw"></i> Server Rebooted
            <span class="pull-right text-muted small"><em>11:32 AM</em>
            </span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-bolt fa-fw"></i> Server Crashed!
            <span class="pull-right text-muted small"><em>11:13 AM</em>
            </span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-warning fa-fw"></i> Server Not Responding
            <span class="pull-right text-muted small"><em>10:57 AM</em>
            </span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
            <span class="pull-right text-muted small"><em>9:49 AM</em>
            </span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-money fa-fw"></i> Payment Received
            <span class="pull-right text-muted small"><em>Yesterday</em>
            </span>
          </a>
        </div>
        
        <a href="#" class="btn btn-default btn-block">View All Alerts</a>
      </div>
     
    </div>-->
    <!-- /.panel -->


    <!-- /.panel .chat-panel -->
  </div>
  <!-- /.col-lg-4 -->
</div>



@stop
