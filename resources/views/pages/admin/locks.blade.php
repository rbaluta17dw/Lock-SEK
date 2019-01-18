@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
  <div class="row">
    @if (true)
    <a class="btn btn-success disabled" href="/admin/users" role="button">Cerraduras activas</a>
    <a class="btn btn-warning" href="/admin/users/deleted" role="button">Cerraduras eliminadas</a>
    @else
    <a class="btn btn-success" href="/admin/users" role="button">Cerraduras activas</a>
    <a class="btn btn-warning disabled" href="/admin/users/deleted" role="button">Cerraduras eliminadas</a>
    @endif
    <div class="pull-right"><a class="btn btn-primary" href="/admin/newLock" role="button">Crear cerradura</a></div>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          DataTables Advanced Tables
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="aUsersTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Numero Serial</th>
                <th>Usuario</th>
                <th>Fecha de registro</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($locks as $lock)
                <tr>
                  <td>{{ $lock->id }}</td>
                  <td><a href="/admin/lock/{{$lock->id}}">{{ $lock->name }}</a></td>
                  <td>{{ $lock->serial_n }}</td>
                  <td><a href="/admin/user/{{$lock->user->id}}">{{ $lock->user->name }}</a></td>
                  <td>{{ $lock->created_at }}</td>
                </tr>
              @endforeach

            </tbody>
          </table>
          <!-- /.table-responsive -->

        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
@stop
