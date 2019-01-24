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
                    LLAVES
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>@lang('keys.name')</th>
                                <th>@lang('keys.date')</th>
                                <th>@lang('keys.lock')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('keys.name')</th>
                                <th>@lang('keys.date')</th>
                                <th>@lang('keys.lock')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($keys as $key)
                            <tr>
                                <td><a  href="{{route('keys.edit',$key->id)}}" id="key{{ $key->id }}">{{ $key->name }}</td>
                                <td>{{ $key->created_at }}</td>
                                <td>{{ $key->lock->name }}</td>
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
