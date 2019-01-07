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
            <td href="{{route('keys.index',$key->id)}}" id="llave{{ $key->id }}">{{ $key->name }}</td>
            <td>{{ $key->created_at }}</td>
            <td>Horario 1 </td>
            <td>{{ $key->lock->name }} </td>
            <td id="botones">
                <button type="button" id="editName" class="btn btn-primary">Editar</button>
                <button type="button" id="deleteKey" class="btn btn-danger">Eliminar</button>
            <td>
        </tr>
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
