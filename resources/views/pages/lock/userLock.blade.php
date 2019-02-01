@extends('layouts.userDashboard')
@section('css')
<link href="{{asset('assets/user/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
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
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  <div class="card">
    <div class="header">
      <h2>TASK INFOS</h2>

    </div>
    <div class="body">
      <div class="row clearfix">
        <div class="col-sm-6 "><!--left col-->
          <h4>Haz  doble click para actualizar la ubicación o Haz click derecho para eliminar la ubicación</h4>
          <div id="lockMap" class="col-sm-6"></div>
          <!--<div class="text-center">
            <img src="https://cdn.website.thryv.com/716ee54454d94272ba5bf64e492f084d/MOBILE/png/961.png" class="avatar img-thumbnail" alt="avatar">
            <div class="prf-img-inp config">
              <input type="file" class="text-center center-block file-upload">
            </div>-->
          </div>

          <!--/col-3-->
          <div class="col-sm-6">
            <div class="tab-content">
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
                    <div class="form-line">
                      <input type="text" class="form-control" name="newLockName" placeholder="{{$lock->name}}" />
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cambiar</button>
                  </form>
                </div>
                <div class="col-xs-3">
                  <div class="button-demo js-modal-buttons">
                    <button type="button" data-color="red" class="btn btn-danger m-t-15 waves-effect">Eliminar Cerradura</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="card">
      <div class="header">
        <h2>Notificaciones</h2>

      </div>
      <div class="body">
        <div class="row clearfix">


          </div>
        </div>
      </div>
    </div>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
  <div class="card">
    <div class="header">
      <h2>TASK INFOS</h2>

    </div>
    <div class="body">
      <div class="row clearfix">

        <div class="col-lg-8">
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
                    @if ($privilege->pivot->privilege == 1)
                    <span class="label label-info">admin</span>
                    @else
                    <span class="label label-primary">basico</span>
                    @endif

                  </td>
                  <td>{{$privilege->created_at}}</td>
                  <td><a class="btn btn-danger m-t-15 waves-effect" href="{{route('locks.deletePrivilege',[$lock->id, $privilege->id]) }}" role="button">Eliminar</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <div class="col-sm-4 pull-right">
          <form class="form" action="{{route('locks.insertPrivilege',$lock->id)}}" method="post" >
            @csrf
            @method('post')
            <label for="name">Email:</label>
            <br>
            <input type="text" name="email" placeholder="Inserta un email" />
            <br>
            <label for="role">Permiso:</label>
            <br>

            <select name="role" class="form-control show-tick">
              <option value="">-- Please select --</option>
              <option value="0">Basico</option>
              <option value="1">Administrador</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Dar permiso</button>
          </form>
        </div>
      </div>
      <!--Privilege-->
      @if (Session::has('privilegeOk'))
      <div class="alert alert-success">{!! Session::get('privilegeOk') !!}</div>
      @endif

      @if (Session::has('privilegeFail'))
      <div class="alert alert-danger">{!! Session::get('privilegeFail') !!}</div>
      @endif
      <!--End Privilege -->

      <!-- For Material Design Colors -->
      <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="defaultModalLabel">Atencion!</h4>
            </div>
            <div class="modal-body">
              Esta usted a punto de eliminar la cerradura {{$lock->name}}
            </div>
            <form class="form" action="{{route('locks.destroy',$lock->id)}}" method="POST" >
              @csrf
              @method('DELETE')
              <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">Eliminar</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>




  var lockLat = {{$lock->latitude? $lock->latitude : '43.3073225' }};
  var lockLng = {{$lock->longitude? $lock->longitude  : '-1.9914354'}};





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
      }else{
        marcador.setLatLng(e.latlng);
      }
      marcador.addTo(mapa);
      $.ajax({url: "/locks/"+{{$lock->id}}+"/"+e.latlng.lat+"/"+e.latlng.lng+"", success: function(result){
        alert(result);
      }});

    });
    mapa.on("contextmenu", function () {
      mapa.removeLayer(marcador);
      $.ajax({url: "/locks/"+{{$lock->id}}+"/deleteLocation", success: function(result){
        alert(result);
      }});
    });
  </script>
  @stop
  @section('scripts')
  <!-- Custom Js -->
  <script src="{{asset('assets/user/js/pages/ui/modals.js')}}"></script>
  @stop
