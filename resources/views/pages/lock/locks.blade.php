@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<table width="100%" class="table table-striped table-bordered table-hover" id="locksTable">
    <thead>
        <tr>
            <th>Cerradura</th>
            <th>Propietario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
      <!-- Falta editar el controlador todavia -->
      @foreach ($locks as $lock)
        <tr>
            <td><a href="/locks/{{ $lock->id }}">{{ $lock->name }}</a></td>
            <td>{{ $lock->user->name }}</td>
            <td>
                <button type="button" class="btn btn-primary">Editar</button>
            </td>
        </tr>
      @endforeach
<<<<<<< HEAD
=======
        <tr>
            <td>Nombre 2</td>
            <td>Propietario 2</td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            </td>
        </tr>
        <tr>
            <td>Nombre 3</td>
            <td>Propietario 3</td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            </td>
        </tr>

>>>>>>> c116f55d09d467d704907af9ef7a27dca40d4993

    </tbody>
</table>



@stop
