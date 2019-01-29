<!DOCTYPE html>
<html>

<head>
  @yield('css')
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
        <a class="navbar-brand" href="../../index.html"><img height="40px" src="{{asset('assets/img/logodash.png')}}" alt=""></a>
      </div>
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
              <span class="label-count">7</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">NOTIFICATIONS</li>
              <li class="body">
                <ul class="menu">
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-light-green">
                        <i class="material-icons">person_add</i>
                      </div>
                      <div class="menu-info">
                        <h4>Nuevo permiso otorgado</h4>
                        <p>
                          <i class="material-icons">access_time</i> 14 mins ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-cyan">
                        <i class="material-icons">lock_open</i>
                      </div>
                      <div class="menu-info">
                        <h4>Acceso autorizado</h4>
                        <p>
                          <i class="material-icons">access_time</i> 22 mins ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-red">
                        <i class="material-icons">delete_forever</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>Nancy Doe</b> deleted account</h4>
                        <p>
                          <i class="material-icons">access_time</i> 3 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-orange">
                        <i class="material-icons">mode_edit</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>Nancy</b> changed name</h4>
                        <p>
                          <i class="material-icons">access_time</i> 2 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-blue-grey">
                        <i class="material-icons">comment</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>John</b> commented your post</h4>
                        <p>
                          <i class="material-icons">access_time</i> 4 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-light-green">
                        <i class="material-icons">cached</i>
                      </div>
                      <div class="menu-info">
                        <h4><b>John</b> updated status</h4>
                        <p>
                          <i class="material-icons">access_time</i> 3 hours ago
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <div class="icon-circle bg-purple">
                        <i class="material-icons">settings</i>
                      </div>
                      <div class="menu-info">
                        <h4>Settings updated</h4>
                        <p>
                          <i class="material-icons">access_time</i> Yesterday
                        </p>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="javascript:void(0);">View All Notifications</a>
              </li>
            </ul>
          </li>
          <!-- #END# Notifications -->
          <!-- Tasks -->

          <!-- #END# Tasks -->
          <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
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
              <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
              <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
              <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
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
        <div class="copyright">
          &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
          <b>Version: </b> 1.0.5
        </div>
      </div>
      <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
      <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
          <ul class="demo-choose-skin">
            <li data-theme="red" class="active">
              <div class="red"></div>
              <span>Red</span>
            </li>
            <li data-theme="pink">
              <div class="pink"></div>
              <span>Pink</span>
            </li>
            <li data-theme="purple">
              <div class="purple"></div>
              <span>Purple</span>
            </li>
            <li data-theme="deep-purple">
              <div class="deep-purple"></div>
              <span>Deep Purple</span>
            </li>
            <li data-theme="indigo">
              <div class="indigo"></div>
              <span>Indigo</span>
            </li>
            <li data-theme="blue">
              <div class="blue"></div>
              <span>Blue</span>
            </li>
            <li data-theme="light-blue">
              <div class="light-blue"></div>
              <span>Light Blue</span>
            </li>
            <li data-theme="cyan">
              <div class="cyan"></div>
              <span>Cyan</span>
            </li>
            <li data-theme="teal">
              <div class="teal"></div>
              <span>Teal</span>
            </li>
            <li data-theme="green">
              <div class="green"></div>
              <span>Green</span>
            </li>
            <li data-theme="light-green">
              <div class="light-green"></div>
              <span>Light Green</span>
            </li>
            <li data-theme="lime">
              <div class="lime"></div>
              <span>Lime</span>
            </li>
            <li data-theme="yellow">
              <div class="yellow"></div>
              <span>Yellow</span>
            </li>
            <li data-theme="amber">
              <div class="amber"></div>
              <span>Amber</span>
            </li>
            <li data-theme="orange">
              <div class="orange"></div>
              <span>Orange</span>
            </li>
            <li data-theme="deep-orange">
              <div class="deep-orange"></div>
              <span>Deep Orange</span>
            </li>
            <li data-theme="brown">
              <div class="brown"></div>
              <span>Brown</span>
            </li>
            <li data-theme="grey">
              <div class="grey"></div>
              <span>Grey</span>
            </li>
            <li data-theme="blue-grey">
              <div class="blue-grey"></div>
              <span>Blue Grey</span>
            </li>
            <li data-theme="black">
              <div class="black"></div>
              <span>Black</span>
            </li>
          </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="settings">
          <div class="demo-settings">
            <p>GENERAL SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Report Panel Usage</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Email Redirect</span>
                <div class="switch">
                  <label><input type="checkbox"><span class="lever"></span></label>
                </div>
              </li>
            </ul>
            <p>SYSTEM SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Notifications</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Auto Updates</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
            </ul>
            <p>ACCOUNT SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Offline</span>
                <div class="switch">
                  <label><input type="checkbox"><span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Location Permission</span>
                <div class="switch">
                  <label><input type="checkbox" checked><span class="lever"></span></label>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </aside>
    <!-- #END# Right Sidebar -->
  </section>

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
