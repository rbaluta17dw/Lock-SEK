@extends('layouts.userDashboard')
@section('title', 'LockSEK')
@section('content')



<!-- Modal -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Atencion!</h4>
            </div>
            <div class="modal-body">
                Esta usted a punto de eliminar la llave {{$key->name}}
            </div>
            <form class="form" action="{{route('keys.destroy',$key->id)}}" method="POST" >
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
<!-- /Modal -->


<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
    <div class="card">
        <div class="header">
            <h2>TASK INFOS</h2>

        </div>
        <div class="body">
            <div class="row clearfix">
                <div class="col-sm-6 "><!--left col-->
                    <div class="text-center">
                            <img id="keyImg" src="{{asset('assets/images/key-img.jpg')}}" height="50%" width="40%" >
                    </div><br>
                </div>

                <!--/col-3-->
                <div class="col-sm-4">
                    <div class="tab-content">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="keyName">Nombre de la llave:</label>
                                <p>{{$key->name}}</p>
                            </div>
                            <div class="col-xs-6">
                                <label for="keyName">Creada:</label>
                                <p>{{$key->created_at}}</p>
                            </div>
                            <div class="col-xs-6">
                                <form class="form" action="{{route('keys.update',$key->id)}}" method="post" >
                                    @csrf
                                    @method('put')
                                    <label for="name">Nuevo nombre de la llave:</label>
                                    <br>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="newKeyName" placeholder="{{$key->name}}" />
                                    </div>
                                    <br>
                                    <br>
                                    <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Cambiar</button>
                                </form>
                            </div>
                            <div class="col-xs-3">
                                <div class="button-demo js-modal-buttons">
                                    <button type="button" data-color="red" class="btn btn-danger m-t-15 waves-effect">Eliminar llave</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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




@section('scripts')
<!-- Custom Js -->
<script src="{{asset('assets/user/js/pages/ui/modals.js')}}"></script>
@stop

@stop
