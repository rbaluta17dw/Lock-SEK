@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
              <div class="col-lg-12">
                @if ($button)
                <a class="btn btn-success disabled" href="/admin/users" role="button">@lang('adminUsers.activeUsers')</a>
                <a class="btn btn-warning" href="/admin/users/deleted" role="button">@lang('adminUsers.deletedUsers')</a>
                @else
                <a class="btn btn-success" href="/admin/users" role="button">@lang('adminUsers.activeUsers')</a>
                <a class="btn btn-warning disabled" href="/admin/users/deleted" role="button">@lang('adminUsers.deletedUsers')</a>
                @endif
                <div class="pull-right"><a class="btn btn-primary" href="/admin/usernew" role="button">@lang('adminUsers.createUser')</a></div>

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
                                      <th>@lang('adminUsers.name')</th>
                                      <th>@lang('adminUsers.email')</th>
                                      <th>@lang('adminUsers.typeUser')</th>
                                      <th>@lang('adminUsers.verifiedEmail')</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($users as $user)
                                  <tr>
                                      <td>{{ $user->id }}</td>
                                      <td>{{ $user->name }}</td>
                                      <td><a href="/admin/user/{{ $user->id }}">{{ $user->email }}</a></td>
                                      <td>
                                        @if ($user->roleId == 2)
                                          <span class="label label-info">@lang('adminUsers.admin')</span>
                                        @elseif ($user->roleId == 1)
                                          <span class="label label-success">@lang('adminUsers.premiun')</span>
                                        @else
                                          <span class="label label-primary">@lang('adminUsers.basic')</span>
                                        @endif
                                      </td>
                                      <td>
                                          @if ( $user->email_verified_at == null)
                                          <span class="label label-warning">@lang('adminUsers.notVerified')</span>
                                          @else
                                          <span class="label label-pill label-success">@lang('adminUsers.verified')</span>
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
