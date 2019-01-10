<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.headDashboard')
  <title>@yield('title')</title>
</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">LockSEK</a>
      </div>
      <!-- /.navbar-header -->
      @auth
      <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-alerts" id="notifications">
              <!--  <li>
                  <a href="#">
                    <div>
                      <i class="fa fa-comment fa-fw"></i>
                      <span class="pull-right text-muted small"></span>
                    </div>
                  </a>
                </li> -->

          </ul>
          <!-- /.dropdown-alerts -->
        </li>

        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ route('profile.index') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="{{ route('profile.settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
            @if (Auth::user()->roleId == 2)
            <li>
              <a href="/ausers"><i class="fa fa-users fa-fw"></i> Users</a>
            </li>
            <li>
              <a href="/akeys"><i class="fa fa-key fa-fw"></i> Keys</a>
            </li>
            <li>
              <a href="/alocks"><i class="fa fa-lock fa-fw"></i> Locks</a>
            </li>

            @else
            <li>
              <a href="/profile"><i class="fa fa-user fa-fw"></i> @lang('dashboard.user')</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-key fa-fw"></i> @lang('dashboard.keys')<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="{{ route('keys.index') }}">@lang('dashboard.listkey')</a>
                </li>
                <li>
                  <a href="{{ route('keys.createView') }}">@lang('dashboard.createkey')</a>
                </li>
              </ul>
              <!-- /.nav-second-level -->
            </li>
            <li>
              <a href="{{ route('locks.index') }}"><i class="fa fa-lock fa-fw"></i> @lang('dashboard.locks')</a>
            </li>
            @endif
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
