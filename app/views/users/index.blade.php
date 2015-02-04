@extends('layouts.dashboard')

@section('styles')
	<style>
	    /*@import url(//fonts.googleapis.com/css?family=Lato:400,900);
	    @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);*/
	    body {
			padding: 60px 0px;
		}
		.animate {
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}
		.info-card {
			width: 100%;
			border: 1px solid rgb(215, 215, 215);
			position: relative;
			font-family: 'Lato', sans-serif;
			margin-bottom: 20px;
			overflow: hidden;
		}
		.info-card > img {
			width: 100px;
			margin-bottom: 60px;
		}
		.info-card .info-card-details,
		.info-card .info-card-details .info-card-header  {
			width: 100%;
			height: 100%;
			position: absolute;
			bottom: -100%;
			left: 0;
			padding: 0 15px;
			background: rgb(255, 255, 255);
			text-align: center;
		}
		.info-card .info-card-details::-webkit-scrollbar {
			width: 8px;
		}
		.info-card .info-card-details::-webkit-scrollbar-button {
			width: 8px;
			height: 0px;
		}
		.info-card .info-card-details::-webkit-scrollbar-track {
			background: transparent;
		}
		.info-card .info-card-details::-webkit-scrollbar-thumb {
			background: rgb(160, 160, 160);
		}
		.info-card .info-card-details::-webkit-scrollbar-thumb:hover {
			background: rgb(130, 130, 130);
		}           

		.info-card .info-card-details .info-card-header {
			height: auto;		
			bottom: 100%;
			padding: 10px 5px;
		}
		.info-card:hover .info-card-details {
			bottom: 0px;
			overflow: auto;
			padding-bottom: 25px;
		}
		.info-card:hover .info-card-details .info-card-header {
			position: relative;
			bottom: 0px;
			padding-top: 45px;
			padding-bottom: 25px;
		}
		.info-card .info-card-details .info-card-header h1,	
		.info-card .info-card-details .info-card-header h3 {
			color: rgb(62, 62, 62);
			font-size: 22px;
			font-weight: 900;
			text-transform: uppercase;
			margin: 0 !important;
			padding: 0 !important;
		}
		.info-card .info-card-details .info-card-header h3 {
			color: rgb(142, 182, 52);
			font-size: 15px;
			font-weight: 400;
			margin-top: 5px;
		}
		.info-card .info-card-details .info-card-detail .social {
			list-style: none;
			padding: 0px;
			margin-top: 25px;
			text-align: center;
		}
		.info-card .info-card-details .info-card-detail .social a {
			position: relative;
			display: inline-block;
			min-width: 40px;
			padding: 10px 0px;
			margin: 0px 5px;
			overflow: hidden;
			text-align: center;
			background-color: rgb(215, 215, 215);
			border-radius: 40px;
		}

		a.social-icon {
			text-decoration: none !important;
			box-shadow: 0px 0px 1px rgb(51, 51, 51);
			box-shadow: 0px 0px 1px rgba(51, 51, 51, 0.7);
		}
		a.social-icon:hover {
			color: rgb(255, 255, 255) !important;
		}
		a.facebook {
			color: rgb(59, 90, 154) !important;
		}
		a.facebook:hover {		
			background-color: rgb(59, 90, 154) !important;
		}
		a.twitter {
			color: rgb(45, 168, 225) !important;
		}
		a.twitter:hover {
			background-color: rgb(45, 168, 225) !important;
		}
		a.github {
			color: rgb(51, 51, 51) !important;
		}
		a.github:hover {
			background-color: rgb(51, 51, 51) !important;
		}
		a.google-plus {
			color: rgb(244, 94, 75) !important;
		}
		a.google-plus:hover {
			background-color: rgb(244, 94, 75) !important;
		}
		a.linkedin {
			color: rgb(1, 116, 179) !important;
		}
		a.linkedin:hover {
			background-color: rgb(1, 116, 179) !important;
		}
	</style>
@stop

@section('content')

	<hr>

	@foreach($users as $user)
		<div class="col-sm-4">
			<div class="[ info-card ]">

		    	@if(!empty($user->photo))
		    		<img src="{{$user->photo}}" style="width: 100%" height="290" alt="{{$user->name}}">
					
		    	@else
		    	 	<img style="width: 100%" height="290" src="{{URL::asset('assets/img/thumb.png')}}" />
		    	@endif
			
				<div class="[ info-card-details ] animate">
					<div class="[ info-card-header ]">
						<h1> {{$user->name}} </h1>
						<h3> aka- <a href="{{URL::route('users.show',$user->username)}}">{{$user->username}}</a> </h3>
					</div>
					<div class="[ info-card-detail ]">
						<!-- Description -->
						<p>The idea of creating something out of nothing has always generated a passion in my heart. This is what lead me to website development. I can literally create little worlds that hopefully thousands of people can see and even experience.</p>
						<div class="social">
							<a href="{{$user->facebook}}" class="[ social-icon facebook ] animate"><span class="fa fa-facebook"></span></a>

							<a href="{{$user->twitter}}" class="[ social-icon twitter ] animate"><span class="fa fa-twitter"></span></a>

							<a href="{{$user->instagram}}" class="[ social-icon github ] animate"><span class="fa fa-github-alt"></span></a>

							<a href="{{$user->google}}" class="[ social-icon google-plus ] animate"><span class="fa fa-google-plus"></span></a>

							<a href="{{$user->linkedin}}" class="[ social-icon linkedin ] animate"><span class="fa fa-linkedin"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach

@stop