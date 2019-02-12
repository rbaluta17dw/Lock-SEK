<!DOCTYPE html>
<html>

<head>
  @yield('css')
  @yield('scriptsTop')
  @include('includes.userHeadDashboard')
  <title>@yield('title')</title>
  <!-- Matomo -->
  <script type="text/javascript">
    var _paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//matomo.locksek.com/piwik/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '1']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->
</head>

<body class="theme-cyan">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
  
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="/home"><img height="40px" src="{{asset('assets/img/logodash.png')}}" alt=""></a>
      </div>
      @auth
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- Notifications -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{App::getLocale()}} <img class="flag" src="{{asset('assets/images/'.App::getLocale().'.ico')}}"></i> <i class="fa fa-caret-down"></i>
            </a>
            
            <ul class="dropdown-menu">
              <li class="header">IDIOMA</li>
              <li>
                <a href="{{ route('change_lang', ['lang' => 'es']) }}">ES <img class="flag" src="{{asset('assets/images/es.ico')}}"></a>
              </li>
              <li>
                <a href="{{ route('change_lang', ['lang' => 'en']) }}">EN <img class="flag" src="{{asset('assets/images/en.ico')}}"></a>
              </li>
              <li>
                <a href="{{ route('change_lang', ['lang' => 'eu']) }}">EU <img class="flag" src="{{asset('assets/images/eu.ico')}}"></a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="material-icons">notifications</i>
              <span class="label-count" id="count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">NOTIFICATIONS</li>
              <li class="body">
                <ul class="menu" id="notifications">
                  
                </ul>
              </li>
              <li class="footer">
                <a href="{{ route('notifications.index') }}">View All Notifications</a>
              </li>
            </ul>
          </li>
          <!-- #END# Notifications -->
          <!-- Tasks -->
          
          <!-- #END# Tasks -->
        </ul>
      </div>
      @endauth
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    @auth
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          @if (isset(Auth::user()->imgname))
          <img src="{{Storage::url('avatars/'.Auth::user()->imgname)}}" width="48" height="48" alt="User" />
          @else
          <img src="{{asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
          @endif
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
          <div class="email">{{Auth::user()->email}}</div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li><a href="/profile"><i class="material-icons">person</i>Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/settings"><i class="material-icons">settings</i>Settings</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </ul>
            </div>
          </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
          <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Route::is('dashboard.home') ? 'active' : '' }}">
              <a href="{{ route('dashboard.home') }}">
                <i class="material-icons">home</i>
                <span>Home</span>
              </a>
            </li>
            
            
            <li class="{{ Route::is('keys.index') ? 'active' : '' }}{{ Route::is('keys.create') ? 'active' : '' }}">
              <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">vpn_key</i>
                <span>@lang('dashboard.keys')</span>
              </a>
              <ul class="ml-menu">
                <li class="{{ Route::is('keys.index') ? 'active' : '' }}">
                  <a href="{{ route('keys.index') }}">@lang('dashboard.listkeys')</a>
                </li>
                <li class="{{ Route::is('keys.create') ? 'active' : '' }}">
                  <a href="{{ route('keys.create') }}">@lang('dashboard.createkey')</a>
                </li>
              </ul>
            </li>
            <li class="{{ Route::is('locks.index') ? 'active' : '' }}{{ Route::is('locks.register') ? 'active' : '' }}">
              <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">lock</i>
                <span>@lang('dashboard.locks')</span>
              </a>
              <ul class="ml-menu">
                <li class="{{ Route::is('locks.index') ? 'active' : '' }}">
                  <a href="{{ route('locks.index') }}">@lang('dashboard.listlocks')</a>
                </li>
                <li class="{{ Route::is('locks.register') ? 'active' : '' }}">
                  <a href="{{ route('locks.register') }}">@lang('dashboard.registerlock')</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
          <a href="{{ route( 'user.premium' )}}">
            @if (Auth::user()->roleId == 0)
            <button class="btn btn-primary btn-lg btn-block waves-effect" type="button">CAMBIAR A PREMIUM </button>
            @else
            <button class="btn btn-danger btn-lg btn-block waves-effect" type="button">DEJAR DE SER PREMIUM </button>
            @endif
          </a>
          <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">LockSEK</a>.
          </div>
          <div class="version">
            <b>Version: </b> 1.0.5
          </div>
        </div>
        <!-- #Footer -->
      </aside>
      @endauth
      <!-- #END# Left Sidebar -->
      <!-- Right Sidebar -->
      
      <!-- #END# Right Sidebar -->
    </section>
    <script>
      
      $(window).click(function(){
        $.ajax({url: "/notifications", success: function(result){
          var count = result.length;
          $('#notifications').html('');
          $('#count').html(count);
          if (result.length == 0) {
            $('#notifications').append('<p>No hay notificaciones</p>');
          }else {
            
            for (var i = 0; i < result.length; i++) {
              if (result[i].title.length>10) {
                result[i].title=result[i].title.substring(0,33)+"...";
              }
              switch (result[i].marker) {
                case 0:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-red"><i class="material-icons">delete_forever</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 1:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-orange"><i class="material-icons">mode_edit</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 2:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-blue-grey"><i class="material-icons">comment</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 3:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-purple"><i class="material-icons">settings</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 4:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-light-green"><i class="material-icons">person_add</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 5:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-yellow"><i class="material-icons">person_add</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                default:
                result[i].marker = "";
              }
            }
          }
        }});
      });
      $(window).ready(function(){
        $.ajax({url: "/notifications", success: function(result){
          var count = result.length;
          $('#notifications').html('');
          $('#count').html(count);
          if (result.length == 0) {
            $('#notifications').append('<p>No hay notificaciones</p>');
          }else {
            
            for (var i = 0; i < result.length; i++) {
              if (result[i].title.length>10) {
                result[i].title=result[i].title.substring(0,33)+"...";
              }
              switch (result[i].marker) {
                case 0:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-red"><i class="material-icons">delete_forever</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 1:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-orange"><i class="material-icons">mode_edit</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 2:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-blue-grey"><i class="material-icons">comment</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 3:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-purple"><i class="material-icons">settings</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 4:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-light-green"><i class="material-icons">person_add</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                case 5:
                $('#notifications').append('<li><a href="javascript:void(0);"><div class="icon-circle bg-yellow"><i class="material-icons">person_add</i></div><div class="menu-info"><h4>'+result[i].title+'</h4></div></a></li>');
                break;
                default:
                result[i].marker = "";
              }
            }
          }
        }});
      });
    </script>
    <section class="content">
      <div class="container-fluid">
        <div class="block-header">
          @yield('content')
        </div>
      </div>
    </section>
    @include('includes.userScriptsDashboard')
    @yield('scripts')
  </body>
  </html>
  