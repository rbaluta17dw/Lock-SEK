@extends('layouts.userDashboard')

@section('css')
<link href="{{asset('assets/user/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@stop
@section('title', 'LockSEK')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    TUS CERRADURAS
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Cerradura</th>
                                <th>Propietario</th>
                                <th>Fecha de creacion</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Cerradura</th>
                              <th>Propietario</th>
                              <th>Fecha de creacion</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($locks as $lock)
                            <tr>
                                <td><a href="/locks/{{ $lock->id }}">{{ $lock->name }}</a></td>
                                <td>{{ $lock->user->email }}</td>
                                <td>{{$lock->created_at}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="header">
                    <h2>
                      LAS CERRADURAS A LAS QUE TIENES ACCESO
                    </h2>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Cerradura</th>
                                <th>Propietario</th>
                                <th>Fecha de creacion</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Cerradura</th>
                              <th>Propietario</th>
                              <th>Fecha de creacion</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach (Auth::user()->privileges as $lock)
                            <tr>
                                <td><a href="/locks/{{ $lock->id }}">{{ $lock->name }}</a></td>
                                <td>{{ $lock->user->email }}</td>
                                <td>{{$lock->created_at}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('assets/user/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/user/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('assets/user/js/pages/tables/jquery-datatable.js')}}"></script>
@stop
