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
            <div class="titulo-config">

              <form class="" action="{{ route('user.makePremium') }}" method="get">
                <button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-star fa-1x"></i> Premium</button>
              </form>
            </div>
          </div>
        @else
          <div class="panel panel-danger appconf">
            <div class="panel-heading">
              <h4>Dejar de ser premium</h4>
            </div>
            <div class="titulo-config">

              <form class="" action="{{ route('user.makePremium') }}" method="get">
                <button class="btn btn-lg btn-danger" type="submit"><i class="fa fa-star fa-1x"></i> Premium</button>
              </form>
            </div>
          </div>
        @endif

      </div>
    </div><!--/col-9-->
  </div><!--/row-->
@stop
