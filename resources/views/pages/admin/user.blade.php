@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<!--<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      @if (isset(Auth::user()->imgname))
      <img src="{{Storage::url('avatars/'.Auth::user()->imgname)}}" class="avatar img-circle img-thumbnail" alt="avatar">
      @else
      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
      @endif
      <div class="caption">
        @if (isset(Auth::user()->name))
        <h3>{{Auth::user()->name}}</h3>
        @else
        <h3>Sin nombre</h3>
        @endif
        <ul class="list-group">
          <li class="list-group-item">
            <span class="badge">14</span>
            Cerraduras
          </li>
          <li class="list-group-item">
            <span class="badge">14</span>
            Llaves
          </li>
        </ul>
        <div class="panel-group" role="tablist">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
              <h4 class="panel-title">
                <a href="#collapseListGroup1" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup1">
                  <span class="badge">14</span>
                  Cerraduras
                </a>
              </h4>
            </div>
            <div class="panel-collapse collapse in" role="tabpanel" id="collapseListGroup1" aria-labelledby="collapseListGroupHeading1" aria-expanded="true" style="">
              <ul class="list-group">
                <li class="list-group-item">Bootply</li>
                <li class="list-group-item">One itmus ac facilin</li>
                <li class="list-group-item">Second eros</li>
              </ul>
              <div class="panel-footer">Footer</div>
            </div>
            <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
              <h4 class="panel-title">
                <a href="#collapseListGroup2" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup2">
                  <span class="badge">14</span>
                  Cerraduras
                </a>
              </h4>
            </div>
            <div class="panel-collapse collapse in" role="tabpanel" id="collapseListGroup2" aria-labelledby="collapseListGroupHeading2" aria-expanded="true" style="">
              <ul class="list-group">
                <li class="list-group-item">Bootply</li>
                <li class="list-group-item">One itmus ac facilin</li>
                <li class="list-group-item">Second eros</li>
              </ul>
              <div class="panel-footer">Footer</div>
            </div>
          </div>
        </div>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-danger" role="button">Eliminar</a></p>
      </div>
    </div>
  </div>
</div>-->
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
          @if (isset(Auth::user()->name))
          <h1>{{Auth::user()->name}}</h1>
          @else
          <h1>Sin nombre</h1>
          @endif
        </div>
        <div class="col-sm-2">
          @if (isset(Auth::user()->imgname))
          <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="{{Storage::url('avatars/'.Auth::user()->imgname)}}"></a>
          @else
          <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a>
          @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{Auth::user()->created_at}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
                <li class="list-group-item text-right">
                  <span class="pull-left">
                    <strong>Tipo de cuenta</strong>
                  </span>
                  @if (Auth::user()->roleId == 2)
                  <span class="label label-info">Admin</span>
                  @elseif (Auth::user()->roleId == 1)
                  <span class="label label-success">Premiun</span>
                  @else
                  <span class="label label-primary">Basico</span>
                  @endif
                </li>

            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Email <i class="fa fa-at fa-1x"></i></div>
                <div class="panel-body">{{Auth::user()->email}}</div>
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
                                    <th>Usuario </th>
                                    <th>Fecha de registro </th>
                                    <th>Label </th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                <tr>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>

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
                                <tr>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>

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
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                        <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>

                    </ul>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">

                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
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
                                <label for="email">
                                    <h4>Location</h4></label>
                                <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
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

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Verify</h4></label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
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
