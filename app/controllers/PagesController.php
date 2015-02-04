<?php

class PagesController extends \BaseController {


	public function index(){
		
		return View::make('pages.index');	
	}


	public function home(){

		$posts = Post::orderBy('created_at','desc')->paginate(5);

		return View::make('pages.home',compact('posts','user'));

	}

	public function about(){
		//
	}

	public function faq(){
		//
	}

	public function help(){
		//
	}

}