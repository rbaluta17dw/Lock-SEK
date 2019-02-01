@extends('layouts.userDashboard')
@section('title', 'LockSEK')
@section('css')
  <link href="{{asset('assets/user/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/js/leaflet/leaflet.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/map-loc.css')}}"/>

@stop
@section('scriptsTop')
  <script src="{{asset('assets/js/leaflet/leaflet.js')}}"></script>
  <script src="{{asset('assets/js/esri-leaflet.js')}}"></script>
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/map-search.js')}}"></script>
@stop
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
                <input type="text" name="lockName" class="form-control form-control-sm" id="lockName" value="{{ old('lockName') }}" placeholder="nombre">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabel" class="col-sm-2 col-form-label">Numero de serie</label>
              <div class="col-sm-10">
                <input type="text" name="lockSerial" class="form-control" id="lockSerial" value="{{ old('lockSerial') }}" placeholder="Serial">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabel" class="col-sm-2 col-form-label">Dirección</label>
              <div class="switch">
                <label>NO<input type="checkbox" id="yespapa" checked><span class="lever"></span>SI</label>
              </div>

              <div class="col-sm-10">
                <div id="mapid"></div>
                <input type="text" id="latitude" name="latitude" value="" hidden>
                <input type="text" id="longitude" name="longitude" value="" hidden>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Registrar</button>
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

  <script src="{{asset('assets/js/map.js')}}"></script>


@stop
