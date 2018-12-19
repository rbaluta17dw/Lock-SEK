@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')






<div class="row">
    
    <div class="col-sm-9">
        <h4>Editar Llave</h4>
        <div class="tab-content">
            <hr>
            
            
            
            <form class="form" action="#" method="post" id="registrationForm">
                <label for="date">Nuevo nombre de la llave</label>
                <input type="text" name="newKeyName" placeholder="Nombre de la llave" />
                
                
                <button type="submit" class="btn btn-default btn-primary">Cambiar</button>
                
            </form>
            
            <br>
            <form class="form" action="#" method="post" id="registrationForm">
                
                <label for="date">Nuevo rango de fechas</label>
                
                <input type="text" class="form rangeCalendar" name="newDateRange" />
                
                <button type="submit" class="btn btn-default btn-primary">Cambiar</button>
                
            </form>
            <br>
            
            <form action="#" method="post" class="form">
                
                <label for="date">Nuevas fechas</label>
                <input type="text" class="form multiCalendar" name="newMultiDate">
                
                <button type="submit" class="btn btn-default btn-primary">Cambiar</button>
            </form>
            
            
            
        </div>
    </div><!--/col-9-->
</div><!--/row-->















@stop
