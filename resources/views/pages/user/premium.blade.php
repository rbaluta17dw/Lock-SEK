@extends('layouts.userDashboard')
@section('title', 'Profile')
@section('subtitle', Auth::user()->email)
@section('content')
  <hr>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-12"><!--left col-->
        @if (Auth::user()->roleId == 0)
          <div class="panel panel-primary appconf">
            <div class="panel-heading">
              <h4>Convertirse en premium</h4>
            </div>
            <div class="titulo-config premium">

              <form class="" action="{{ route('user.makePremium') }}" method="get">
             
                  <div class="body">
                      <ul class="list-group">
                          <li class="list-group-item">Podrás registrar cerraduras ilimitadas</li>
                          <li class="list-group-item">Crea llaves ilimitadas</li>
                    
                      </ul>
                  </div>
                <button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-star fa-1x"></i> SUSCRIBIRSE AL SERVICIO PREMIUM</button>
              </form>
            </div>
          </div>
        @else
          <div class="panel panel-danger appconf" >
            <div class="panel-heading">
              <h4>¿Estas seguro de que deseas cancelar nuestra suscripción?</h4>
            </div>
            <div class="titulo-config premium">

              <form class="" action="{{ route('user.makePremium') }}" method="get">
                  <div class="body">
                      <ul class="list-group">
                          <li class="list-group-item">No podrás crear llaves ilimitadas</li>
                          <li class="list-group-item">Las llaves creadas excepto las 2 primeras seran <strong> bloqueadas</strong></li>
                      </ul>
                  </div>

              </p>

                <button class="btn btn-lg btn-danger" type="submit"><i class="fa fa-star fa-1x"></i> CANCELAR SUSCRIPCIÓN</button>
              </form>
            </div>
          </div>
        @endif

      </div>
    </div><!--/col-9-->
  </div><!--/row-->
@stop
