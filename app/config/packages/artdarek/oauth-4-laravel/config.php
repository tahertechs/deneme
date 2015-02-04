<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '314555382073519',
            'client_secret' => 'c7a6ee3a1f753fa180e2acfbdf7fba3d',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),	

		'Twitter' => array(
		    'client_id'     => 'VMrQ0EJvTJZSmr495F9Pvtjjs',
		    'client_secret' => '1erZo4HOAQ1VGk2lsfCXnpHyeEADv5WxUC4NFLLN5vKTwvKnSi',
		),

		'Google' => array(
		    'client_id'     => '863623326805-5p1fs3uko000cspaeg298djqhgn0s8id.apps.googleusercontent.com',
		    'client_secret' => 'YBky7NANBhx6qWs2eB7AhCztK',
		    'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  

		'Linkedin' => array(
		    'client_id'     => '75zngamuu4gg99',
		    'client_secret' => 'UaBftqMVinwh1xbA',
		),  
				



	)

);