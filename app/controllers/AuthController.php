<?php

class AuthController extends \BaseController {

	public function __construct(){

        //$this->beforeFilter('guest', array('except' => 'getLogin'));

        $this->beforeFilter('csrf', array('on' => 'post'));


	}


	public function postRegister()
	{
		if(Auth::check()){

			Flash::message('Cikis Yapmadan Yeni kayit Yapamazsiniz....Once Cikis yap oyle devam et. Hadi yuru git... ');

			return Redirect::to('/');
		}

		$rules = array(
			'username'=>'required|min:3|unique:users',
			'email'=>'required|email|unique:users',
			'password'=> 'required|min:3',
			'password_confirmation' =>'required|min:3|same:password'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			$user = new User;
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->remember_token = Input::get('_token');
			$user->save();

			Flash::success('Successifully Registered...! Login Now!');

			return Redirect::to('/');
		}
		else {

			return Redirect::to('/')->withInput()->withErrors($validator);
		}

	}


	public function postLogin()
	{

		if(Auth::check()){

			Flash::message('Zaten giris yapmissindir , Niye ugrasiyorsunuzki ? SITEYE GIR butona tiklasana ');

			return Redirect::to('/');
		}

		$rules = array(
			'username_or_email'    => 'required',
			'password' => 'required|min:3'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {		

			return Redirect::back()->withInput()->withErrors($validator);

		} else {

			$field = filter_var(Input::get('username_or_email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

			$credentials = array(
				$field      => Input::get('username_or_email'),
				'password'  => Input::get('password')
			);

			if (Auth::attempt($credentials))
			{
				Flash::success('Welcome Aboard...'. Auth::user()->email);

				return Redirect::intended('home');
			}
			else{

				Flash::error('Password or Email is not correct, Try Again Later..');

				return Redirect::to('/');
			}
		}

	}

	public function getLogout()
	{
		Auth::logout();

		Flash::message('Hope to see you soon , Don forget to like our page'); 

		return Redirect::route('home');
	}


}
