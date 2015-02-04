@extends('layouts.dashboard')

@section('content')
	<hr>

	@foreach($posts as $post)
        <div class="well not-info">
          <div class="row">
            <div class="col-xs-12 col-md-4 ">
              <a href="{{URL::route('posts.show',$post->slug)}}">
                <div><h4><b>{{$post->title}} 
                	<a href="{{URL::route('posts.edit' , $post->id)}}">
                		 - <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                	</a></b></h4>
                </div>
                <div style="margin-bottom:10px"><b>{{Str::limit($post->description, $limit = 70)}}</b></div>
              </a>
            </div> 
            <div class="col-xs-9 col-md-6 text-center">
              <div class="col-xs-3"><b>{{$post->uploads->count()}}<br/>Dosya</b></div>
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><br/>
                <span class="files-count">{{$post->viewcount}} </span>
              </div>
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span><br/>
                <span class="files-count">{{$post->dcount}} </span>
              </div>
              <div class="col-xs-3">
                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span><br/>
                <span class="files-count">123</span>
              </div>
            </div> <!-- end col-xs-6 -->
            <div class="col-xs-3 col-md-2 text-center">
              <span class="glyphicon glyphicon-calendar"></span><br/>
              <span class="files-count">{{$post->created_at->diffForHumans()}}</span>
            </div>
          </div> <!-- end row , not-info -->
        </div> <!-- end well --> 

	@endforeach

	<div class="text-center">
  	  {{$posts->links()}} 		
	</div>

@stop