@extends('layouts.userDashboard')
@section('title', 'LockSEK')
@section('css')
  <link rel="stylesheet" href="{{asset('assets/user/plugins/dropzone/dropzone.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/user/css/customcss.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/customInput.css')}}" />
@stop
@section('scriptsTop')
  <script src="{{asset('assets/js/custom-file-input.js')}}"></script>
  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
@stop
@section('content')
  <div class="col-xs-12 col-sm-3">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>

    @endif
    <div class="card profile-card">
      <div class="profile-header">&nbsp;</div>
      <div class="profile-body">
        <div class="image-area imgprf">
          @if (isset(Auth::user()->imgname))
            <img src="{{Storage::url('avatars/'.Auth::user()->imgname)}}" width="120" height="120" alt="AdminBSB - Profile Image" />
          @else
            <img src="{{asset('assets/images/user.png')}}" width="120" height="120" alt="AdminBSB - Profile Image" />
          @endif
        </div>
        <div class="content-area">
          <h3>{{Auth::user()->name}}</h3>
          <p>{{Auth::user()->email}}</p>
          @if (Auth::user()->roleId == 3)
            <span class="label label-info">@lang('adminUsers.superAdmin')</span>
          @elseif (Auth::user()->roleId == 2)
            <span class="label label-info">@lang('adminUsers.admin')</span>
          @elseif (Auth::user()->roleId == 1)
            <span class="label label-success">@lang('adminUsers.premiun')</span>
          @else
            <span class="label label-primary">@lang('adminUsers.basic')</span>
          @endif
        </div>
      </div>
      <div class="profile-footer">
        <ul>
          <li>
            <span>Llaves</span>
            <span>{{count(Auth::user()->keys)}}</span>
          </li>
          <li>
            <span>Cerraduras</span>
            <span>{{count(Auth::user()->locks)}}</span>
          </li>
        </ul>
      </div>
    </div>

  </div>

  <div class="col-xs-12 col-sm-9">
    <div class="card">
      <div class="body">
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="active tab-pane fade in" id="profile_settings">
              <form method="post" action="{{ route('profile.editName') }}" class="form-horizontal">
                @csrf
                <div class="form-group">
                  <label for="NameSurname" class="col-sm-2 control-label">@lang('profile.name')</label>
                  <div class="col-sm-10">
                    <div class="form-line">
                      <input type="text" class="form-control" id="NameSurname" name="name" placeholder="{{Auth::user()->name}}" value="{{Auth::user()->name}}" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Cambiar Nombre</button>
                  </div>
                </div>
              </form>
              <form method="post" action="{{ route('profile.editEmail') }}" class="form-horizontal">
                @csrf
                <div class="form-group">
                  <label for="Email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <div class="form-line">
                      <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="{{Auth::user()->email}}" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Cambiar Email</button>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atencion!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <h1>Introduzca su contraseña actual </h1>
                        <div class="form-group">
                          <label for="password" class="col-sm-3 control-label">Contraseña:</label>
                          <div class="col-sm-9">
                            <div class="form-line">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Cambiar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Modal -->
              </form>
              <form method="post" action="{{ route('profile.editImg') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="NameSurname" class="col-sm-2 control-label">Imagen de perfil</label>
                  <div class="col-sm-10">
                    <div class="form-line">
                      <div class="box">
                        <input type="file" name="img" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
                      </div>
                      <button type="submit" class="btn btn-danger">Cambiar</button>
                    </div>
                  </div>


                </div>
              </form>
              <form class="" action="{{ route('profile.delete') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="delete" class="col-sm-2 control-label">Eliminar cuenta</label>
                  <div class="col-sm-10">
                    <div class="form-line">
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>
              </form>

            </div>

            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
              <form method="post" action="{{ route('profile.editPassword') }}" class="form-horizontal">
                @csrf
                <div class="form-group">
                  <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                  <div class="col-sm-9">
                    <div class="form-line">
                      <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                  <div class="col-sm-9">
                    <div class="form-line">
                      <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                  <div class="col-sm-9">
                    <div class="form-line">
                      <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (Session::has('success'))
    <div class="alert alert-success">{!! Session::get('success') !!}</div>
  @endif

  @if (Session::has('failure'))
    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
  @endif
@stop
@section('scripts')

@stop
