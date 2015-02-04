@extends('layouts.dashboard')

@section('styles')
    {{ HTML::style('plugins/fileinput/css/fileinput.min.css')}}
@stop

@section('content')

	<div class="form-group">
		<div class="text-center">
			<br><mark>You can only preview Images for now, Will change this later...</mark><br>
		</div>				
	</div>

	{{ Form::open(array('route' => array('posts.update', $post->id),'method'=>'PATCH' ,'role'=>'form','class'=>'form-horizontal' ))}}

		<div class="form-group">
			{{Form::text('title',$post->title,['class'=>'form-control', 'placeholder'=>'Enter post title'])}}
			{{Form::hidden('id', $post->id)}}
		</div>

		<div class="form-group">
			{{Form::textarea('description',$post->description,['id'=>'summernote-disable' , 'class'=>'form-control','cols'=>'30','rows'=>'5' ,'placeholder'=>'Add some description'])}}
		</div>	
		<br>




        <div class="form-group">
            <input id="files" name="files[]" type="file" multiple readonly="true">
        </div>		

		<div class="form-group">
			<button type="submit" class="btn btn-success btn-lg">Update Post</button>
		</div>
	{{Form::close()}}
	

	<div class="well" style="margin:0px -15px;">
		<p>Access FIles Manually</p>
		@foreach($post->uploads as $upload)
			<a target="_blank" href="{{URL::to($upload->url)}}">{{ $upload->url }}</a> <br>
		@endforeach
	</div>		

@stop

@section('scripts')

    {{ HTML::script('plugins/fileinput/js/fileinput.min.js')}}

    <script>
	    $("#files").fileinput({

		    initialPreview: [

				@foreach($post->uploads as $upload)
				'<img src="{{URL::to($upload->url)}} " class="file-preview-image">',			
				@endforeach

		    ],
		    // initialPreviewConfig: [
		    //     {caption: "Desert.jpg", width: "120px", url:"/site/file-delete", key:1},
		    //     {caption: "Tulips.jpg", width: "120px", url:"/site/file-delete", key:2}
		    // ],

	        uploadAsync: false,
	        overwriteInitial: false,
	        uploadUrl: "{{URL::route('posts.update')}}", 
	        maxFileCount: 10,
	        previewFileType:"any",
	        overwriteInitial: false,
	        //allowedFileExtensions : ['jpg', 'png','gif','zip','rar','pdf','docx','txt'],
	        allowedFileTypes: ['image', 'video', 'flash','object'],
	        maxFileSize: 7000,
	        maxFilesNum: 2,


	        uploadExtraData: function() {
	            return {
	                title: $("#title").val()
	            };
	        }
	    });

    </script>
@stop

