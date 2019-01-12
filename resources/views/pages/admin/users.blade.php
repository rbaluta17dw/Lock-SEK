@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
              <div class="col-lg-12">
                @if ($button)
                <a class="btn btn-warning" href="/admin/users/deleted" role="button">Usuarios Eliminados</a>
                @else
                <a class="btn btn-success" href="/admin/users" role="button">Usuarios Activos</a>
                @endif
                <div class="pull-right"><a class="btn btn-primary" href="/admin/usernew" role="button">Crear Usuario</a></div>

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
                                      <th>Email</th>
                                      <th>Tipo de usuario</th>
                                      <th>Email verificado</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($users as $user)
                                  <tr>
                                      <td><a href="/admin/user/{{ $user->id }}">{{ $user->id }}</a></td>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->roleId }}</td>
                                      <td>
                                          @if ( $user->email_verified_at == null)
                                          <span class="badge badge-warning">Warning</span>
                                          @else
                                          <span class="badge badge-pill badge-success">Success</span>
                                          @endif
                                      </td>
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
