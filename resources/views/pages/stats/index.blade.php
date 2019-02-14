@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('css')
<link rel="stylesheet" href="{{asset('assets/user/css/customcss.css')}}">
@stop
@section('scriptsTop')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
@stop
@section('content')
<div class="row">


  <div class="col-lg-12">
    <div class="alert alert-info" role="alert">
      Puedes acceder a las diferentes vistas pulsando la tecla correspondiente
    </div>
    <div class="alert alert-info" role="alert">
      En cualquiera de las paginas de Estadisticas <strong>pulsa ESPACIO para volver atras </strong>
    </div>

<div class="bs-example">
    <table class="table">
      <caption>Optional table caption.</caption>
      <thead>
        <tr>
          <th>#</th>
          <th>Key</th>
          <th>Page</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><a class="btn btn-primary" href="{{route('liveStats.general')}}" role="button">General</a></th>
          <td>1</td>
          <td>Vista general de varias estadisticas</td>
        </tr>
        <tr>
          <th><a class="btn btn-primary" href="{{route('liveStats.map')}}" role="button">Mapa</a></th>
          <td>2</td>
          <td>Vista completa del mapa</td>
        </tr>

      </tbody>
    </table>
</div>


  </div>

</div>



<script>
//Aqui estan los codigos http://www.javascripter.net/faq/keycodes.htm
window.onload = function() {
   window.focus();
};

document.body.addEventListener("keydown", function (event) {
if (event.keyCode === 49) {
 window.location.replace("{{route('liveStats.general')}}");
}
if (event.keyCode === 50) {
 window.location.replace("{{route('liveStats.map')}}");
}
});
</script>





@stop
