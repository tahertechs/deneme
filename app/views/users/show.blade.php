@extends('layouts.default')


@section('styles')

	<style>
		.card-body-social {
		  font-size: 30px;
		  margin-top: 10px;
		}
		.card-body-social .git {
		  color: black;
		  cursor: pointer;
		  margin-left: 10px;
		}
		.card-body-social .twitter {
		  color: #19C4FF;
		  cursor: pointer;
		  margin-left: 10px;
		}
		.card-body-social .google-plus {
		  color: #DD4B39;
		  cursor: pointer;
		  margin-left: 10px;
		}
		.card-body-social .facebook {
		  color: #49649F;
		  cursor: pointer;
		  margin-left: 10px;
		}
		.card-body-social .linkedin {
		  color: #007BB6;
		  cursor: pointer;
		  margin-left: 10px;
		}

		.music-card {
		  background-color: green;
		}
	</style>
@stop

@section('content')


	<div class="container">
	  <div class="row">
	    <div class="col-md-9 col-xs-12">
	          <div class="row">
	            <div class="col-xs-12 col-sm-4 text-center">
			    	@if(!empty($user->photo))
						<img width='200' height='200' src="{{$user->photo}}" alt="{{$user->name}}" class="center-block img-circle img-thumbnail img-responsive">
			    	@else
						<img width='200' height='200' src="http://api.randomuser.me/portraits/women/21.jpg" alt="" class="center-block img-circle img-thumbnail img-responsive">
			    	@endif
	              
		            <ul class="list-inline ratings text-center" title="Ratings">
		                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
		                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
		                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
		                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
		                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
		            </ul>
	            </div>
	            <!--/col--> 
	            <div class="col-xs-12 col-sm-8">
	              <h2>{{$user->username}}</h2>
	              <p><strong>Joined: </strong> {{$user->created_at->diffForHumans()}} </p>
	              <p><strong>Bio: </strong> {{$user->bio}} </p>
	              <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
	              <p><strong>Skills: </strong>
	                <span class="label label-info tags">html5</span> 
	                <span class="label label-info tags">css3</span>
	                <span class="label label-info tags">jquery</span>
	                <span class="label label-info tags">bootstrap3</span>
	              </p>
				  <div class="media-body update-card-body">
				    <div class="btn-toolbar card-body-social" role="toolbar">
				    	<a href="{{$user->instagram}}">
				    		<div class="btn-group fa fa-github-alt git"></div>
				    	</a>

				    	<a href="{{$user->linkedin}}">
				    		<div class="btn-group linkedin fa fa-linkedin-square"></div>
				    	</a>

				    	<a href="{{$user->twitter}}">
				    		<div class="btn-group twitter fa fa-twitter"></div>
				    	</a>

				    	<a href="{{$user->facebook}}">
				    		<div class="btn-group facebook fa fa-facebook"></div>
				    	</a>

				    	<a href="{{$user->google}}">
				    		<div class="btn-group google-plus fa fa-google-plus"></div>
				    	</a>
				      	      
				    </div>
				  </div>

	            </div>
	            <!--/col-->          
	            <div class="clearfix"></div>
	            <div class="col-xs-12 col-sm-4">
	              <h2><strong> 20,7K </strong></h2>
	              <p><small>Followers</small></p>
	              <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>
	            </div>
	            <!--/col-->
	            <div class="col-xs-12 col-sm-4">
	              <h2><strong>245</strong></h2>
	              <p><small>Following</small></p>
	              <button class="btn btn-info btn-block"><span class="fa fa-user"></span> Contact {{$user->username}} </button>
	            </div>
	            <!--/col-->
	            <div class="col-xs-12 col-sm-4">
	              <h2><strong>43</strong></h2>
	              <p><small>Ekledigi Not / Sinav</small></p>
	              <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> {{$user->username}} dan not iste </button>  
	            </div>
	            <!--/col-->
	          </div>
	          <!--/row-->
	    </div>
	    <!--/col--> 
	  </div>
	  <!--/row--> 
	</div>
	<!--/container-->
@stop