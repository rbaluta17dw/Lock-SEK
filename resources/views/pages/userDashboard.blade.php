@extends('layouts.userDashboard')
@section('css')
  <link rel="stylesheet" href="{{asset('assets/user/css/customcss.css')}}">
  <script src="{{asset('assets/js/chart.js')}}"></script>
@stop
@section('title', 'LockSEK')
@section('content')
  <div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <a href="/locks">
        <div class="info-box bg-pink hover-expand-effect">
          <div class="icon">
            <i class="material-icons">lock</i>
          </div>
          <div class="content">
            <div class="text">Cerraduras</div>
            <div class="number count-to" data-from="0" data-to="{{$locks}}" data-speed="15" data-fresh-interval="20"></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <a href="/locks">
        <div class="info-box bg-cyan hover-expand-effect">
          <div class="icon">
            <i class="material-icons">vpn_key</i>
          </div>
          <div class="content">
            <div class="text">Llaves</div>
            <div class="number count-to" data-from="0" data-to="{{$keys}}" data-speed="1000" data-fresh-interval="20"></div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <a href="{{ route('notifications.index') }}">
        <div class="info-box bg-light-green hover-expand-effect">
          <div class="icon">
            <i class="material-icons">forum</i>
          </div>
          <div class="content">
            <div class="text">Notificaciones</div>
            <div class="number count-to" data-from="0" data-to="{{$notifications}}" data-speed="1000" data-fresh-interval="20"></div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <canvas id="densityChart"></canvas>
  </div>
  <script>
  var densityCanvas = document.getElementById("densityChart");


  $.ajax({
    type: "get",
    url: "/graficos",
    success:function(data)
    {
      console.log(data);
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
        console.log(data);
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

<!-- #END# Widgets -->
<!-- CPU Usage -->

<!-- #END# CPU Usage -->
<!--
<div class="row clearfix">

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<div class="card">
<div class="body bg-pink">
<div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
data-fill-Color="rgba(0, 188, 212, 0)">
12,10,9,6,5,6,10,5,7,5,12,13,7,12,11
</div>
<ul class="dashboard-stat-list">
<li>
TODAY
<span class="pull-right"><b>1 200</b> <small>USERS</small></span>
</li>
<li>
YESTERDAY
<span class="pull-right"><b>3 872</b> <small>USERS</small></span>
</li>
<li>
LAST WEEK
<span class="pull-right"><b>26 582</b> <small>USERS</small></span>
</li>
</ul>
</div>
</div>
</div>
-->
<!-- #END# Visitors -->
<!-- Latest Social Trends -->
<!--
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<div class="card">
<div class="body bg-cyan">
<div class="m-b--35 font-bold">LATEST SOCIAL TRENDS</div>
<ul class="dashboard-stat-list">
<li>
#socialtrends
<span class="pull-right">
<i class="material-icons">trending_up</i>
</span>
</li>
<li>
#materialdesign
<span class="pull-right">
<i class="material-icons">trending_up</i>
</span>
</li>
<li>#adminbsb</li>
<li>#freeadmintemplate</li>
<li>#bootstraptemplate</li>
<li>
#freehtmltemplate
<span class="pull-right">
<i class="material-icons">trending_up</i>
</span>
</li>
</ul>
</div>
</div>
</div>
-->
<!-- #END# Latest Social Trends -->
<!-- Answered Tickets -->
<!--
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<div class="card">
<div class="body bg-teal">
<div class="font-bold m-b--35">ANSWERED TICKETS</div>
<ul class="dashboard-stat-list">
<li>
TODAY
<span class="pull-right"><b>12</b> <small>TICKETS</small></span>
</li>
<li>
YESTERDAY
<span class="pull-right"><b>15</b> <small>TICKETS</small></span>
</li>
<li>
LAST WEEK
<span class="pull-right"><b>90</b> <small>TICKETS</small></span>
</li>
<li>
LAST MONTH
<span class="pull-right"><b>342</b> <small>TICKETS</small></span>
</li>
<li>
LAST YEAR
<span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
</li>
<li>
ALL
<span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
</li>
</ul>
</div>
</div>
</div>

</div>
-->
<!--
<div class="row clearfix">

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
<div class="card">
<div class="header">
<h2>LOG GENERAL</h2>
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
<table class="table table-hover dashboard-task-infos">
<thead>
<tr>
<th>#</th>
<th>Task</th>
<th>Status</th>
<th>Manager</th>
<th>Progress</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Task A</td>
<td><span class="label bg-green">Doing</span></td>
<td>John Doe</td>
<td>
<div class="progress">
<div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
</div>
</td>
</tr>
<tr>
<td>2</td>
<td>Task B</td>
<td><span class="label bg-blue">To Do</span></td>
<td>John Doe</td>
<td>
<div class="progress">
<div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
</div>
</td>
</tr>
<tr>
<td>3</td>
<td>Task C</td>
<td><span class="label bg-light-blue">On Hold</span></td>
<td>John Doe</td>
<td>
<div class="progress">
<div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
</div>
</td>
</tr>
<tr>
<td>4</td>
<td>Task D</td>
<td><span class="label bg-orange">Wait Approvel</span></td>
<td>John Doe</td>
<td>
<div class="progress">
<div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
</div>
</td>
</tr>
<tr>
<td>5</td>
<td>Task E</td>
<td>
<span class="label bg-red">Suspended</span>
</td>
<td>John Doe</td>
<td>
<div class="progress">
<div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
-->
<!-- #END# Task Info -->
<!-- Browser Usage -->
<!--
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<div class="card">
<div class="header">
<h2>BROWSER USAGE</h2>
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
<div id="donut_chart" class="dashboard-donut-chart"></div>
</div>
</div>
</div>
-->
<!-- #END# Browser Usage -->
</div>
@stop
@section('scripts')
  <script>
  $(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
      formatter: function (value, options) {
        return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
      }
    });

  });
</script>
<script src="{{asset('assets/user/plugins/jquery-countto/jquery.countTo.js')}}"></script>
@stop
