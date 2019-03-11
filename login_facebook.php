<?php 
	session_start();
	if(isset($_SESSION["userId"])){

	}else{ 

			require_once( '3rdparty/loginfacebook/src/Facebook/autoload.php' );
			$fb = new Facebook\Facebook([
				'app_id' => '180896868946666',
			      'app_secret' => 'ef08f1228da60f0331c8907a06ce3503',
			      'default_graph_version' => 'v3.1',
			  /*'app_id' => '236878983644973',
			  'app_secret' => '8aa569f7986c9babcf325fad7399ec02',
			  'default_graph_version' => 'v3.1',*/
			  ]);
			$helper = $fb->getRedirectLoginHelper();
			$permissions = ['email']; // Optional permissions
			$loginUrl = $helper->getLoginUrl('https://tdn.nextnobels.com/fb_login_callback.php', $permissions);
			header('Location: ' . $loginUrl);

			
	}
 ?>