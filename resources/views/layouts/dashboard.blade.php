<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.headDashboard')
  @yield('scriptsTop')
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
<body>
  @yield('header')
  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
            <a class="navbar-brand" href="{{route('admin.index')}}"><img class="logo-no-icon" src="{{asset('assets/img/logodash.png')}}" alt=""></a>
            <span class="label label-warning">Admin</span>
      </div>
      <!-- /.navbar-header -->
      @auth
        <ul class="nav navbar-top-links navbar-right">
          <!-- /.dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{App::getLocale()}} <img class="flag" src="{{asset('assets/images/'.App::getLocale().'.ico')}}"></i> <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu dropdown-language">

              <li><a href="{{ route('change_lang', ['lang' => 'es']) }}">ES <img class="flag" src="{{asset('assets/images/es.ico')}}"></a>
              </li>
              <li><a href="{{ route('change_lang', ['lang' => 'en']) }}">EN <img class="flag" src="{{asset('assets/images/en.ico')}}"></a>
              </li>
              <li><a href="{{ route('change_lang', ['lang' => 'eu']) }}">EU <img class="flag" src="{{asset('assets/images/eu.ico')}}"></a>
              </li>
            </ul>
          </li>
   

          <!-- /.dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="{{ route('admin.profile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
              </li>
              <li><a href="{{ route('admin.settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
              </li>
              <li class="divider"></li>
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}</a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </ul>
            <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
        </ul>

        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                  <a href="{{route('admin.users')}}"><i class="fa fa-users fa-fw"></i> Users</a>
                </li>
                <li>
                  <a href="{{route('admin.keys')}}"><i class="fa fa-key fa-fw"></i> Keys</a>
                </li>
                <li>
                  <a href="{{route('admin.locks')}}"><i class="fa fa-lock fa-fw"></i> Locks</a>
                </li>
                <li>
                  <a href="{{route('liveStats')}}"><i class="fa fa-area-chart fa-fw"></i> LiveStats</a>
                </li>
              </ul>

            </div>
            <!-- /.sidebar-collapse -->
          </div>
        @endauth
        <!-- /.navbar-static-side -->

      </nav>

      <!-- Page Content -->
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                @yield('subtitle')</h1>
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->

          <!--Aqui va el contenido jibiri jibiri-->
          @yield('content')


        </div>
        <!-- /#page-wrapper -->

      </div>
      <!-- /#wrapper -->




    </body>

    @include('includes.scriptsDashboard')

    </html>
