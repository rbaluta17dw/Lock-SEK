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
    <div class="col-sm-12"><!--left col-->

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4>Configuracion</h4>
        </div>
        <div class="titulo-config">
          <h5>Activar Tema Oscuro</h5>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>

      </div>
    </div>
  </div><!--/col-9-->
</div><!--/row-->
@stop
