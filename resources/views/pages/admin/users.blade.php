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
                                  <tr class="odd gradeX">
                                      <td>Trident</td>
                                      <td>Internet Explorer 4.0</td>
                                      <td>Win 95+</td>
                                      <td class="center">4</td>
                                      <td class="center">X</td>
                                  </tr>

                              </tbody>
                          </table>
                          <!-- /.table-responsive -->
                          <div class="well">
                              <h4>DataTables Usage Information</h4>
                              <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                              <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                          </div>

                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
              <!-- /.col-lg-12 -->
          </div>
@stop
