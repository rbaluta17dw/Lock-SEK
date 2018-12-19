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
        <tr>
            <td>Nombre 1</td>
            <td>Propietario 1</td>
            <td>Rol 1 </td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            <td>
        </tr>
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
