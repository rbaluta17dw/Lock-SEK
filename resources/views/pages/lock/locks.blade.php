@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<table id="locksTable" class="display">
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
            <td>{{ $key->name }}</td>
            <td>{{ $key->user_id->name }}</td>
            <!-- Aqui va un if para saber si el usuario es propietario o simplemente tiene acceso a la cerradura -->
            <td>Rol 1 </td>
            <!-- Solo aparecera boton editar si es propietario -->
            <td>
                <button type="button" class="btn btn-primary">Editar</button>
            <td>
        </tr>
      @endforeach
        <tr>
            <td>Nombre 2</td>
            <td>Propietario 2</td>
            <td>Rol 1 </td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            <td>
        </tr>
        <tr>
            <td>Nombre 3</td>
            <td>Propietario 3</td>
            <td>Rol 1 </td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            <td>
        </tr>


    </tbody>
</table>



@stop
