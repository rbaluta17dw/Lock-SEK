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

      <!-- De aqui saco las banderas https://icon-icons.com -->
      <a href="{{ route('change_lang', ['lang' => 'es']) }}"><img src="{{asset('assets/images/es.ico')}}" ></a>
      <a href="{{ route('change_lang', ['lang' => 'en']) }}"><img src="{{asset('assets/images/en.ico')}}" ></a>
      <a href="{{ route('change_lang', ['lang' => 'eu']) }}"><img src="{{asset('assets/images/eu.ico')}}" ></a>


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
                <input type="text" class="form-control config {{ $errors->has('name') ? 'alert-danger':''}}" name="name" id="first_name" placeholder="@lang('profile.name')" title="enter your first name if any."  value="{{old('name')}}">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="email"><h4>@lang('profile.email')</h4></label>
                <h4>{{Auth::user()->email}}</h4>
                <input type="text" class="form-control config {{ $errors->has('email') ? 'alert-danger':''}}" name="email" id="email" placeholder="you@email.com" title="enter your email."  value="{{old('email')}}">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password" class="config"><h4>@lang('profile.currentpassword')</h4></label>
                <input type="password" class="form-control config {{ $errors->has('password') ? 'alert-danger':''}}" name="password" id="password" placeholder="@lang('profile.currentpassword')" title="enter your password.">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="password2" class="config"><h4>@lang('profile.newpassword')</h4></label>
                <input type="password" class="form-control config {{ $errors->has('password2') ? 'alert-danger':''}}" name="password2" id="password2" placeholder="@lang('profile.newpassword')" title="enter your password2.">
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
    @if (Session::has('success'))
        <div class="alert alert-success">{!! Session::get('success') !!}</div>
    @endif

    @if (Session::has('failure'))
        <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
    @endif
  @stop
