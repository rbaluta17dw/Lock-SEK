<nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">


  <div class="container">
    <a class="navbar-brand" href="/"><img class="logo-white" src="{{asset('assets/img/logodash.png')}}" alt=""></a>

    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="ion-navicon"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="probootstrap-navbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#section-features">Producto</a></li>
        <li class="nav-item"><a class="nav-link" href="#section-contact">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="#section-pricing">Precios</a></li>
        <li class="nav-item"><a class="nav-link" href="#section-faq">Preguntas Frecuentes</a></li>
        @guest
        <li class="nav-item cta-btn ml-xl-1 ml-lg-1 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="#"><span class="pb_rounded-4 px-4 button" data-toggle="modal" data-target="#login-modal">Iniciar Sesion</span></a></li>
        <li class="nav-item cta-btn ml-xl-1 ml-lg-1 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="/redirect"><img class="logo-white" src="{{asset('assets/img/btn_google_normal.png')}}" alt=""> </a></li>
        @endguest
        @auth
        <li class="nav-item"><a class="nav-link" href="profile">{{Auth::user()->email}}</a></li>
        @endauth

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="loginmodal-container">
              <h1>Inicia sesion con tu cuenta</h1><br>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" name="email" placeholder="Email" id="myEmail" value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Contraseña">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
                <input type="submit" name="login" class="login loginmodal-submit" value="Iniciar sesion" >
              </form>
              <div class="login-help">
                <a href="/password/reset">¿Olvidaste tu contraseña?</a>
              </div>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div>
</nav>
