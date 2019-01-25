@extends('layouts.dashboard')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">

@stop

@section('scriptsTop')
<script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>
<script src="https://unpkg.com/esri-leaflet"></script>
<script src="https://unpkg.com/esri-leaflet-geocoder"></script>
@stop
@section('title', 'LockSEK')
@section('content')



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Atencion!</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
<h1>Esta usted a punto de eliminar la cerradura {{$lock->name}}</h1>
</div>
<div class="modal-footer">

<form class="form" action="{{route('locks.destroy',$lock->id)}}" method="POST" >
@csrf
@method('DELETE')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-danger">Eliminar</button>
</form>
</div>
</div>
</div>
</div>
<!-- /Modal -->


<div class="row">
<div class="col-lg-10">
<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-bar-chart-o fa-fw"></i> Cerradura
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="col-sm-6"><!--left col-->


<p>Dirección: (Busca la dirección mediante el buscador)</p>
<div id="lockMap"></div>





<!--<div class="text-center">
<img src="https://cdn.website.thryv.com/716ee54454d94272ba5bf64e492f084d/MOBILE/png/961.png" class="avatar img-thumbnail" alt="avatar">
<div class="prf-img-inp config">
<input type="file" class="text-center center-block file-upload">
</div>-->

</div>


<div class="col-sm-6">
<div class="tab-content">
<hr>
<div class="form-group">
<div class="col-xs-6">
<label for="lockName">Nombre de la cerradura:</label>
<p>{{$lock->name}}</p>
</div>

<div class="col-xs-6">
<label for="lockName">Creada:</label>
<p>{{$lock->created_at}}</p>
</div>
<div class="col-xs-6">
<form class="form" action="{{route('locks.update',$lock->id)}}" method="post" >
@csrf
@method('put')
<label for="name">Nuevo nombre de la cerradura:</label>
<br>
<input type="text" name="newLockName" placeholder="{{$lock->name}}" />
<br>
<br>
<button type="submit" class="btn btn-default btn-primary">Cambiar</button>
<input type="text" id="newLatitude" name="newLatitude" value="" hidden>
<input type="text" id="newLongitude" name="newLongitude" value="" hidden>
</form>
</div>



<div class="col-xs-6">
<button type="submit" class="btn btn-default btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar cerradura</button>
</div>
</div>
<hr>
</div>

</div>
</div><!--/col-3-->

<!-- /.panel-body -->
</div>
<!-- /.panel -->
<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-bar-chart-o fa-fw"></i> Permisos
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="col-lg-6">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>

<th>Usuario</th>
<th>Permiso</th>
<th>Fecha de registro</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>
@foreach ($lock->privileges as $privilege)
<tr>
<td>{{$privilege->email}}</td>
<td>
@if ($privilege->privilege == 1)
<span class="label label-info">admin</span>
@else
<span class="label label-primary">basico</span>
@endif
</td>
<td>{{$privilege->created_at}}</td>
<td><a class="btn btn-danger" href="/locks/{{$lock->id}}/{{$privilege->id}}/delete" role="button">Eliminar</a></td>
</tr>
@endforeach
</tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
<div class="col-xs-4 pull-right">
<form class="form" action="{{route('locks.insertPrivilege',$lock->id)}}" method="post" >
@csrf
@method('post')
<label for="name">Email:</label>
<br>
<input type="text" name="email" placeholder="Inserta un email" />
<br>
<label for="name">Permiso:</label>
<br>
<select name="role" class="form-control">
<option value="0">Basico</option>
<option value="1">Administrador</option>
</select>
<br>
<button type="submit" class="btn btn-default btn-primary">Dar permiso</button>
</form>
</div>
</div>
<!-- /.panel-body -->
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
<!-- /.col-lg-8 -->

<!-- <div class="col-lg-4">
<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-bell fa-fw"></i> Notifications Panel
</div>

<div class="panel-body">
<div class="list-group">
<a href="#" class="list-group-item list-group-item-success">
<i class="fa fa-unlock fa-fw"></i> <span class="negrita">Asier</span> apertura de cerradura
<span class="pull-right text-muted small"><em>4 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item list-group-item-info">
<i class="fa fa-key fa-fw"></i> <span class="negrita">Aitor</span> ha creado llave
<span class="pull-right text-muted small"><em>12 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item list-group-item-warning">
<i class="fa fa-trash-o fa-fw"></i> Message Sent
<span class="pull-right text-muted small"><em>27 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item list-group-item-danger">
<i class="fa fa-lock fa-fw"></i> Intento de acceso
<span class="pull-right text-muted small"><em>43 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-exclamation-circle fa-fw"></i> Server Rebooted
<span class="pull-right text-muted small"><em>11:32 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-bolt fa-fw"></i> Server Crashed!
<span class="pull-right text-muted small"><em>11:13 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-warning fa-fw"></i> Server Not Responding
<span class="pull-right text-muted small"><em>10:57 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
<span class="pull-right text-muted small"><em>9:49 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-money fa-fw"></i> Payment Received
<span class="pull-right text-muted small"><em>Yesterday</em>
</span>
</a>
</div>

<a href="#" class="btn btn-default btn-block">View All Alerts</a>
</div>

</div>-->
<!-- /.panel -->


<!-- /.panel .chat-panel -->
</div>
<!-- /.col-lg-4 -->
</div>

<script>







var mapa = L.map('lockMap').setView([{{$lock->latitude}}, {{$lock->longitude}}], 13);


var baselayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYW5kZXJsYWIiLCJhIjoiY2pyOTBmc3R6MGJmaTQzbWx6YzBpN25lbSJ9.hkFzj6uoWVw8Yx5IsTYQLw', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox.streets',
}).addTo(mapa);

var toplayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYW5kZXJsYWIiLCJhIjoiY2pyOTBmc3R6MGJmaTQzbWx6YzBpN25lbSJ9.hkFzj6uoWVw8Yx5IsTYQLw', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox.streets-satellite',
});

var layers = {
	'Basico': baselayer,
	'Satelite': toplayer
};

L.control.layers(layers).addTo(mapa);


// 	$('#geolocate').on('click', function(){
  //   mapa.locate({setView: true, maxZoom: 15});
  // });
  
  // create the geocoding control and add it to the map
  var searchControl = L.esri.Geocoding.geosearch({
    useMapBounds:false,																			//quitar filtración de mapa
    providers: [ L.esri.Geocoding.arcgisOnlineProvider() ] //de donde pilla la data
  }).addTo(mapa);
  
  // create an empty layer group to store the results and add it to the map
  var results = L.layerGroup().addTo(mapa);
  
  // listen for the results event and add every result to the map
  searchControl.on("results", function(data) {
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
      //getAseos(data.results[i].latlng.lat,data.results[i].latlng.lng);
    }
  });
  
  var lockIcon = L.icon({
    iconUrl: 'data:image/png;base64,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',
    
    iconSize:     [25, 35], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
  });
  

  var defaultMarker= new L.marker([{{$lock->latitude}}, {{$lock->longitude}}],{icon:lockIcon}).addTo(mapa);



var marcador;
mapa.on('click',function(e){
  
  mapa.removeLayer(defaultMarker);
	if(typeof(marcador)=="undefined"){
    
    var latlng = L.latLng();
    
		marcador= new L.marker(e.latlng,{icon:lockIcon});
    marcador.addTo(mapa);
    $.ajax({url: "/locks/"+{{$lock->id}}+"/"+e.latlng.lat+"/"+e.latlng.lng+"", success: function(result){
      alert(result);
    }});
	}else{
		marcador.setLatLng(e.latlng);

  }
  
});

  </script>
  
  @stop
  