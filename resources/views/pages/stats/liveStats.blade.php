<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
       <!-- Bootstrap Core CSS -->
       <link rel="icon" href="{{asset('assets/img/favicon.png')}}">
       <script src="{{asset('assets/js/chart.js')}}"></script>
       <link href="{{asset('assets/dashboard-resources/css/bootstrap.min.css')}}" rel="stylesheet">
       <script src="{{asset('assets/dashboard-resources/js/jquery.min.js')}}"></script>


  <title>LiveStats</title>
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
  <div id="wrapper">

    <!-- Navigation -->


      <!-- Page Content -->
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                <a class="btn btn-primary" href="{{route('admin.index')}}" role="button">Dashboard</a>

              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->

          <!--Aqui va el contenido jibiri jibiri-->
<div class="col-lg-6">
<div id="widgetIframe"><iframe width="100%" height="350" src="http://matomo.locksek.com/piwik/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=Live&actionToWidgetize=getSimpleLastVisitCount&idSite=1&period=day&date=yesterday&disableLink=1&widget=1&token_auth=b3a9c5115a548614c5414cb6c7e07f7e
" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
</div>
<div class="col-lg-6">
<div id="widgetIframe"><iframe width="100%" height="350" src="http://matomo.locksek.com/piwik/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=UserCountryMap&actionToWidgetize=realtimeMap&idSite=1&period=day&date=yesterday&disableLink=1&widget=1&token_auth=b3a9c5115a548614c5414cb6c7e07f7e" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
</div>
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
        </div>
        <!-- /#page-wrapper -->

      </div>
      <!-- /#wrapper -->


  <script src=" {{asset('assets/js/chart.js')}} "></script>

    </body>



    </html>
