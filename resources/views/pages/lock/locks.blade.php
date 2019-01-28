@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<table width="100%" class="table table-striped table-bordered table-hover" id="locksTable">
    <thead>
        <tr>
            <th>Cerradura</th>
            <th>Propietario</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
      <!-- Falta editar el controlador todavia -->
      @foreach ($locks as $lock)
        <tr>
            <td><a href="/locks/{{ $lock->id }}">{{ $lock->name }}</a></td>
            <td>{{ $lock->user->email }}</td>
            <td>{{$lock->created_at}}</td>
        </tr>
      @endforeach

    </tbody>
</table>



@stop
