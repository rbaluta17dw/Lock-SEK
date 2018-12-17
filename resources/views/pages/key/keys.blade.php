@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<p>ESTAS EN LLAVES</p>




<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Horario</th>
            <th>Cerradura</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Llave 1</td>
            <td>Fecha 1</td>
            <td>Horario 1 </td>
            <td>Cerradura 1</td>
        </tr>
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
