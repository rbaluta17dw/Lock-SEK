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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
