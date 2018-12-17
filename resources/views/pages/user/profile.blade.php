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
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Cambie de foto</h6>
        <div class="prf-img-inp config">
          <input type="file" class="text-center center-block file-upload">
        </div>

      </div></hr><br>

      <ul class="list-group">
        <li class="list-group-item text-muted">Activos<i class="fa fa-dashboard fa-1x"></i></li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Llaves</strong></span> 125</li>
        <li class="list-group-item text-right"><span class="pull-left"><strong>Cerraduras</strong></span> 13</li>
      </ul>

    </div><!--/col-3-->
    <div class="col-sm-9">
      <div class="tab-content">
        <hr>
        <form class="form" action="#" method="post" id="registrationForm">
          <div class="form-group">

            <div class="col-xs-6">
              <label for="first_name"><h4>Nombre</h4></label>
              @if(Auth::user()->name == '')
              <p>Ingrese un nombre con el boton de configuracion</p>
              @else
              <p>{{Auth::user()->name}}</p>
              @endif
              <input type="text" class="form-control config" name="name" id="first_name" placeholder="nombre" title="enter your first name if any.">
            </div>
          </div>
          <div class="form-group">

            <div class="col-xs-6">
              <label for="email"><h4>Email</h4></label>
              <h4>{{Auth::user()->email}}</h4>
              <input type="email" class="form-control config" name="email" id="email" placeholder="you@email.com" title="enter your email.">
            </div>
          </div>
          <div class="form-group">

            <div class="col-xs-6">
              <label for="password" class="config"><h4>Contraseña Actual</h4></label>
              <input type="password" class="form-control config" name="password" id="password" placeholder="Contraseña Actual" title="enter your password.">
            </div>
          </div>
          <div class="form-group">

            <div class="col-xs-6">
              <label for="password2" class="config"><h4>Contraseña Nueva</h4></label>
              <input type="password" class="form-control config" name="password2" id="password2" placeholder="Contraseña Nueva" title="enter your password2.">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-lg" type="button" id="config"><i class="glyphicon glyphicon-ok"></i> Config</button>
            <div class="col-xs-12 config">
              <br>
              <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
              <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
            </div>
          </div>
        </form>

        <hr>

      </div>
    </div><!--/col-9-->
  </div><!--/row-->
  @stop
