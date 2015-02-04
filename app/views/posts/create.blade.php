@extends('layouts.dashboard')
 
@section('styles')
    {{ HTML::style('plugins/fileinput/css/fileinput.min.css')}}

    <style>
 		#editor {overflow:scroll; max-height:300px}
    </style>
@stop

@section('content')

	<div class="form-group">
		<div class="text-center">
			<br><mark>En fazla 10 dosya yukleyebilirsin...</mark><br>
		</div>
	</div>	

	{{Form::open(['route'=>'posts.store','role'=>'form','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}

			        	
		<div class="form-group">
			{{Form::text('title',null,['id'=>'title' , 'class'=>'form-control', 'placeholder'=>'Enter post title'])}}
		</div>	

		<div class="form-group">
			{{Form::textarea('description',null,['id'=>'description' , 'class'=>'form-control','cols'=>'30','rows'=>'5' ,'placeholder'=>'Add some description'])}}
		</div>	
		<br>

        <div class="form-group">                  
            <input id="files" name="files[]" type="file" multiple>
        </div>


		<div class="form-group">
			<button type="submit" class="btn btn-success btn-lg">Upload Normally-No AJAX</button>
		</div>


	{{Form::close()}}

@stop

@section('scripts')

    {{ HTML::script('plugins/fileinput/js/fileinput.min.js')}}

    <script>
	$(document).on("ready", function() {

	    $("#files").fileinput({
	        uploadAsync: false,
	        uploadUrl: "{{URL::route('posts.store')}}", 
	        maxFileCount: 10,
	        previewFileType:"any",
	        overwriteInitial: false,
	        //allowedFileExtensions : ['jpg', 'png','gif','zip','rar','pdf','docx','txt'],
	        allowedFileTypes: ['image', 'video', 'flash','object'],
	        maxFileSize: 7000,
	        maxFilesNum: 2,


	        uploadExtraData: function() {
	            return {
	                title: $("#title").val(),
	                description: $("#description").val()
	            };
	        }
	    });
	});

    </script>
@stop

