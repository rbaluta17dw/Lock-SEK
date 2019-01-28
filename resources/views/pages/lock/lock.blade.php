@extends('layouts.dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('assets/js/leaflet/leaflet.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/map-loc.css')}}"/>

@stop

@section('scriptsTop')
<script src="{{asset('assets/js/leaflet/leaflet.js')}}"></script>
<script src="{{asset('assets/js/esri-leaflet.js')}}"></script>
<script src="{{asset('assets/js/map-search.js')}}"></script>
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
          
          
          <h4>Haz  doble click para actualizar la ubicación o Haz click derecho para eliminar la ubicación</h4>
          
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
    
    
    
    
    var lockLat = {{$lock->latitude? $lock->latitude : '43.3073225' }};
    var lockLng = {{$lock->longitude? $lock->longitude  : '-1.9914354'}};
    
    
    
    //var mapa = L.map('lockMap').setView([[43.3073225, -1.9914354]], 13);
    
    var mapa = L.map('lockMap').setView([lockLat, lockLng], 13);
    mapa.doubleClickZoom.disable(); 
    
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
        iconUrl: 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4IiB3aWR0aD0iNDgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMGg0OHY0OGgtNDh6IiBmaWxsPSJub25lIi8+PHBhdGggZD0iTTM2IDE2aC0ydi00YzAtNS41Mi00LjQ4LTEwLTEwLTEwcy0xMCA0LjQ4LTEwIDEwdjRoLTJjLTIuMjEgMC00IDEuNzktNCA0djIwYzAgMi4yMSAxLjc5IDQgNCA0aDI0YzIuMjEgMCA0LTEuNzkgNC00di0yMGMwLTIuMjEtMS43OS00LTQtNHptLTEyIDE4Yy0yLjIxIDAtNC0xLjc5LTQtNHMxLjc5LTQgNC00IDQgMS43OSA0IDQtMS43OSA0LTQgNHptNi4yLTE4aC0xMi40di00YzAtMy40MiAyLjc4LTYuMiA2LjItNi4yIDMuNDIgMCA2LjIgMi43OCA2LjIgNi4ydjR6Ii8+PC9zdmc+',
        iconSize:     [25, 35], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [15, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
      });
      
      
      
      var marcador;
      @if ($lock->latitude && $lock->longitude) 
      marcador= new L.marker([{{$lock->latitude}}, {{$lock->longitude}}],{icon:lockIcon}).addTo(mapa);
      @endif
      mapa.on('dblclick',function(e){
        
        if(typeof(marcador)=="undefined"){
          
          var latlng = L.latLng();
          
          marcador= new L.marker(e.latlng,{icon:lockIcon});
          marcador.addTo(mapa);
          $.ajax({url: "/locks/"+{{$lock->id}}+"/"+e.latlng.lat+"/"+e.latlng.lng+"", success: function(result){
            alert(result);
          }});
        }else{
          marcador.setLatLng(e.latlng);
          marcador.addTo(mapa);
          $.ajax({url: "/locks/"+{{$lock->id}}+"/"+e.latlng.lat+"/"+e.latlng.lng+"", success: function(result){
            alert(result);
          }});
        }
        
      });
      mapa.on("contextmenu", function () {
        mapa.removeLayer(marcador);
        $.ajax({url: "/locks/"+{{$lock->id}}+"/deleteLocation", success: function(result){
          alert(result);
        }});
      });
    </script>
    
    @stop
    