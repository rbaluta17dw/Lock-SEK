@extends('layouts.userDashboard')
@section('title', 'Notification')
@section('content')

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Notificaciones
        </div>
        <!-- .panel-heading -->
        <div class="panel-body">
          <div class="panel-group" id="accordion">
            @if (isset($notifications))
              @foreach ($notifications as $notification)
                @if ($notification->marker == 0)
                  <div class="panel panel-default panel-danger">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">
                          <i class="fa fa-key fa-fw"></i> {{$notification->title}}
                        </a>
                      </h4>
                    </div>
                    <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {{$notification->message}}
                      </div>
                    </div>
                  </div>
                @elseif ($notification->marker == 1)
                  <div class="panel panel-default panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">
                          <i class="fa fa-unlock fa-fw"></i>{{$notification->title}}</a>
                        </h4>
                      </div>
                      <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                          {{$notification->message}}
                        </div>
                      </div>
                    </div>
                  @elseif ($notification->marker == 2)
                    <div class="panel panel-default panel-info">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">
                            <i class="fa fa-lock fa-fw"></i> {{$notification->title}}
                          </span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {{$notification->message}}
                      </div>
                    </div>
                  </div>
                @elseif ($notification->marker == 3)
                  <div class="panel panel-default panel-warning">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">{{$notification->title}}</a>
                      </h4>
                    </div>
                    <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {{$notification->message}}
                      </div>
                    </div>
                  </div>
                @elseif ($notification->marker == 4)
                  <div class="panel panel-default panel-green">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">{{$notification->title}}</a>
                      </h4>
                    </div>
                    <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {{$notification->message}}
                      </div>
                    </div>
                  </div>
                @elseif ($notification->marker == 5)
                  <div class="panel panel-default panel-warning">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$notification->id}}">{{$notification->title}}</a>
                      </h4>
                    </div>
                    <div id="collapse{{$notification->id}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {{$notification->message}}
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            @else
              <h2>NO HAY NOTIFICACIONES</h2>
            @endif
          </div>
        </div>
        <!-- .panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
@stop
