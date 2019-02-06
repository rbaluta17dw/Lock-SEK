@extends('layouts.dashboard')
@section('title', 'Profile')
@section('subtitle', Auth::user()->email)
@section('content')

  <hr>
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-12"><!--left col-->

        <div class="panel panel-primary appconf">
          <div class="panel-heading">
            <h4>Eliminar cuenta</h4>
          </div>
          <div class="titulo-config">
         
            <form class="" action="{{ route('profile.delete') }}" method="post">
              @csrf
              <button class="btn btn-lg btn-danger" type="submit"><i class="fa fa-trash fa-1x"></i> Eliminar</button>
            </form>
          </div>
        </div>
      </div>
    </div><!--/col-9-->
  </div><!--/row-->
@stop
