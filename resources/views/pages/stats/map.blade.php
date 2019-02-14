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

</head>
<body>

    <!-- Navigation -->


      <!-- Page Content -->



          <!-- /.container-fluid -->

          <!--Aqui va el contenido jibiri jibiri-->

<div id="widgetIframe"><iframe style="position: absolute;" width="100%" height="100%" src="https://matomo.locksek.com/piwik/index.php?module=Widgetize&action=iframe&widget=1&moduleToWidgetize=UserCountryMap&actionToWidgetize=realtimeMap&idSite=1&period=day&date=yesterday&disableLink=1&widget=1&token_auth=b3a9c5115a548614c5414cb6c7e07f7e" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>

<script>
window.onload = function() {
   window.focus();
};

document.body.addEventListener("keydown", function (event) {
if (event.keyCode === 32) {
  window.location.replace("{{route('liveStats')}}");
}
});
</script>


    </body>



    </html>
