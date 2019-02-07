@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')



  <div class="row">
    <div class="col-lg-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-bar-chart-o fa-fw"></i> LLave
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="col-sm-3"><!--left col-->


            <div class="text-center">
              <img src="https://us.123rf.com/450wm/artforeveryone/artforeveryone1708/artforeveryone170800036/83814878-golden-key-icon-isolated-concept-soluci%C3%B3n-acceso-desbloquear.jpg?ver=6" class="avatar img-thumbnail" alt="avatar">
              <div class="prf-img-inp config">
                <input type="file" class="text-center center-block file-upload">
              </div>

            </div></hr><br>

          </div><!--/col-3-->
          <div class="col-sm-9">
            <div class="tab-content">
              <hr>
              @csrf
              <div class="form-group">

                <div class="col-xs-6 cutText" >
                  <label for="first_name"><h4>Nombre de la llave</h4></label>
                  <p>{{$key->name}}</p>
                </div>
                <div class="col-xs-6 cutText">
                  <label for="first_name "><h4>Dueño</h4></label>
             
                  <p> <a href="/admin/user/{{$key->user->id}}">{{$key->user->email}}</a></p>
              
                </div>
                <div class="col-xs-6">
                  <label for="first_name"><h4>Fecha de Registro</h4></label>
                  <p>{{$key->created_at}}</p>
                </div>

              </div>
              <div class="col-xs-6">
                <label for="first_name"><h4>Cerradura</h4></label>
                <p> <a href="/admin/lock/{{$key->lock->id}}">{{$key->lock->name}}</a></p>
              </div>
              <div class="col-xs-6 cutText " >
                <label for="first_name"><h4>Dueño de la Cerradura</h4></label>
                <p> <a title="{{$key->lock->user->email}}" href="/admin/user/{{$key->lock->user->id}}">{{$key->lock->user->email}} </a></p>
              </div>
         

              <hr>
            </div>
          </div><!--/col-9-->
        </div>
        <!-- /.panel-body -->
      </div>

    @stop
