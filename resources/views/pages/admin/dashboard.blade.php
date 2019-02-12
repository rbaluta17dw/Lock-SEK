@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('css')
  <link rel="stylesheet" href="{{asset('assets/user/css/customcss.css')}}">
  <script src="{{asset('assets/js/chart.js')}}"></script>
@stop
@section('scriptsTop')
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
@stop
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"></h1>

      <!--  PREMIUM:
      <?php echo print_r($monthsPremium);?> -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <a href="{{route('admin.users')}}">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{$users}}</div>
                <div>@lang('adminDashboard.users')</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6">
      <a href="{{route('admin.keys')}}">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-key fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{$keys}}</div>
                <div>@lang('adminDashboard.keys')</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6">
      <a href="{{route('admin.locks')}}">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-lock fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{$locks}}</div>
                <div>@lang('adminDashboard.locks')</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6">
      <a href="{{route('admin.messsages')}}">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-envelope fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{$messages}}</div>
                <div>@lang('adminDashboard.messages')</div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">

    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- https://codepen.io/venturads/pen/OyNejq -->
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        Line Chart Example
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="chartjs-wrapper">
          <iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1">
          </iframe>
          <canvas id="chartjs-1" class="chartjs" width="600" height="400" style="display: block; width: 770px; height: 385px;">
          </canvas>
          <script>new Chart(document.getElementById("chartjs-1"),{"type":"pie","data":{"labels":["Usuario basico","Usuario premium"],"datasets":[{"label":"My First Dataset","data":[{{$statBasic}},{{$statPremium}}],"backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)"]}]}});
          </script>
        </div>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>

  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        Registros Basicos/Admin
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="chartjs-wrapper">
          <iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1">
          </iframe>
          <canvas id="densityChart" width="600" height="400"></canvas>
          <script>


          var densityCanvas = document.getElementById("densityChart");

          var densityData = {
            label: 'Usuarios basicos',
            data: [300, 100, 200, 150, 100, 250, 278, 196],
            backgroundColor: 'rgba(0, 99, 132, 0.6)',
            borderWidth: 0,
          };

          var gravityData = {
            label: 'Usuarios Premium',
            data: [10, 50, 80, 70, 60, 55, 100, 74],
            backgroundColor: 'rgba(99, 132, 0, 0.6)',
            borderWidth: 0,

          };

          var planetData = {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agoooosto"],
            datasets: [densityData, gravityData]
          };

          var chartOptions = {
            scales: {
              xAxes: [{
                barPercentage: 1,
                categoryPercentage: 0.6
              }],
              yAxes: [{
                id: "y-axis-density"
              }, ]
            }
          };

          var barChart = new Chart(densityCanvas, {
            type: 'bar',
            data: planetData,
            options: chartOptions
          });



          </script>

        </div>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- line chart canvas element -->

  <!-- bar chart canvas element -->

  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        Login/Registros
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="chartjs-wrapper">
          <iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1">
          </iframe>



          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <canvas id="accesos" width="600" height="400"></canvas>
          </div>
          <script>
          var densityCanvas = document.getElementById("accesos");


          $.ajax({
            type: "get",
            url: "/graficos",
            success:function(data)
            {
              var usuario = 0;
              var llave = 0;
              var cerradura = 0;
              var permisos = 0;
              var admin = 0;
              var accesos = 0;
              for (var i = 0; i < data.length; i++) {
                switch (data[i].marker) {
                  case 1:
                  usuario++;
                  break;
                  case 2:
                  llave++;
                  break;
                  case 3:
                  cerradura++;
                  break;
                  case 4:
                  permisos++;
                  break;
                  case 5:
                  admin++;
                  break;
                  case 6:
                  accesos++;
                  break;
                  default:

                }
              }

              var densityData = {
                label: 'Cambios',
                data: [usuario, llave, cerradura, permisos, admin, accesos],
                backgroundColor: ['rgba(0, 99, 132, 0.6)',
                'rgba(0, 29, 52, 0.6)',
                'rgba(0, 69, 12, 0.6)',
                'rgba(40, 11, 255, 0.6)',
                'rgba(130, 99, 132, 0.6)',
                'rgba(255, 99, 132, 0.6)'
              ],
              borderWidth: 0,
            };

            var planetData = {
              labels: ['Cambios usuario', 'Cambios llave', 'Cambios cerradura', 'Cambios permisos', 'Cambios admin', 'Accesos'],
              datasets: [densityData]
            };

            var chartOptions = {
              scales: {
                xAxes: [{
                  barPercentage: 1,
                  categoryPercentage: 0.6
                }],
                yAxes: [{
                  id: "y-axis-density"
                }, ]
              }
            };

            var barChart = new Chart(densityCanvas, {
              type: 'pie',
              data: planetData,
              options: chartOptions
            });
          }

        });
        setInterval(function()
        {
          $.ajax({
            type: "get",
            url: "/graficos",
            success:function(data)
            {
              var usuario = 0;
              var llave = 0;
              var cerradura = 0;
              var permisos = 0;
              var admin = 0;
              var accesos = 0;
              for (var i = 0; i < data.length; i++) {
                switch (data[i].marker) {
                  case 1:
                  usuario++;
                  break;
                  case 2:
                  llave++;
                  break;
                  case 3:
                  cerradura++;
                  break;
                  case 4:
                  permisos++;
                  break;
                  case 5:
                  admin++;
                  break;
                  case 6:
                  accesos++;
                  break;
                  default:

                }
              }

              var densityData = {
                label: 'Cambios',
                data: [usuario, llave, cerradura, permisos, admin, accesos],
                backgroundColor: ['rgba(0, 99, 132, 0.6)',
                'rgba(0, 29, 52, 0.6)',
                'rgba(0, 69, 12, 0.6)',
                'rgba(40, 11, 255, 0.6)',
                'rgba(130, 99, 132, 0.6)',
                'rgba(255, 99, 132, 0.6)'
              ],
              borderWidth: 0,
            };

            var planetData = {
              labels: ['Cambios usuario', 'Cambios llave', 'Cambios cerradura', 'Cambios permisos', 'Cambios admin', 'Accesos'],
              datasets: [densityData]
            };

            var chartOptions = {
              scales: {
                xAxes: [{
                  barPercentage: 1,
                  categoryPercentage: 0.6
                }],
                yAxes: [{
                  id: "y-axis-density"
                }, ]
              }
            };

            var barChart = new Chart(densityCanvas, {
              type: 'pie',
              data: planetData,
              options: chartOptions
            });
          }
        });
      }, 60000);



      </script>

    </div>
  </div>
  <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>


@stop
