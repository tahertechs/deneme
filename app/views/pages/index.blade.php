@extends('layouts.welcome')

@section('content')

  <div class="head">ENPM</div>

  <a href="{{URL::route('home')}}"class="btn btn-warning sitebutton">Siteye Gir</a>
  <br/> 
  <div class="col-xs-12 col-md-6" >

	@include('flash::message')

	@include('partials.errors')

    <div class="row">
      <div class="col-xs-9" style="padding-right:0px;">
        <div class="well login-box pull-left" style="padding-bottom:29px;">
	        {{Form::open(['action'=>'AuthController@postLogin','role'=>'form','class'=>'form-horizonatal'])}}
	            <div><a href="#">Parolamı Unuttum?</a></div>

	            <div class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	              {{Form::text('username_or_email', null, ['class'=>'form-control','id'=>'login-username', 'placeholder'=>'Kullanıcı Adı veya E-Posta','autocomplete'=>'off'])}}
	            </div>
	           
	            <div class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	              {{Form::password('password',['class'=>'form-control','id'=>'login-password', 'placeholder'=>'Parola'])}}
	            </div>
	           
	            <div class="form-group">
	              <label ><input id="login-remember" type="checkbox" name="remember" value="1"> Remember me</label>      
	              <button type="submit" class="btn btn-success btn-login-submit pull-right hidden-xs"style="width:150px">Giriş</button>
	              <button type="submit" class="btn btn-success btn-login-submit pull-right hidden-sm hidden-md hidden-lg">Giriş</button>
	            </div>
			{{Form::close()}}   

        </div> <!-- end login-box -->
        <div id="OR">VEYA</div>
      </div>
      <div class="col-xs-3" style="padding-left:0">  
        <div class="well pull-left text-center">
          <div>
            <a href="{{URL::route('facebook')}}" class="btn btn-social-icon btn-facebook">
              <i class="fa fa-facebook"></i>
            </a>
          </div>
          <div>
            <a href="{{URL::route('twitter')}}" class="btn btn-social-icon btn-twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </div>
          <div>
            <a href="{{URL::route('google')}}" class="btn btn-social-icon btn-google-plus">
              <i class="fa fa-google-plus"></i>
            </a>
          </div>
          <div>
            <a href="{{URL::route('linkedin')}}" class="btn btn-social-icon btn-linkedin">
              <i class="fa fa-linkedin"></i>
            </a>
          </div>
        </div> <!-- end socialbuttons -->
      </div>  <!-- end col-xs-3 -->
    </div>  <!-- end row -->
    <div class="row">
      <div class="col-xs-12 animated" id="register">
        <div class="well pull-left">
	        {{Form::open(['action'=>'AuthController@postRegister','role'=>'form','class'=>'form-horizonatal'])}}
	            <p>Sitemizden daha çok faydalanabilmek için hemen <b>Kayıt Ol</b></p>

	            <div class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	              {{Form::text('username', null, ['class'=>'form-control','id'=>'login-username', 'placeholder'=>'Kullanıcı Adı','autocomplete'=>'off'])}}
	            </div>
	            <div class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	              {{Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'E-Posta'])}}
	            </div>
	           
	            <div class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	              {{Form::password('password',['class'=>'form-control', 'placeholder'=>'Parola'])}}
	            </div>
	            <div class="input-group">
	              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	              {{Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Parola Onayla'])}}
	            </div>
	           
	            <div class="form-group text-center">
	            	{{Form::submit('Kayıt Ol',['class'=>'btn btn-primary' , 'style'=>'width:150px'])}}
	            </div>
	        {{Form::close()}}
        </div> <!-- end well -->

      </div> <!-- end col-xs-12 --> 
    </div> <!-- end row -->
  </div><!--  /col-xs-6 -->

  <div class="col-xs-12 col-md-6">
    <div class="row">
        <div class="timeline-centered">
        
          <article>
            <div class="animated flipInY">
              <div>
              </div>
              <div>
                <h2><a href="#">ENPM:</a> <span>Erciyes Not Paylaşım Merkezi</span></h2>
                <p>Amacımız, öğrenciler arası not paylaşımını <strong>kolaylaştırmak ve hızlandırmaktır.</strong></p>
              </div>
            </div>
          </article>
      
          <article class="left-aligned">
            <div class="animated flipInY">
              <div>
              </div>
              <div>
                <h2><a href="#" id="hesapolustur">Sizde Hemen Bir Hesap Oluşturun </a><span>ve</span></h2>
                <p>Not paylaşımına bir <strong>katkıda bulunun.</strong></p>
              </div>
            </div>
          </article>
      
          <article>
            <div class="animated flipInY">
              <div>
              </div>
              <div>
                <h2><a href="#">Ya da Sitemizden</a></h2>
                <p>İhtiyacınız olan not varsa hemen <strong>indirin.</strong></p>
              </div>   
            </div>
          </article>
      
          <article>
            <div class="animated flipInY">
              <div>
              </div>
            </div>                  
          </article>
      
        </div> <!-- end timeline -->
      </div> <!-- end row -->

         
  </div> <!-- end col-xs-6 -->

@stop