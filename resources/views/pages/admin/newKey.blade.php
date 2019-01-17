@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
  <div class="row">
    <div class="col-lg-4">
      <form method="post" action="/admin/insertKey">
        @csrf
        <div class="form-group">
          <label class="control-label" for="inputGroupSuccess4">Nombre</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <input type="text" name="name" class="form-control" id="inputGroupSuccess4" aria-describedby="inputGroupSuccess4Status">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user-plus fa-fw"></i></span>
            <select name="user" class="form-control">
              @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->email}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
            <select name="lock" class="form-control">
              @foreach ($locks as $lock)
              <option value="{{$lock->id}}">{{$lock->name}}</option>
              @endforeach
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
