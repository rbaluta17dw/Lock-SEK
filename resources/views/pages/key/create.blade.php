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
          <p> <input type="text" name="keyName" placeholder="Nombre de la llave" /></p>

         
          <button type="submit" class="btn btn-default btn-primary">Añadir</button>
        </form>
        <br>
      </div>
    </div><!--/col-9-->
  </div><!--/row-->
@stop
