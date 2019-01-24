@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Cerradura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('locks.create')}}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre</label>
            <div class="col-sm-10">
              <input type="text" name="lockName" class="form-control form-control-sm" id="lockName" placeholder="Cerradura de casa">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Numero de serie</label>
            <div class="col-sm-10">
              <input type="text" name="lockSerial" class="form-control" id="lockSerial" placeholder="XGY43123456789Y">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Dirección</label>
            Si:<input type="radio" id="addressYes" name="address" checked>
            No:<input type="radio" id="addressNo" name="address" >

            <div class="col-sm-10">
<<<<<<< HEAD
              
              
              <div id="mapid"></div>
              <input type="text" id="latitud" name="latitud" value="" hidden>
              <input type="text" id="longitud" name="longitud" value="" hidden>
              <input type="text" id="dir" name="dir" value="" hidden>
=======
              <div id="mapid" hidden></div>
              <input type="text" id="latitude" name="latitude" value="" hidden>
              <input type="text" id="longitude" name="longitude" value="" hidden>
            
>>>>>>> cfb44f8c6dac94010189abe74f8078ab76bfd9ba
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<<<<<<< HEAD
          <button type="submit" class="btn btn-primary" id="regist">Registrar</button>
=======
          <button type="submit" class="btn btn-primary" >Registrar</button>
>>>>>>> cfb44f8c6dac94010189abe74f8078ab76bfd9ba
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal -->



<div class="card text-center">
  <div class="card-header">
    <h1>Registra tu cerradura</h1>
  </div>
  <div class="card-body">
    <p class="card-text">Para completar el registro de tu cerradura asegurate de tener cerca la cerradura, la necesitaras durante el proceso.</p>
    <button type="button" class="btn btn-primary" id="begin" data-toggle="modal" data-target="#exampleModal">
      Empezar!
    </button>



  </div>

</div>
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
