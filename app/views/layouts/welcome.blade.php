<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ENPM</title>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-social.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}"/>
  </head>

  <body class="giris">
  
    <div class="container">

        @yield('content')

    </div>

    <footer class="footer-index">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <p>2014 © <a target="_blank" href="http://www.tanturkyazilim.com">Tantürk Yazılım.</a> Tüm hakları saklıdır.</p>
          </div>
        </div>
      </div>
    </footer>



    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript">
      $("#hesapolustur").click(function(){
        $("#register").addClass("rubberBand");
        
        setTimeout(function() {
          $("#register").removeClass("rubberBand"); 
        }, 700);
      });  
        
    </script>
  </body>
</html>