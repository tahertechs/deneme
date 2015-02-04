    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="login-register">


          <ul class="nav nav-tabs">
            <li class=" col-xs-6 active"><a href="#tab1" data-toggle="tab">Login</a></li>
            <li class="col-xs-6"><a href="#tab2" data-toggle="tab">Create Account</a></li>
          </ul>
        
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="tab1">
              <div class="row">
                <div class="col-xs-9" style="padding-right:0px;">
                  <div class="well login-box pull-left">
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
                            <div class="row">
                                <div class="col-xs-6 col-sm-4">
                                    <label ><input id="login-remember" type="checkbox" name="remember" value="1"> Beni Hatırla</label> 
                                </div>
                                <div class="col-xs-3 col-sm-4">
                                    <button type="submit" class="btn btn-success btn-login-submit">Giriş</button> 
                                </div>
                                <div class="col-xs-3 col-sm-4">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Çıkış</button>
                                </div>
                            </div>
                        </div>
                    {{Form::close()}}  
                  </div> <!-- end login-box -->

                  <div id="OR">VEYA</div>

                </div>

                <div class="col-xs-3" style="padding-left:0">  
                  <div class="well pull-left text-center">
                    <div>
                      <a class="btn btn-social-icon btn-facebook">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </div>
                    <div>
                      <a class="btn btn-social-icon btn-twitter">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </div>
                    <div>
                      <a class="btn btn-social-icon btn-google-plus">
                        <i class="fa fa-google-plus"></i>
                      </a>
                    </div>
                    <div>
                      <a class="btn btn-social-icon btn-linkedin">
                        <i class="fa fa-linkedin"></i>
                      </a>
                    </div>
                  </div> <!-- end socialbuttons -->
                </div>  <!-- end col-xs-3 -->

              </div>  <!-- end row -->   

            </div>
            <div class="tab-pane fade" id="tab2">
              <div class="row">
                <div class="col-xs-12 animated" id="register">
                  <div class="well pull-left">
                    {{Form::open(['action'=>'AuthController@postRegister','role'=>'form','class'=>'form-horizonatal'])}}
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
                        <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Çıkış</button>
                      </div>
                    {{Form::close()}}
                  </div> <!-- end well -->
                </div> <!-- end col-xs-12 --> 
              </div> <!-- end row -->
            </div>
          </div>
                
        </div><!-- /.login-register -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->