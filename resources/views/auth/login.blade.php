@extends('layouts.userDashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="header bg-cyan">
                  <h2>
                      {{ __('Login') }}
                  </h2>

              </div>
              <div class="body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#locksek" data-toggle="tab"><img height="20px" src="{{asset('assets/img/logodash.png')}}" alt=""></a></li>
                    <li role="presentation"><a href="#google" data-toggle="tab"><img height="20px" src="{{asset('assets/img/googlelogo.png')}}" alt=""></a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="locksek">
                      <form method="POST" action="{{ route('login') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <div class="form-group">
                                              <div class="form-line">
                                                  <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="example@email.com">
                                              </div>
                                          </div>
                                  @if ($errors->has('email'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <div class="form-group">
                                              <div class="form-line">
                                                  <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >
                                              </div>
                                          </div>
                                  @if ($errors->has('password'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="form-check">
                                      <input type="checkbox" id="remember" name="remember" class="filled-in" {{ old('remember') ? 'checked' : '' }} />
                                      <label for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Login') }}
                                  </button>

                                  @if (Route::has('password.request'))
                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                          {{ __('Forgot Your Password?') }}
                                      </a>
                                  @endif
                              </div>
                          </div>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="google">
                      <div class="align-center">
                        <img class="logo-white" src="{{asset('assets/img/btn_google_normal.png')}}" alt="">
                      </div>
                    </div>
                </div>

              </div>

        </div>
    </div>
</div>
@endsection
