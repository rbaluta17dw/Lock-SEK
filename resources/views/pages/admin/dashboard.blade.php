@extends('layouts.dashboard')
@section('title', 'LockSEK')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">{{$months}}</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-3 col-md-6">
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
      <a href="{{route('admin.users')}}">
        <div class="panel-footer">
          <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
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
      <a href="{{route('admin.keys')}}">
        <div class="panel-footer">
          <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
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
      <a href="{{route('admin.locks')}}">
        <div class="panel-footer">
          <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
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
      <a href="{{route('admin.messsages')}}">
        <div class="panel-footer">
          <span class="pull-left">@lang('adminDashboard.viewDetails')</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
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
        <canvas id="chartjs-1" class="chartjs" width="770" height="385" style="display: block; width: 770px; height: 385px;">
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
      Line Chart Example
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
      <div class="chartjs-wrapper">
        <iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1">
        </iframe>
        <canvas id="chartjs-2" class="chartjs" width="770" height="385" style="display: block; width: 770px; height: 385px;">
        </canvas>
        <script>
        new Chart(document.getElementById("chartjs-2"),
          {"type":"bar","data":
              {"labels":["Usuario basico","Usuario premium"],"datasets":[
                  {"label":"My First Dataset","data":[{{$statBasic}},{{$statPremium}}],"backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)"]
                  }]
              }
          });

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
      Line Chart Example
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
          labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto"],
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
        <canvas id="income" width="600" height="400"></canvas>
        <script>



            // bar chart data
            var barData = {
                labels : ["January","February","March","April","May","June"],
                datasets : [
                    {
                        fillColor : "#48A497",
                        strokeColor : "#48A4D1",
                        data : [456,479,324,569,702,600]
                    },
                    {
                        fillColor : "rgba(73,188,170,0.4)",
                        strokeColor : "rgba(72,174,209,0.4)",
                        data : [364,504,605,400,345,320]
                    }
                ]
            }
            // get bar chart canvas
            var income = document.getElementById("income").getContext("2d");
            // draw bar chart
            new Chart(income).Bar(barData);
        </script>


@stop
