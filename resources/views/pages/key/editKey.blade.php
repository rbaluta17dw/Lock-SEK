@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')






  <div class="row">
  
    <div class="col-sm-9">
    <h4>Editar Llave</h4>
      <div class="tab-content">
        <hr>
        <form class="form" action="#" method="post" id="registrationForm">

                <p>Nombre de la llave: <input type="text" name="keyName" placeholder="Nombre de la llave" /></p>
                <p>Rango de fechas y horas: <input type="text" name="dateRange" /></p>
                <p>Rango de fechas y horas: <input type="text" name="multipleDates" /></p>
        </form>

      </div>
    </div><!--/col-9-->
  </div><!--/row-->






@stop
