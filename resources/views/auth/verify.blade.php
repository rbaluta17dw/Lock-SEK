@extends('layouts.userDashboard')
@section('css')
@stop
@section('title', 'LockSEK')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificacion se ha enviado a su email.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder por favor confirme el email que le hemos enviado.') }}
                    {{ __('Si no recibio el email ') }}, <a href="{{ route('verification.resend') }}">{{ __('haga click aqui para reenviar') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
