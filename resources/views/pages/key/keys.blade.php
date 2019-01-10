@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


  <table width="100%" class="table table-striped table-bordered table-hover" id="keys_table">
    <thead>
      <tr>
        <th>@lang('keys.name')</th>
        <th>@lang('keys.date')</th>
        <th>@lang('keys.schedule')</th>
        <th>@lang('keys.lock')</th>
        <th>@lang('keys.actions')</th>

      </tr>
    </thead>
    <tbody>

      @foreach ($keys as $key)
        <form>
          <tr >
            <td href="{{route('keys.index',$key->id)}}" id="key{{ $key->id }}">{{ $key->name }}</td>
            <td>{{ $key->created_at }}</td>
            <td>Horario 1 </td>
            <td>{{ $key->lock_id }} </td>
            <td>
                <button type="button" class="btn btn-primary">@lang('keys.edit')</button>
                <!--<a href="" class="editName">Editar</a>-->
                <button type="button" class="btn btn-danger">@lang('keys.delete')</button>
                <!--<a href="#">Eliminar</a>-->
            <td>
        </tr>
        </form>
    @endforeach


        <tr>
            <td>Llave 2</td>
            <td>Fecha 2</td>
            <td>Horario 1 </td>
            <td>Cerradura 2</td>
            <td>
            <button type="button" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
            <td>
        </tr>
        <tr>
            <td>Llave 3</td>
            <td>Fecha 3</td>
            <td>Horario 1 </td>
            <td>Cerradura 3</td>
            <td>
            <button type="button" class="btn btn-primary">Editar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
            <td>
        </tr>


    </tbody>
</table>



@stop
