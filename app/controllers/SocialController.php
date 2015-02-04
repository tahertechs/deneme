<?php

class SocialController extends BaseController{

	/**
	 * Login user with facebook
	 *
	 * @return void
	 */

	public function loginWithFacebook() {

	    // get data from input
	    $code = Input::get( 'code' );

	    // get fb service
	    $fb = OAuth::consumer( 'Facebook' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from facebook, get the token
	        $token = $fb->requestAccessToken( $code );

	        // Send a request with it
	        $me = json_decode( $fb->request( '/me' ), true );

	        //Logic starts here
	        $uid = $me['id'];
		    $profile = Social::whereUid($uid)->first();
		    if (empty($profile)) {

				$user_exist = User::where('email','=',$me['email'])->first(); 

				if(empty($user_exist)){
			        $user = new User;
			        $user->name = $me['first_name'].' '.$me['last_name'];
			        $user->email = $me['email'];
			        $user->username = explode("@", $me['email'])[0];
			        $user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';

			        $user->save();

			        $profile = new Social();
			        $profile->uid = $uid;
			        $profile->username = $me['first_name'];
			        $profile = $user->profiles()->save($profile);
				}else{
					if(empty($user_exist->photo)){ 
						$user_exist->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';	
						$user_exist->save();					
					}

					Auth::login($user_exist);
					Flash::message('Hey '.$user_exist->username.' , Welcome back ...This time you logged in using Facebook social network...');
					return Redirect::route('home');					
				}

		    }

		    $profile->access_token = $token->getAccessToken();
		    $profile->save();

		    $user = $profile->user;

		    Auth::login($user);

		    Flash::success('Succesifully Logged in with Facebook');
		    return Redirect::route('home');


	    }
	    // if not ask for permission first
	    else {
	        // get fb authorization
	        $url = $fb->getAuthorizationUri();

	        // return to facebook login url
	         return Redirect::to( (string)$url );
	    }

	}


	public function loginWithTwitter() {

	    // get data from input
	    $token = Input::get( 'oauth_token' );
	    $verify = Input::get( 'oauth_verifier' );

	    // get twitter service
	    $tw = OAuth::consumer( 'Twitter' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $token ) && !empty( $verify ) ) {

	        // This was a callback request from twitter, get the token
	        $token = $tw->requestAccessToken( $token, $verify );

	        // Send a request with it
	        $me = json_decode( $tw->request( 'account/verify_credentials.json' ), true );

	        //Logic starts here
	        $uid = $me['id'];
		    $profile = Social::whereUid($uid)->first();
		    if (empty($profile)) {

				$user_exist = User::where('email','=',$me['screen_name'].'@twitter.com')->first(); 

				if(empty($user_exist)){
			        $user = new User;
			        $user->name = $me['name'];
			        $user->email = $me['screen_name'].'@twitter.com';
			        $user->username = $me['screen_name'];
			        $user->bio = $me['description'];
			        $user->photo = $me['profile_banner_url']; //$me['profile_image_url']; 

			        $user->save();

			        $profile = new Social();
			        $profile->uid = $uid;
			        $profile->username = $me['screen_name'];
			        $profile = $user->profiles()->save($profile);
				}else{
					if(empty($user_exist->photo)){ 
						$user_exist->photo = $me['profile_banner_url']; //$me['profile_image_url'];	
						$user_exist->save();					
					}

					Auth::login($user_exist);
					Flash::message('Hey '.$user_exist->username.' , Welcome back ...This time you logged in using Twitter social network...');
					return Redirect::route('home');					
				}

		    }

		    $profile->access_token = $token->getAccessToken();
		    $profile->save();

		    $user = $profile->user;

		    Auth::login($user);

		    Flash::success('Succesifully Logged in with Twitter..');
		    return Redirect::route('home');
	    }

	    // if not ask for permission first
	    else {
	        // get request token
	        $reqToken = $tw->requestRequestToken();

	        // get Authorization Uri sending the request token
	        $url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

	        // return to twitter login url
	        return Redirect::to( (string)$url );
	    }
	}


	public function loginWithGoogle() {

	    // get data from input
	    $code = Input::get( 'code' );

	    // get google service
	    $googleService = OAuth::consumer( 'Google' );

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken( $code );

	        // Send a request with it
	        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

	        $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
	        echo $message. "<br/>";

	        //Var_dump
	        //display whole array().
	        dd($result);

	    }
	    // if not ask for permission first
	    else {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return Redirect::to( (string)$url );
	    }
	}



	public function loginWithLinkedin() {

        // get data from input
        $code = Input::get( 'code' );

        $linkedinService = OAuth::consumer( 'Linkedin' );


        if ( !empty( $code ) ) {

            // This was a callback request from linkedin, get the token
            $token = $linkedinService->requestAccessToken( $code );
            // Send a request with it. Please note that XML is the default format.
            $me = json_decode($linkedinService->request('/people/~?format=json'), true);

	        //Logic starts here
	        $uid = $me['id'];
		    $profile = Social::whereUid($uid)->first();
		    if (empty($profile)) {

				$user_exist = User::where('email','=',$me['id'].'@linkedin.com')->first(); 

				if(empty($user_exist)){
			        $user = new User;
			        $user->name = $me['firstName'].' '.$me['lastName'];
			        $user->email = $me['id'].'@linkedin.com';
			        $user->username = $me['firstName'];
			        $user->bio = $me['headline'];
			        //$user->photo = '';

			        $user->save();

			        $profile = new Social();
			        $profile->uid = $uid;
			        $profile->username = $me['firstName'];
			        $profile = $user->profiles()->save($profile);
				}else{
					if(empty($user_exist->photo)){ 
						//$user_exist->photo = '';	
						//$user_exist->save();					
					}

					Auth::login($user_exist);
					Flash::message('Hey '.$user_exist->username.' , Welcome back ...This time you logged in using Linkedin social network...');
					return Redirect::route('home');					
				}

		    }

		    $profile->access_token = $token->getAccessToken();
		    $profile->save();

		    $user = $profile->user;

		    Auth::login($user);

		    Flash::success('Succesifully Logged in with Linkedin..');
		    return Redirect::route('home');


        }// if not ask for permission first
        else {
            // get linkedinService authorization
            $url = $linkedinService->getAuthorizationUri(array('state'=>'DCEEFWF45453sdffef424'));

            // return to linkedin login url
            return Redirect::to( (string)$url );
        }


    }


}