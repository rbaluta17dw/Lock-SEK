@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')


<table id="keys_table" class="display">
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

    @foreach ($keys as $key)

        <tr >
            <td href="{{route('key',$key->id)}}">{{ $key->name }}</td>
            <td>{{ $key->created_at }}</td>
            <td>Horario 1 </td>
            <td>{{ $key->lock_id }} {{ $key->lock_id }} </td>
            <td>
                <button type="button" class="btn btn-primary">Editar</button>
                <!--<a href="" class="editName">Editar</a>-->
                <button type="button" class="btn btn-danger">Eliminar</button>
                <!--<a href="#">Eliminar</a>-->
            <td>
        </tr>
    @endforeach


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
