@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')

  <hr>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10">
        @if (isset($user->name))
          <h1>{{$user->name}}</h1>
        @else
          <h1>Sin nombre</h1>
        @endif
        @if (isset($user->deleted_at))
          <h3><span class="label label-warning">Borrado</span></h3>
        @endif
      </div>
      <div class="col-sm-2">
        @if (isset($user->imgname))
          <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="{{Storage::url('avatars/'.$user->imgname)}}"></a>
        @else
          <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a>
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
      <div class="col-sm-3">
        <!--left col-->

        <ul class="list-group">
          <li class="list-group-item text-muted">Profile</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{$user->created_at}}</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
          <li class="list-group-item text-right">
            <span class="pull-left">
              <strong>Tipo de cuenta</strong>
            </span>
            @if ($user->roleId == 2)
              <span class="label label-info">Admin</span>
            @elseif ($user->roleId == 1)
              <span class="label label-success">Premiun</span>
            @else
              <span class="label label-primary">Basico</span>
            @endif
          </li>

        </ul>

        <div class="panel panel-default">
          <div class="panel-heading">Email <i class="fa fa-at fa-1x"></i></div>
          <div class="panel-body">{{$user->email}}</div>
        </div>

        <ul class="list-group">
          <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
        </ul>

        <div class="panel panel-default">
          <div class="panel-heading">Social Media</div>
          <div class="panel-body">
            <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
          </div>
        </div>

      </div>
      <!--/col-3-->
      <div class="col-sm-9">

        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#locks" data-toggle="tab">Cerraduras</a></li>
          <li><a href="#keys" data-toggle="tab">Llaves</a></li>
          <li><a href="#messages" data-toggle="tab">Notificaciones</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="locks">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Numero Serial</th>
                    <th>Dueño </th>
                    <th>Fecha de registro </th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach ($user->locks as $lock)
                    <tr>
                      <td>{{$lock->id}}</td>
                      <td>{{$lock->name}}</td>
                      <td>{{$lock->serial_n}}</td>
                      <td>{{$lock->user->name}}</td>
                      <td>{{$lock->created_at}}</td>
                    </tr>
                  @endforeach
                  @foreach ($user->privileges as $privilege)
                    <tr>
                      <td>{{$privilege->id}}</td>
                      <td>{{$privilege->name}}</td>
                      <td>{{$privilege->serial_n}}</td>
                      <td>{{$privilege->user->name}}</td>
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
                    <th>Nombre</th>
                    <th>Cerradura</th>
                    <th>Estado </th>
                  </tr>
                </thead>
                <tbody id="items">
                  @foreach ($user->keys as $key)
                    <tr>
                      <td>{{$key->id}}</td>
                      <td>{{$key->name}}</td>
                      <td>{{$key->lock->name}}</td>
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
              <li class="list-group-item text-muted">Inbox</li>
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

                <div class="col-xs-6">
                  <label for="name">
                    <h4>Name</h4></label>
                    <input type="text" class="form-control" name="name" id="first_name" placeholder="name" title="Change name.">
                  </div>
                </div>

                <div class="form-group">

                  <div class="col-xs-6">
                    <label for="email">
                      <h4>Email</h4></label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                    </div>
                  </div>
                  <div class="form-group">

                    <div class="col-xs-6">
                      <label for="password">
                        <h4>Password</h4></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12">
                        <br>
                        <button class="btn btn-lg btn-success" formaction="/admin/user/edit/{{$user->id}}" type="submit"><i class="fa fa-check fa-1x"></i> Save</button>
                        <button class="btn btn-lg" type="reset"><i class="fa fa-retweet fa-1x"></i> Reset</button>
                        @if (isset($user->deleted_at))
                          <button class="btn btn-lg btn-warning" formaction="/admin/user/recover/{{$user->id}}" type="submit"><i class="fa fa-trash fa-1x"></i> Recuperar</button>
                        @else
                          <button class="btn btn-lg btn-danger" formaction="/admin/user/delete/{{$user->id}}" type="submit"><i class="fa fa-trash fa-1x"></i> Delete</button>
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
