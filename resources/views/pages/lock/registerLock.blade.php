@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre</label>
            <div class="col-sm-10">
              <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<div class="card text-center">
  <div class="card-header">
    <h1>Registra tu cerradura</h1>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">Para completar el registro de tu cerradura asegurate de tener cerca la cerradura, la necesitaras durante el proceso.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Empezar!
    </button>



  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>




@stop
