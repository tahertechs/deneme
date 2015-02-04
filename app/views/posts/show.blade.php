@extends('layouts.default')

@section('styles')
	{{ HTML::style('plugins/gallery/css/blueimp-gallery.min.css')}}

	<style>
		.portfolio img{
		    border: 0;
		    -webkit-transition: all 1s ease;
		    -moz-transition: all 1s ease;
		    -o-transition: all 1s ease;
		    -ms-transition: all 1s ease;
		    transition: all 1s ease;

		    margin:0px;
		    filter: grayscale(100%);
		    -webkit-filter: grayscale(100%); /* For Webkit browsers */
		    filter: gray; /* For IE 6 - 9 */
		    -webkit-transition: all .6s ease; /* Fade to color for Chrome and Safari */
		    //filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
		}

		.portfolio img:hover {
		    -webkit-transform: rotate(360deg);
		    -moz-transform: rotate(360deg);
		    -o-transform: rotate(360deg);
		    -ms-transform: rotate(360deg);
		    transform: rotate(360deg);

		    filter: grayscale(0%);
		    -webkit-filter: grayscale(0%);
		    //filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
		}
	</style>
@stop


@section('content')
	
	<div class="text-center">
		<br><mark>Click picture to preview</mark><br>
	</div>
	<hr>

	<div class="container">
		<div id="blueimp-gallery" class="blueimp-gallery">
		    <div class="slides"></div>
		    <h3 class="title"></h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="close">×</a>
		    <a class="play-pause"></a>
		    <ol class="indicator"></ol>
		</div>
	</div>

	<div class="portfolio">		
		<div id="links" style="border:2px solid #5bc0de;">
			@foreach($post->uploads as $upload)
				<a href="{{URL::to($upload->url)}}" title="{{ $upload->url }}">
				    <img width="100" height="100" src="{{URL::to($upload->url)}}" alt="{{ $upload->url }}">
				</a>						
			@endforeach			
		</div>			
	</div>
		

	<div class="not-single">		
      <div class="well" >
        <div class="row">
          <div class="col-sm-4 col-md-3 text-center">
            <a href="">
              <img src="https://matdersd1.files.wordpress.com/2011/12/b41.jpg" class="img-responsive">
            </a>
          </div>
          <div class="col-sm-8 col-md-9">
            <br/> 

            <div class="row"><div class="col-xs-4"><b>Goren sayisi:</b></div>
              <div class="col-xs-8"><p>{{$post->viewcount}}</p></div>  
            </div>

            <div class="row"><div class="col-xs-4"><b>Title:</b></div>
              <div class="col-xs-8"><p>{{$post->title}}</p></div>  
            </div>

            <div class="row">
              <div class="col-xs-4"><b>Açıklama:</b></div>
              <div class="col-xs-8">
                <p>14 Aralık Ders Notu Bilal Hocanın Çözdüğü Örnekler de var</p>
              </div>  
            </div>
            <div class="row">
              <div class="col-xs-4"><b>Ders Adı:</b></div>
              <div class="col-xs-8"><p>Mikroişlemciler</p></div>  
            </div>
            <div class="row">
              <div class="col-xs-4"><b>Bölüm:</b></div>
              <div class="col-xs-8"><p>Bilgisayar Mühendisliği</p></div>  
            </div>
            <div class="row">
              <div class="col-xs-4"><b>Ekleyen:</b></div>
              <div class="col-xs-8">
                <p><a href="{{URL::route('users.show',$post->author->username)}}">{{$post->author->username}}</a></p>
              </div>  
            </div>
            <div class="row">
              <div class="col-xs-4"><b>Ekleme Tarihi:</b></div>
              <div class="col-xs-8">
                <p>{{$post->created_at->format('d-m-Y')}} - Saat {{$post->created_at->format('H:m')}} ({{$post->created_at->diffForHumans()}})</p>
              </div>  
            </div>
            <div class="row">
              <div class="col-xs-4"><b>Boyut:</b></div>
              <div class="col-xs-8"><p>{{ $totalUploadSize }}</p></div>  
            </div>
            <br/>
            <div class="row">
              <div class="col-xs-3 text-center">
                <p><span class="glyphicon glyphicon-file"></span> {{$post->uploads->count()}} Dosya</p>
                <button disabled class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> Gör</button>
              </div>
              <div class=" col-xs-4 col-sm-3 text-center">
                <p><span class="glyphicon glyphicon-transfer"></span> {{$post->dcount}} İndirme</p>
                {{Form::open(['url'=>'download'])}}
                    {{ Form::hidden('slug', $post->slug) }}
                    <button class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Indir</button>
                {{Form::close()}}
              </div>
              <div class="col-xs-4 col-lg-3 text-center">
                <p><span class="glyphicon glyphicon-thumbs-up"></span> 25 Beğenme</p>
                <button class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> &nbsp Beğen</button>
              </div>
              <div class="hidden-md hidden-lg" style="height:115px;"></div>
            </div> <!-- end row -->
          </div> <!-- end col-xs-8 -->
        </div> <!-- end row -->
        <div class="ribbon-wrapper-green">
          <a href="{{URL::route('home')}}"><div class="ribbon-green">ENPM</div></a>
        </div>
    
      </div> <!-- end well -->

	</div>
	
	<div class="well">

		<p>DESCRITIONS</p>

		{{$post->description}}		

	</div>

	<div class="well">
		<p>Access FIles Manually</p>
		@foreach($post->uploads as $upload)
			<a target="_blank" href="{{URL::to($upload->url)}}">{{ $upload->url }}</a> <br>
		@endforeach
	</div>

	<!-- Disqus Commenting starts here -->	
	<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'enpm'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
@stop

@section('scripts')
    {{ HTML::script('plugins/gallery/js/blueimp-gallery.min.js')}}
	<script>
	document.getElementById('links').onclick = function (event) {
	    event = event || window.event;
	    var target = event.target || event.srcElement,
	        link = target.src ? target.parentNode : target,
	        options = {index: link, event: event},
	        links = this.getElementsByTagName('a');
	    blueimp.Gallery(links, options);
	};
	</script>

@stop