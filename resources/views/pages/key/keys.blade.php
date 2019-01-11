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
        

      </tr>
    </thead>
    <tbody>

      @foreach ($keys as $key)
        <form>
          <tr >
            <td> <a  href="{{route('keys.edit',$key->id)}}" id="key{{ $key->id }}">{{ $key->name }}</td>
            <td>{{ $key->created_at }}</td>
            <td>Horario 1 </td>
            <td>{{ $key->lock_id }} </td>
        </tr>
        </form>
    @endforeach


        <tr>
            <td>Llave 2</td>
            <td>Fecha 2</td>
            <td>Horario 1 </td>
            <td>Cerradura 2</td>

        </tr>
        <tr>
            <td>Llave 3</td>
            <td>Fecha 3</td>
            <td>Horario 1 </td>
            <td>Cerradura 3</td>
            
        </tr>


    </tbody>
</table>



@stop
