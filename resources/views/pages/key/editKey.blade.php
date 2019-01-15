@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<div class="row">  
    <div class="col-sm-9">
        <h4>Editar Llave</h4>
        <div class="tab-content">
            <hr>
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> LLave
            </div>
            <!-- /.panel-heading -->
            <div class="">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <img src="https://us.123rf.com/450wm/artforeveryone/artforeveryone1708/artforeveryone170800036/83814878-golden-key-icon-isolated-concept-soluci%C3%B3n-acceso-desbloquear.jpg?ver=6" class="avatar img-thumbnail" alt="avatar">     
                    </div></hr><br>
                </div><!--/col-3-->

                <div class="col-sm-9">
                    <div class="tab-content">
                        <hr>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="keyName">Nombre de la llave:</label>
                                <p>{{$key->name}}</p>
                            </div>

                            <div class="col-xs-6">
                                <label for="keyName">Cerradura:</label>
                                <p>{{$key->lock->name}}</p>
                            </div>
                            <div class="col-xs-6">
                                <label for="keyName">Creada:</label>
                                <p>{{$key->created_at}}</p>
                            </div>

                            <div class="col-xs-6">
                                <form class="form" action="{{route('keys.update',$key->id)}}" method="post" >
                                    @csrf
                                    @method('PUT')
                                    <label for="name">Nuevo nombre de la llave:</label>
                                    <br>
                                    <input type="text" name="newKeyName" placeholder="{{$key->name}}" />
                                    <br>
                                    <br>                                
                                    <button type="submit" class="btn btn-default btn-primary">Cambiar</button>
                                </form>
                            </div>

                            <div class="col-xs-6">
                                <form class="form" action="{{route('keys.destroy',$key->id)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-default btn-danger">Eliminar llave</button> 
                                </form>
                            </div>  
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div><!--/col-9-->
    </div>
    <!-- /.panel-body -->
</div>





























<!--<form class="form" action="#" method="post" >
    
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

-->



</div>
</div><!--/col-9-->
</div><!--/row-->















@stop
