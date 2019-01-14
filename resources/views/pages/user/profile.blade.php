@extends('layouts.dashboard')
@section('title', 'Profile')
@section('subtitle', Auth::user()->email)
@section('content')

  <hr>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1>{{Auth::user()->name}}</h1></div>
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->


        <div class="text-center">
          @if (isset(Auth::user()->imgname))
            <img src="{{Storage::url('avatars/'.Auth::user()->imgname)}}" class="avatar img-circle img-thumbnail" alt="avatar">
          @else
          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
          @endif
          <h6>Imagen de perfil</h6>
          <form class="form" action="{{ route('profile.editImg') }}" method="post" id="registrationForm" enctype="multipart/form-data" >
            @csrf
            <div class="prf-img-inp config">
              <input type="file" name="img" class="text-center center-block file-upload">
              <input type="submit" name="subir" value="subir">
            </div>
          </form>

      </div></hr><br>
      <a href="{{ route('change_lang', ['lang' => 'es']) }}">ES</a>
      <a href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>
      <a href="{{ route('change_lang', ['lang' => 'eu']) }}">EU</a>
      <ul class="list-group">
        <li class="list-group-item text-muted">Activos</li>
        <li class="list-group-item text-right"><span class="pull-left"><i class="fa fa-key fa-1x"></i><strong><a href="/keys"> Llaves</a></strong></span>{{$numKeys}}</li>
        <li class="list-group-item text-right"><span class="pull-left"><i class="fa fa-lock fa-1x"></i><strong><a href="/locks"> Cerraduras</a></strong></span>{{$numLocks}}</li>
      </ul>

      </div><!--/col-3-->
      <div class="col-sm-9">
        <div class="tab-content">
          <hr>
          <form class="form" action="{{ route('profile.edit') }}" method="post" id="registrationForm">
            @csrf
            <div class="form-group">

              <div class="col-xs-6">
                <label for="first_name"><h4>@lang('profile.name')</h4></label>
                @if(Auth::user()->name == '')
                  <p>Ingrese un nombre con el boton de configuracion</p>
                @else
                  <p>{{Auth::user()->name}}</p>
                @endif
                <input type="text" class="form-control config" name="name" id="first_name" placeholder="@lang('profile.name')" title="enter your first name if any.">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="email"><h4>@lang('profile.email')</h4></label>
                <h4>{{Auth::user()->email}}</h4>
                <input type="email" class="form-control config" name="email" id="email" placeholder="you@email.com" title="enter your email.">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password" class="config"><h4>@lang('profile.currentpassword')</h4></label>
                <input type="password" class="form-control config" name="password" id="password" placeholder="@lang('profile.currentpassword')" title="enter your password.">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password2" class="config"><h4>@lang('profile.newpassword')</h4></label>
                <input type="password" class="form-control config" name="password2" id="password2" placeholder="@lang('profile.newpassword')" title="enter your password2.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 ">
                <br>
                <button class="btn btn-lg" type="button" id="config"><i class="fa fa-cogs fa-1x"></i>@lang('profile.editbutton')</button>
                <button class="btn btn-lg btn-success config" type="submit"><i class="fa fa-check fa-1x"></i>@lang('profile.savebutton')</button>
                <button class="btn btn-lg btn-danger config" type="reset"><i class="fa fa-retweet fa-1x"></i>@lang('profile.resetbutton')</button>
              </div>
            </div>
          </form>
          <hr>
        </div>
      </div><!--/col-9-->
    </div><!--/row-->



    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  @stop
