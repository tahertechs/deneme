<?php

class SettingsController extends BaseController{

	public function __construct(User $user){

		$this->user = Auth::user();
	}

	public function getIndex(){

		return View::make('users.settings')->with('user', $this->user);
	}

	public function postInfo(){

		$this->user->name = Input::get('name');
		$this->user->bio = Input::get('bio'); 

		$this->user->save();

		Flash::success('Your Personal Informations Updated Succesifully!');

		return Redirect::to('settings');
	}

	public function postPassword(){

		$this->user->password = Hash::make(Input::get('password'));

		$this->user->save();

		Flash::success('Your Password updated Succesifully!');

		return Redirect::to('settings');
	}

	public function postSocial(){

		$this->user->facebook = Input::get('facebook');
		$this->user->twitter = Input::get('twitter');
		$this->user->google = Input::get('google');
		$this->user->instagram = Input::get('instagram');
		$this->user->linkedin = Input::get('linkedin');

		$this->user->save();

		Flash::success('Your social Links updated Succesifully!');

		return Redirect::to('settings');
	}


}