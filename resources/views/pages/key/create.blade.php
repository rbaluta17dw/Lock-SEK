@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
  <div class="row">
    <div class="col-sm-9">
      <h4>Crear Llave</h4>
      <div class="tab-content">
        <hr>

        <form class="form" action="{{route('keys.store')}}" method="post">
          @csrf
          <label for="date">Nombre de la llave</label>
          <p> <input type="text" name="keyName" placeholder="Nombre de la llave" class="{{ $errors->has('keyName') ? 'alert-danger':''}}" value="{{old('keyName')}}"/></p>
        
          <select name="lock">
            @foreach(Auth::user()->privileges as $privilege)
              <option value="{{$privilege->id}}">{{$privilege->name}}</option>
            @endforeach
            @foreach(Auth::user()->locks as $lock)
              <option value="{{$lock->id}}">{{$lock->name}}</option>
            @endforeach
          </select> 
          <button type="submit" class="btn btn-default btn-primary">Añadir</button>
        </form>
        <br>
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
