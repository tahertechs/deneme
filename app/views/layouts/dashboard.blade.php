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
    <link rel="stylesheet" href="{{URL::asset('plugins/summernote/css/summernote.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}"/>


    @yield('styles')

  </head>


  <body>

    @include('partials/navigation')
   
    @include('partials/searchbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('partials.errors')

                @include('flash::message')

                @yield('content')  

            </div>
        </div>
    </div>

 

    <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('plugins/summernote/js/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function() {
          $('#summernote').summernote({height: 200});
        });
    </script>

    @yield('scripts')

  </body>
</html>