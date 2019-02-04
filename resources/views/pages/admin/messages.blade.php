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
        <div class="table-responsive">
          <table width="100%" class="table table-striped table-bordered table-hover" id="aUsersTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th> <!--no se si msotrar el name del user o el id -->
                <th>Mensaje</th> <!--no se si msotrar el name dela cerradura o el id -->
              </tr>
            </thead>
            <tbody>
              @foreach ($messages as $message)
              <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
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
