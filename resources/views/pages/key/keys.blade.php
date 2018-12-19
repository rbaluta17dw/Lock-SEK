@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Horario</th>
            <th>Cerradura</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        <tr id="linea+i">
            <td id="">Llave 1</td>
            <td>Fecha 1</td>
            <td>Horario 1 </td>
            <td>Cerradura 1</td>
            <td>
                <a href="" class="editName">Editar</a>/
                <a href="#">Eliminar</a>
            <td>
        </tr>



        <tr>
            <td>Llave 2</td>
            <td>Fecha 2</td>
            <td>Horario 1 </td>
            <td>Cerradura 2</td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            <td>
        </tr>
        <tr>
            <td>Llave 3</td>
            <td>Fecha 3</td>
            <td>Horario 1 </td>
            <td>Cerradura 3</td>
            <td>
                <a href="#">Editar</a>/
                <a href="#">Eliminar</a>
            <td>
        </tr>

        
    </tbody>
</table>



@stop
