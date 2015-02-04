<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ENPM - Erciyes Not Paylasim Merkezi</title>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-social.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}"/>

    @yield('styles')

  </head>


  <body>

    @include('partials/navigation')

    @include('partials/auth-modal')
   
    @include('partials/searchbar')
    

    <div class="container">
        
        @include('flash::message')

        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                @include('partials/sidebar')
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-9">
                @yield('content')
            </div>                      
        </div>

        @include('partials/partners')

    </div>   

    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    @yield('scripts')


    <!-- Disqus Commenting System -->
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'enpm'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>


  </body>
</html>