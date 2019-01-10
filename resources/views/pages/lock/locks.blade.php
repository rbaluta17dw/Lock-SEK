@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<table width="100%" class="table table-striped table-bordered table-hover" id="locksTable">
    <thead>
        <tr>
            <th>Cerradura</th>
            <th>Propietario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
      <!-- Falta editar el controlador todavia -->
      @foreach ($locks as $lock)
        <tr>
            <td>{{ $lock->name }}</td>
            <td>{{ $lock->user->name }}</td>
            <!-- Aqui va un if para saber si el usuario es propietario o simplemente tiene acceso a la cerradura -->
            <td>Rol 1 </td>
            <!-- Solo aparecera boton editar si es propietario -->
            <td>
                <button type="button" class="btn btn-primary">Editar</button>
            </td>
        </tr>
      @endforeach
        <tr>
            <td>Nombre 2</td>
            <td>Propietario 2</td>
            <td>Rol 1 </td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            </td>
        </tr>
        <tr>
            <td>Nombre 3</td>
            <td>Propietario 3</td>
            <td>Rol 1 </td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            </td>
        </tr>


    </tbody>
</table>



@stop
