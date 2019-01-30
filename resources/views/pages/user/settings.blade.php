@extends('layouts.userDashboard')
@section('title', 'Profile')
@section('subtitle', Auth::user()->email)
@section('content')

  <hr>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1>Configuracion</h1></div>
    </div>
    <div class="row">
      <div class="col-sm-12"><!--left col-->

        <div class="panel panel-primary appconf">
          <div class="panel-heading">
            <h4>Misc</h4>
          </div>
          <div class="titulo-config">
            <h4>Activar Tema Oscuro</h4>
            <label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </div>
          <div class="titulo-config">
            <h4>Eliminar Cuenta</h4>
            <form class="" action="{{ route('profile.delete') }}" method="post">
              @csrf
              <button class="btn btn-lg btn-danger" type="submit"><i class="fa fa-trash fa-1x"></i> Eliminar</button>
            </form>
          </div>
        </div>
      </div>
    </div><!--/col-9-->
  </div><!--/row-->
@stop
