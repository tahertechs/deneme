<?php 

class PostsController extends BaseController{

	public function __construct(){

		$this->beforeFilter('auth', ['except' => ['show']]);
	}


	public function index()
	{
		$posts = Post::where('author_id','=',Auth::user()->id)->paginate(10);

		return View::make('posts.index',compact('posts'));
	}


	public function create()
	{
		return View::make('posts.create');
	}


	public function store()
	{

		if (Request::ajax())
		{
			$title = Input::get('title');
			$description = Input::file('description');
		    $files = Input::file('files');
		    $assetPath = 'uploads';
		    $uploadPath = public_path($assetPath);
		    $results = array();

		    if (is_array($results))
			{
			    foreach ($files as $file) {
		            $randomName = Str::random($length = 10);
			        $file->move($uploadPath, 'ajax_'.$randomName.'.'.$file->getClientOriginalExtension());
			        $name = $assetPath . '/' . 'ajax_'.$randomName.'.'.$file->getClientOriginalExtension();
			        $originalname = $file->getClientOriginalName();
			        $size = round($file->getClientSize() / 1024 ); //We store in KB
			        $type = $file->getClientMimeType();
			        $results[] = compact('name','originalname','size','type');
			    }
			}

			$post = Post::create([
				'title'		  => Input::get('title'),
				'slug'		  => Str::slug(Input::get('title')),
				'description' => Input::get('description')
				]);

		    for($i=0 ; $i<sizeof($results);$i++){

		    	$upload = Upload::create([
		    		'url'			=> $results[$i]['name'],
		    		'originalname'	=> $results[$i]['originalname'],
		    		'size'			=> $results[$i]['size'],
		    		'type'			=> $results[$i]['type'],
		    		]);

		    	$post->uploads()->save($upload);
		    }

			$post->author()->associate(Auth::user())->save();


		    return array(
		    	'title' =>$title,
		    	'description' =>$description,
		        'files' => $results , 
		        'status' =>'uploaded successifully'
		    );

		}

		
		else //If not an ajax request
		{
			$rules = array(
				'title'=> 'required',
				'files'=> 'required'
			);

			$validation = Validator::make(Input::all(), $rules);

			if ($validation->fails()) {
				return Redirect::back()->withErrors($validation)->withInput();
			} else {

			    $files = Input::file('files');

				if (Input::hasFile('files'))
				{
				    $assetPath = 'uploads';
				    $uploadPath = public_path($assetPath);
				    $results = array();

				    if (is_array($results))
					{
					    foreach ($files as $file) {
				            $randomName = Str::random($length = 10);
					        $file->move($uploadPath, $randomName.'.'.$file->getClientOriginalExtension());
					        $name = $assetPath . '/' . $randomName.'.'.$file->getClientOriginalExtension();
					        $originalname = $file->getClientOriginalName();
					        $size = round($file->getClientSize() / 1024 ); //We store in KB
					        $type = $file->getClientMimeType();
					        $results[] = compact('name','originalname','size','type');
					    }
					}

					$post = Post::create([
						'title'		  => Input::get('title'),
						'slug'		  => Str::slug(Input::get('title')),
						'description' => Input::get('description')
						]);

				    for($i=0 ; $i<sizeof($results);$i++){

				    	$upload = Upload::create([
				    		'url'			=> $results[$i]['name'],
				    		'originalname'	=> $results[$i]['originalname'],
				    		'size'			=> $results[$i]['size'],
				    		'type'			=> $results[$i]['type'],
				    		]);

				    	$post->uploads()->save($upload);
				    }		

					$post->author()->associate(Auth::user())->save();

					Flash::success('Post successifully created....You can post some other thing if you want :) ');

					return Redirect::route('posts.create');
				}

				Flash::error('Dosyalar yuklemedin daha , Please select files...');

				return Redirect::back()->withInput();

			}
		}

	}


	public function show($slug)
	{
		$post = Post::where('slug','=', $slug)->first();

		if($post){

			$post->viewcount = ($post->viewcount) + 1 ;
			$post->save();

			//Caculate total file size
			$totalUploadSize = array();

			foreach ($post->uploads as $upload) {
				$totalUploadSize[] = $upload->size;
			}

			if(array_sum($totalUploadSize)<=500){
				$totalUploadSize = round(array_sum($totalUploadSize) , 1).' KB' ;
			}
			else{
				$totalUploadSize = round(array_sum($totalUploadSize) / 1024 , 1).' MB' ;	
			}

			//Go back to post.show page
			return View::make('posts.show',compact('post','count','totalUploadSize'));
		}

		return Redirect::home();
	}


	public function edit($id)
	{
		$post = Post::find($id);

		if($post->postBelongsToUser($id)){
			return View::make('posts.edit',compact('post'));			
		}

		Flash::error('Trying to edit someones else post , BE CAREFULLY BUDDY !');

		return Redirect::route('posts.index');



	}

	public function update($id)
	{

		if (Request::ajax())
		{
			// $title = Input::get('title');
		 //    $files = Input::file('files');
		 //    $assetPath = 'uploads';
		 //    $uploadPath = public_path($assetPath);
		 //    $results = array();

		 //    if (is_array($results))
			// {
			//     foreach ($files as $file) {
		 //            $randomName = Str::random($length = 10);
			//         $file->move($uploadPath, 'ajax_'.$randomName.'.'.$file->getClientOriginalExtension());
			//         $name = $assetPath . '/' . 'ajax_'.$randomName.'.'.$file->getClientOriginalExtension();
			//         $results[] = compact('name');
			//     }
			// }

			// $post = Post::create(['title'=> $title,'slug'=>Str::slug($title)]);

		 //    for($i=0 ; $i<sizeof($results);$i++){

		 //    	$upload = Upload::create(['url'=>$results[$i]['name']]);
		 //    	$post->uploads()->save($upload);
		 //    }

			// $post->author()->associate(Auth::user())->save();


		 //    return array(
		 //    	'title' =>$title,
		 //        'files' => $results , 
		 //        'status' =>'uploaded successifully'
		 //    );

		}

		/*The else block can be deleted completely if we allow people to edit uploaded files
		and will be replaced by the else block below it */

		else
		{

			$user = Auth::user();
			$post = Post::find($id);

			if($post->postBelongsToUser($id)){

				$rules = array(
					'title'=> 'required',
				);

				$validation = Validator::make(Input::all(), $rules);

				if ($validation->fails()) {
					return Redirect::back()->withErrors($validation)->withInput();
				}

				$post->title = Input::get('title');
				$post->slug = Str::slug(Input::get('title'));
				$post->description = Input::get('description');
				$post->save();

				Flash::success('You have successifully update the post');

				return Redirect::route('posts.index');
			}

			Flash::error('Trying to cheat huh..! , BE CAREFULLY BUDDY...');

			return Redirect::route('posts.index');
		}


		// else //If not an ajax request
		// {

			// $user = Auth::user();
			// $post = Post::find($id);

			// if($post->postBelongsToUser($id)){

			// 	$rules = array(
			// 		'title'=> 'required',
			// 		//'files'=> 'required'
			// 	);

			// 	$validation = Validator::make(Input::all(), $rules);

			// 	if ($validation->fails()) {
			// 		return Redirect::back()->withErrors($validation)->withInput();
			// 	} 
			// 	else
			// 	{
			// 		dd(Input::file('files'));

			// 	    $files = Input::file('files');

			// 	    dd('Nothing'.Input::file('files'));

			// 		if (Input::hasFile('files'))
			// 		{
			// 		    $assetPath = 'uploads';
			// 		    $uploadPath = public_path($assetPath);
			// 		    $results = array();

			// 		    if (is_array($results))
			// 			{
			// 			    foreach ($files as $file) {
			// 		            $randomName = Str::random($length = 10);
			// 			        $file->move($uploadPath, $randomName.'.'.$file->getClientOriginalExtension());
			// 			        $name = $assetPath . '/' . $randomName.'.'.$file->getClientOriginalExtension();
			// 			        $results[] = compact('name');
			// 			    }
			// 			}

			// 			$post = Post::create(['title'=>Input::get('title'),'slug'=>Str::slug(Input::get('title'))]);

			// 		    for($i=0 ; $i<sizeof($results);$i++){

			// 		    	$upload = Upload::create(['url'=>$results[$i]['name']]);
			// 		    	$post->uploads()->save($upload);
			// 		    }		

			// 			$post->author()->associate(Auth::user())->save();

			// 			return Redirect::route('posts.create')->with('message','Succesifully created');

			// 			//ikinci yontemi
			// 			//$post = new Post(['title'=>Input::get('title')]);
			// 			//$user = Auth::user();
			// 			//$user->posts()->save($post);
			// 			//return Redirect::route('posts.create')->with('message','Succesifully created');	

			// 		}

			// 		return Redirect::back()->with('failure','Dosyalar yuklemedin daha , Please select files...')->withInput();


			// 		// $post->title = Input::get('title');
			// 		// $post->slug = Str::slug(Input::get('title'));
			// 		// $post->save();

			// 		// return Redirect::route('posts.index')->with('message', 'Succesifully updated!');

			// 	}			
			// }

			// return Redirect::route('posts.index')->with('failure','trying to edit someones else post , BE CAREFULLY BUDDY ! ');

		// }

	}


	public function destroy($id)
	{
		//
	}


	public function download(){

		$post= Post::where('slug' , '=' , Input::get('slug'))->first();

		if($post){

			$files=array();

			$path = app_path().'/../public/';

			foreach ($post->uploads as $upload) {
				$files[] = $path.$upload->url;
			}

			if(count($files) > 0){

			    $zip = new ZipArchive();
			    $zip_name = $post->slug.'.zip';
			    if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){
			        $error .= "* Sorry ZIP creation failed at this time";
			    }
			     
			    foreach($files as $file){
			    	$zip->addFile($file,pathinfo($file,PATHINFO_BASENAME));
			    }
			     
			    $zip->close();

			    if(file_exists($zip_name)){

			        // force to download the zip
			        header("Pragma: public");
			        header("Expires: 0");
			        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			        header("Cache-Control: private",false);
			        header('Content-type: application/zip');
			        header('Content-Disposition: attachment; filename="'.$zip_name.'"');
			        readfile($zip_name);
			        // remove zip file from temp path
			        unlink($zip_name);


			        //Update download count
					$post->dcount = ($post->dcount)+1;

					$post->save();

			    }
			    else{

					Flash::error('There was a problem dowloading your file , Try again later...');
				    return Redirect::route('home');
			    }
			 
			} 
			else {

				Flash::error('Something weired happened..Try again later...');
			    return Redirect::route('home');
			}

		}

		return Redirect::route('home');

	}

}