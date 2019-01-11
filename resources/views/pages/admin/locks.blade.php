@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
  <div class="row">
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
                  <td>{{ $lock->name }}</td>
                  <td>{{ $lock->serial_n }}</td>
                  <td>{{ $lock->user->name }}</td>
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
