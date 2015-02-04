@extends('layouts.default')


@section('content')

  <div class="row" style="margin-bottom:10px">
    <form>
      <div class="form-group">
        <div class="col-xs-offset-4 col-xs-1" style="margin-top:6px">
          <b>Sırala:</b>
        </div>
        <div class=" col-xs-4">
          <select class="form-control">
            <option value="default">Varsayılan</option>
            <option value="indirme">En Çok İndirilen</option>
            <option value="gorme">En Çok Görülen</option>
            <option value="begeni">En Çok Beğenilen</option>
            <option value="sadece-not">Sadece Notlar</option>
            <option value="sadece-sinav">Sadece Sınav Soruları</option>
          </select>
        </div>
      </div> <!-- end form-group -->
    </form>
  </div> <!-- end row --> 


  <div class="not-list-scroll">    

  	@foreach($posts as $post)

        <div class="well not-info">
            <div class="row">
                <div class="col-xs-12 col-md-4 ">
                    <a href="{{URL::route('posts.show',$post->slug)}}"> 
                        <div><h4><b>{{$post->title}}</b></h4></div>
                        <div style="margin-bottom:10px"><b>{{Str::limit($post->description, $limit = 60)}}</b></div>
                        <small><a href="{{URL::route('users.show',$post->author->username)}}">By : {{$post->author->username}}</a></small>
                    </a>
                </div> 
                <div class="col-xs-9 col-md-6 text-center">
                    <div class="col-xs-3"><b>{{$post->uploads->count()}}<br/>Dosya</b></div>
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><br/>
                            <span class="files-count">{{$post->viewcount}}</span>
                        </div>
                    <div class="col-xs-3">
                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span><br/>
                        <span class="files-count">{{$post->dcount}}</span>
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

  </div>





@stop