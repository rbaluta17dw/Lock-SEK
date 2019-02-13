@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<hr>
<div class="container bootstrap snippet">
  <div class="row">
    <div class="col-sm-7">
      @if (isset($user->name))
      <h1>{{$user->name}}</h1>
      @else
      <h1>@lang('adminUser.noName')</h1>
      @endif
      @if (isset($user->deleted_at))
      <h3><span class="label label-warning">@lang('adminUser.deleted')</span></h3>
      @endif
      @if ($user->email_verified_at == null)
      <h3><span class="label label-warning">@lang('adminUser.notVerified')</span></h3>
      @endif
    </div>
  </div>
    <div class="row">
    <div class="col-sm-5">
      @if (isset($user->imgname))
      <a href="/users"><img title="profile image" class="img-circle img-responsive" src="{{Storage::url('avatars/'.$user->imgname)}}"></a>
      @else
      <a href="/users"><img title="profile image" class="img-circle img-responsive" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a>
      @endif
      <form class="form" action="/admin/user/editimg/{{$user->id}}" method="post" id="registrationForm" enctype="multipart/form-data" >
        @csrf
        <div class="prf-img-inp">
          <input type="file" name="img" class="text-center center-block file-upload">
          <input type="submit" name="subir" value="subir">
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-7">
      <!--left col-->

      <ul class="list-group">
        <li class="list-group-item text-muted">@lang('adminUser.profile')</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>@lang('adminUser.joined')</strong></span> {{$user->created_at}}</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>@lang('adminUser.lastSeen')</strong></span> Yesterday</li>
        <li class="list-group-item text-right">
          <span class="pull-left">
            <strong>@lang('adminUser.typeAccount')</strong>
          </span>
          @if ($user->roleId == 3)
          <span class="label label-info">@lang('adminUser.superAdmin')</span>
          @elseif ($user->roleId == 2)
          <span class="label label-info">@lang('adminUser.admin')</span>
          @elseif ($user->roleId == 1)
          <span class="label label-success">@lang('adminUser.premiun')</span>
          @else
          <span class="label label-primary">@lang('adminUser.basic')</span>
          @endif
        </li>

      </ul>

      <div class="panel panel-default cutText">
        <div class="panel-heading">@lang('adminUser.email') <i class="fa fa-at fa-1x"></i></div>
        <div class="panel-body">{{$user->email}}</div>
      </div>

    </div>
    <!--/col-3-->
    <div class="col-sm-7">

      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#locks" data-toggle="tab">@lang('adminUser.locks')</a></li>
        <li><a href="#keys" data-toggle="tab">@lang('adminUser.keys')</a></li>
        <li><a href="#messages" data-toggle="tab">@lang('adminUser.notifications')</a></li>
        <li><a href="#settings" data-toggle="tab">@lang('adminUser.settings')</a></li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="locks">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>@lang('adminUser.name')</th>
                  <th>@lang('adminUser.serialNumber')</th>
                  <th>@lang('adminUser.owner') </th>
                  <th>@lang('adminUser.registerDate') </th>
                </tr>
              </thead>
              <tbody id="items">
                @foreach ($user->locks as $lock)
                <tr>
                  <td>{{$lock->id}}</td>
                  <td>{{$lock->name}}</td>
                  <td><a href="/admin/lock/{{$lock->id}}">{{$lock->serial_n}}</a></td>
                  <td>{{$lock->user->name}}</td>
                  <td>{{$lock->created_at}}</td>
                </tr>
                @endforeach
                @foreach ($user->privileges as $privilege)
                <tr>
                  <td>{{$privilege->id}}</td>
                  <td>{{$privilege->name}}</td>
                  <td><a href="/admin/lock/{{$privilege->id}}">{{$privilege->serial_n}}</a></td>
                  <td><a href="/admin/user/{{$privilege->user->id}}">{{$privilege->user->name}}</a></td>
                  <td>{{$privilege->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <hr>
            <div class="row">
              <div class="col-md-4 col-md-offset-4 text-center">
                <ul class="pagination" id="myPager"></ul>
              </div>
            </div>
          </div>
          <!--/table-resp-->

          <hr>

        </div>
        <div class="tab-pane" id="keys">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>@lang('adminUser.name')</th>
                  <th>@lang('adminUser.lock')</th>
                  <th>@lang('adminUser.status')</th>
                </tr>
              </thead>
              <tbody id="items">
                @foreach ($user->keys as $key)
                <tr>
                  <td><a href="/admin/key/{{$key->id}}">{{$key->id}}</a></td>
                  <td>{{$key->name}}</td>
                  <td><a href="/admin/lock/{{$key->lock->id}}">{{$key->lock->name}}</a></td>
                  <td>Activo</td>
                </tr>
                @endforeach

              </tbody>
            </table>
            <hr>
            <div class="row">
              <div class="col-md-4 col-md-offset-4 text-center">
                <ul class="pagination" id="myPager"></ul>
              </div>
            </div>
          </div>
          <!--/table-resp-->

          <hr>

        </div>
        <!--/tab-pane-->
        <div class="tab-pane" id="messages">

          <h2></h2>

          <ul class="list-group">
            <li class="list-group-item text-muted">@lang('adminUser.inbox')</li>
            @foreach ($user->notifications as $notification)
            <li class="list-group-item text-right"><a href="#" class="pull-left">{{$notification->title}}</a> {{$notification->message}}</li>
            @endforeach

          </ul>

        </div>
        <!--/tab-pane-->
        <div class="tab-pane" id="settings">

          <hr>
          <form class="form" action="##" method="post" id="registrationForm">
            @csrf
            <div class="form-group">

              <div class="col-xs-6" >
                <label for="name">
                  <h4>@lang('adminUser.name')</h4></label>
                  <input type="text" class="form-control" name="name" id="first_name" placeholder="name" title="Change name.">
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6 cutText">
                  <label for="email">
                    <h4>@lang('adminUser.email')</h4></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-xs-6">
                    <label for="password">
                      <h4>@lang('adminUser.password')</h4></label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-12">
                      <br>
                      <button class="btn btn-lg btn-success" formaction="/admin/user/edit/{{$user->id}}" type="submit"><i class="fa fa-check fa-1x"></i>@lang('adminUser.save')</button>
                      <button class="btn btn-lg" type="reset"><i class="fa fa-retweet fa-1x"></i>@lang('adminUser.reset')</button>
                      @if (isset($user->deleted_at))
                      <button class="btn btn-lg btn-warning" formaction="/admin/user/recover/{{$user->id}}" type="submit"><i class="fa fa-trash fa-1x"></i>@lang('adminUser.recover')</button>
                      @else
                      <button class="btn btn-lg btn-danger" formaction="/admin/user/delete/{{$user->id}}" type="submit"><i class="fa fa-trash fa-1x"></i> @lang('adminUser.delete')</button>
                      @endif
                      @if (Auth::user()->roleId == 3)
                      @if ($user->roleId == 1 || $user->roleId == 0)
                      <button class="btn btn-lg btn-warning" formaction="/admin/user/convertAdmin/{{$user->id}}" type="submit"><i class="fa fa-user-plus fa-1x"></i>Convertir Admin</button>
                      @elseif($user->roleId == 2)
                      <button class="btn btn-lg btn-info" formaction="/admin/user/convertUser/{{$user->id}}" type="submit"><i class="fa fa-user fa-1x"></i>Convertir Users</button>
                      <button class="btn btn-lg btn-warning" formaction="/admin/user/convertSuperAdmin/{{$user->id}}" type="submit"><i class="fa fa-user-secret fa-1x"></i>Convertir SuperAdmin</button>
                      @endif
                      @endif
                    </div>
                  </div>
                </form>
              </div>

            </div>
            <!--/tab-pane-->
          </div>
          <!--/tab-content-->

        </div>
        <!--/col-9-->
      </div>
      <!--/row-->
      @stop
