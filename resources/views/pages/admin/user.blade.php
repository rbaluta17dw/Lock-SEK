@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
<div class="col-sm-6 col-md-4">
<div class="thumbnail">
  @if (isset(Auth::user()->imgname))
    <img src="{{Storage::url('avatars/'.Auth::user()->imgname)}}" class="avatar img-circle img-thumbnail" alt="avatar">
  @else
  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
  @endif
<div class="caption">
<h3>{{Auth::user()->name}}</h3>
<ul class="list-group">
  <li class="list-group-item">
    <span class="badge">14</span>
    Cerraduras
  </li>
  <li class="list-group-item">
    <span class="badge">14</span>
    Llaves
  </li>
</ul>
<div class="panel-group" role="tablist">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="collapseListGroupHeading1">
<h4 class="panel-title">
<a href="#collapseListGroup1" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup1">
<span class="badge">14</span>
Cerraduras
</a>
</h4>
</div>
<div class="panel-collapse collapse in" role="tabpanel" id="collapseListGroup1" aria-labelledby="collapseListGroupHeading1" aria-expanded="true" style="">
<ul class="list-group">
<li class="list-group-item">Bootply</li>
<li class="list-group-item">One itmus ac facilin</li>
<li class="list-group-item">Second eros</li>
</ul>
<div class="panel-footer">Footer</div>
</div>
</div>
</div>
<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-danger" role="button">Eliminar</a></p>
</div>
</div>
</div>
</div>
@stop
