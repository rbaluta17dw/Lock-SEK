@extends('layouts.userDashboard')
@section('css')
  <link href="{{asset('assets/user/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@stop
@section('title', 'LockSEK')
@section('content')
  <div class="row">
    <div>
      <p class="font-45">Crear Llave</p>
      <div class="card">
        <div class="header font-25">
          <p>
            Tutorial de como crear una llave
          </p>
        </div>
        <div class="body">
          <ol class="font-18">
            <li>Tienes que o bien tener <b>registrada</b> una cerradura o tener <b>permiso</b> para poder crear una llave</li>
            <li>Tienes que elegir el <b>nombre</b> que quieres que tenga la llave, te aconsejamos poner un nombre que te haga <b>reconocer</b> la llave como <b>"Llave de casa de Paublo"</b></li>
            <li>Elige la <b>cerradura</b> a la cual tendra <b>acceso</b> la llave</li>
            <li>Pulsa el boton de <b>crear</b> e <b>introduce</b> el archivo creado en un <b>pendrive</b></li>
            <li>Ahora tu llave esta <b>lista</b> para abrir la <b>cerradura</b></li>
          </ol>
        </div>
      </div>
      <div class="col-xs-2">


        <form class="form" action="{{route('keys.store')}}" method="post">
          @csrf
          <label for="keyName">Nombre de la llave</label>
          <p> <input type="text" name="keyName" placeholder="Nombre de la llave" class="{{ $errors->has('keyName') ? 'alert-danger':''}}" value="{{old('keyName')}}"/></p>
          <select class="form-control show-tick" name="lock">
            @foreach(Auth::user()->locks as $lock)
              <option value="{{$lock->id}}">{{$lock->name}}</option>
            @endforeach
            @foreach(Auth::user()->privileges as $privilege)
              <option value="{{$privilege->id}}">{{$privilege->name}}</option>
            @endforeach
          </select>
          <p>
            <button type="submit" class="btn bg-lime waves-effect">
              <i class="material-icons">vpn_key</i>
              <span>Añadir</span>
            </button>
          </p>
        </form>
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
