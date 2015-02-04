<?php

class UsersController extends \BaseController {

	//Show all members of the system
	public function index()
	{
		$users = User::all();

		return View::make('users.index',compact('users')); 
	}

	//Show individual member
	public function show($username){

		$user = User::where('username','=', $username)->first();

		if($user){

			return View::make('users.show',compact('user')); 
		}

		return Redirect::to('/');
	
	}


}