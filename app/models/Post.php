<?php

class Post extends Eloquent{

	protected $fillable = array('title','description','slug');

	public static $rules = array('title'=>'required|min:5');

	public function author(){

		return $this->belongsTo('User','author_id');
	}
	
	public function uploads(){

		return $this->hasMany('Upload','post_id');
	}

	public function postBelongsToUser($id){

		$user = Auth::user();
		
		$post = Post::find($id);

		if($post->author->id == $user->id){

			return true;
		}

		return false;

	}

}