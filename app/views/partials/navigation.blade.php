    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::route('home')}}">ENPM</a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

            <li><a href="{{URL::to('/')}}">Nasil Calisir</a></li>
            <li><a href="#">Hakkında</a></li>
            <li><a href="{{URL::route('users.index')}}">Üyeler</a></li>
            
            @if(!Auth::check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Oturum Aç &nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Giriş Yap</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Hesap Oluştur</a></li>
                  </ul>
                </li>
            @else

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts &nbsp&nbsp</a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::route('posts.create')}}">New Post</a></li>
                    <li><a href="{{URL::route('posts.index')}}">My Posts</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username}} &nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ action('SettingsController@getIndex') }}">Settings</a></li>
                    <li><a href="{{ action('AuthController@getLogout') }}">Logout</a></li>
                  </ul>
                </li>


            @endif

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>