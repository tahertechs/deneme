@extends('layouts.dashboard')

@section('content')

	<hr>
	<div class="container">
		<div class="row">
		    <div class="col-md-4 col-sm-6 col-xs-12">
			    <div class="text-center">
			    	@if(!empty($user->photo))
			    		<img src="{{$user->photo}}" class="avatar img-circle img-thumbnail" alt="{{$user->name}}">
						
			    	@else
			    	 	<img src="{{asset('assets/img/thumb.png')}}" class="avatar img-circle img-thumbnail" alt="avatar">
			    	@endif

			        <h6>Upload a different photo...</h6>
			        <input type="file" class="text-center center-block well well-sm">
			    </div>
			</div>


			<div class="col-md-8 col-sm-6 col-xs-12 personal-info">				
				<hr class="bosluk">	
		        <h3>Personal info</h3>
				<div class="col-md-12" style="border-left:2px solid #e3e3e3">

				    {{Form::open(['action'=>'SettingsController@postInfo','role' =>'form' , 'class'=>'form-horizontal'])}}	

						@if(Session::has('success-info'))
					    	<div class="form-group">
					    		<div class="col-sm-offset-2 col-md-10">
			                    	<div class="alert alert-success alert-dismissable"> 
			                    		<a class="panel-close close" data-dismiss="alert">×</a> 
						        		<i class="fa fa-coffee"></i>
			                    		{{ Session::get('success-info') }} 
			                    	</div>						    			
					    		</div>		    		
					    	</div>
		            	@endif


		                <div class="form-group">
		                    <label for="email" class="col-sm-2 control-label">Name</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="name" class="form-control" value="{{$user->name}}" />                                           
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="username" class="col-sm-2 control-label">Username</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="username" class="form-control" disabled="disable" value="{{$user->username}}" />                                           
		                    </div>
		                </div>

				        <div class="form-group">
				            <label for="email" class="col-sm-2 control-label">Email</label>
				            <div class="col-sm-10">
				                <input type="email" class="form-control" name="email"  disabled="disable" value="{{$user->email}}" />
				            </div>
				        </div>

		                <div class="form-group">
		                    <label for="bio" class="col-sm-2 control-label">Biography</label>
		                    <div class="col-sm-10">
		                    	<textarea class="form-control" name="bio"  cols="30" rows="4">{{$user->bio}}</textarea>                                         
		                    </div>
		                </div>

				        <div class="form-group">
				            <div class="col-sm-offset-2 col-sm-10">
				                <button type="submit" class="btn btn-md btn-primary">Update Info</button>
				            </div>			        	
				        </div>
				    {{Form::close()}}	

				</div> <!-- end col-md-12 personal info -->

				<hr class="bosluk">	
				<h3>Social Networks Informations</h3>
				<div class="col-md-12" style="border-left:2px solid #e3e3e3">
					{{Form::open(['action'=>'SettingsController@postSocial','role' =>'form' , 'class'=>'form-horizontal'])}}	

						@if(Session::has('success-social'))
					    	<div class="form-group">
					    		<div class="col-sm-offset-2 col-md-10">
			                    	<div class="alert alert-success alert-dismissable"> 
			                    		<a class="panel-close close" data-dismiss="alert">×</a> 
						        		<i class="fa fa-coffee"></i>
			                    		{{ Session::get('success-social') }} 
			                    	</div>						    			
					    		</div>		    		
					    	</div>
		            	@endif

		                <div class="form-group">
		                    <label for="facebook" class="col-sm-2 control-label">Facebook</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="facebook" class="form-control" value="{{$user->facebook}}" />                                           
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="twitter" class="col-sm-2 control-label">Twitter</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="twitter" class="form-control" value="{{$user->twitter}}" />                                           
		                    </div>
		                </div>


		                <div class="form-group">
		                    <label for="google" class="col-sm-2 control-label">Google</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="google" class="form-control" value="{{$user->google}}" />                                           
		                    </div>
		                </div>


		                <div class="form-group">
		                    <label for="instagram" class="col-sm-2 control-label">Instagram</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="instagram" class="form-control" value="{{$user->instagram}}" />                                           
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="linkedin" class="col-sm-2 control-label">Linkedin</label>
		                    <div class="col-sm-10">
		                        <input type="text" name="linkedin" class="form-control" value="{{$user->linkedin}}" />                                           
		                    </div>
		                </div>

				        <div class="form-group">
				            <label for="password" class="col-sm-2 control-label"></label>
				            <div class="col-sm-10">
				                <button type="submit" class="btn btn-md btn-primary">Update Links</button>
				            </div>			        	
				        </div>
					{{Form::close()}}
				</div> <!-- end col-md-12 social network-->


				<hr class="bosluk">	
				<h3>Change password</h3>
				<div class="col-md-12" style="border-left:2px solid #e3e3e3">
					{{Form::open(['action'=>'SettingsController@postPassword','role' =>'form' , 'class'=>'form-horizontal'])}}	

						@if(Session::has('success-pass'))
					    	<div class="form-group">
					    		<div class="col-sm-offset-2 col-md-10">
			                    	<div class="alert alert-success alert-dismissable"> 
			                    		<a class="panel-close close" data-dismiss="alert">×</a> 
						        		<i class="fa fa-coffee"></i>
			                    		{{ Session::get('success-pass') }} 
			                    	</div>						    			
					    		</div>		    		
					    	</div>
		            	@endif

				        <div class="form-group">
				            <label for="password-new" class="col-sm-2 control-label">New Password</label>
				            <div class="col-sm-10">
				                <input type="password" class="form-control" name="password" placeholder="New password" />
				            </div>
				        </div>	

				        <div class="form-group">
				            <label for="password-again" class="col-sm-2 control-label">Password Again </label>
				            <div class="col-sm-10">
				                <input type="password" class="form-control" name="password-again" placeholder="Confirm password" />
				            </div>
				        </div>	

				        <div class="form-group">
				            <label for="password" class="col-sm-2 control-label"></label>
				            <div class="col-sm-10">
				                <button type="submit" class="btn btn-md btn-primary">Change Password</button>
				            </div>			        	
				        </div>
					{{Form::close()}}
				</div><!-- end col-md-12 change password-->
			
			</div> <!-- end col-md-8 -->

		</div>
	</div>
@stop