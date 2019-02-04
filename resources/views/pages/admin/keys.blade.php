@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
  <div class="col-lg-12">
    @if (true)
    <a class="btn btn-success disabled" href="/admin/users" role="button">llaves activas</a>
    <a class="btn btn-warning" href="/admin/users/deleted" role="button">llaves borradas</a>
    @else
    <a class="btn btn-success" href="/admin/users" role="button">llaves activas</a>
    <a class="btn btn-warning disabled" href="/admin/users/deleted" role="button">llaves borradas</a>
    @endif
    <div class="pull-right"><a class="btn btn-primary" href="/admin/newKey" role="button">Crear llave</a></div>
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="table-responsive">
          <table width="100%" class="table table-striped table-bordered table-hover " id="aUsersTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th> <!--no se si msotrar el name del user o el id -->
                <th>Cerradura</th> <!--no se si msotrar el name dela cerradura o el id -->
                <th>Estado</th> <!--soft delete, active or deleted -->
              </tr>
            </thead>
            <tbody>
              @foreach ($keys as $key)
              <tr>
                <td>{{ $key->id }}</td>
                <td><a href="/admin/key/{{$key->id}}">{{ $key->name }}</td>
                  <td><a href="/admin/user/{{$key->user->id}}">{{ $key->user->email }}</a></td>
                  <td><a href="/admin/lock/{{$key->lock->id}}">{{ $key->lock->name }}</a></td>
                  <td>
                    @if ( 1== 1) <!--el if es temporal para que no pete, soy un vago si -->
                    <span class="badge badge-warning">Warning</span>
                    @else
                    <span class="badge badge-pill badge-success">Success</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  @stop
  