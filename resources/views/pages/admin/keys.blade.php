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
                <th>Usuario</th> <!--no se si msotrar el name del user o el id -->
                <th>Cerradura</th> <!--no se si msotrar el name dela cerradura o el id -->
                <th>Estado</th> <!--soft delete, active or deleted -->
              </tr>
            </thead>
            <tbody>
              @foreach ($keys as $key)
                <tr>
                  <td>{{ $key->id }}</td>
                  <td>{{ $key->name }}</td>
                  <td>{{ $key->user->name }}</td>
                  <td>{{ $key->lock->name }}</td>
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
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
@stop
