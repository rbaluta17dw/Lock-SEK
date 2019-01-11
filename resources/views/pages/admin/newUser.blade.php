@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
  <div class="col-lg-4">
    <form method="post" action="/admin/userinsert">
      @csrf
      <div class="form-group">
        <label class="control-label" for="inputGroupSuccess4">Nombre</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
          <input type="text" name="name" class="form-control" id="inputGroupSuccess4" aria-describedby="inputGroupSuccess4Status">
        </div>
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputGroupSuccess4Status" class="sr-only">(success)</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="inputGroupSuccess3">Email</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-at fa-fw"></i></span>
          <input type="email" name="email" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
        </div>
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="inputGroupSuccess3">Contraseña</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-at fa-fw"></i></span>
          <input type="password" name="password" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
        </div>
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
      </div>
      <div class="form-group">
        <label class="control-label" for="inputGroupSuccess3">Tipo de Usuario</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-at fa-fw"></i></span>
          <select name="role" class="form-control">
          <option value="0">Basico</option>
          <option value="1">Premium</option>
          <option value="2">Admin</option>
          </select>
        </div>
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputGroupSuccess3Status" class="sr-only">(success)</span>
      </div>
      <button type="submit" class="btn btn-default">Crear</button>
    </form>
  </div>
</div>

@stop
