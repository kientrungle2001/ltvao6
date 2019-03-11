<?php 
	require('./bootstrap.php'); 
		/*$google_client_id      = '989722593729-252hql7ahtij5b781mgure1qa84m20cm.apps.googleusercontent.com';
		$google_client_secret   = 'CNMx2m6GbWaXNQFntaygjWtL';

		$google_redirect_url    = 'http://tdn.nextnobels.com/google_login_callback.php';

		$google_developer_key   = 'AIzaSyCrX_Lr3KHW3NCBUN7riY8tzQRJ4gTGH5c';*/
		$google_client_id      = '281150147749-k79rk9laf895o84n5ji05h5ikim3aff8.apps.googleusercontent.com';
		$google_client_secret   = 'mJhKFETUgOSk0m4qC0KKT38_';

		$google_redirect_url    = 'http://tdn.nextnobels.com/google_login_callback.php';

		$google_developer_key   = 'AIzaSyBmqze0l0etL-K50n5EOWafpzm6EpyQd7A';
		
		require_once('3rdparty/logingoogle/src/Google_Client.php');
		require_once ('3rdparty/logingoogle/src/contrib/Google_Oauth2Service.php');
		//session_start();
		$gClient = new Google_Client();
		$gClient->setApplicationName('Đăng nhập bằng tài khoản Google');
		$gClient->setClientId($google_client_id);
		$gClient->setClientSecret($google_client_secret);
		$gClient->setRedirectUri($google_redirect_url);
		$gClient->setDeveloperKey($google_developer_key);
		$google_oauthV2 = new Google_Oauth2Service($gClient);


		if (! isset($_GET['code'])) {
		  $auth_url = $gClient->createAuthUrl();
		  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
		} else {
		  $gClient->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $gClient->getAccessToken();
		  /*$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));*/
		  if (isset($_SESSION['token'])) 
			{ 
				$gClient->setAccessToken($_SESSION['token']);
			}
			if ($gClient->getAccessToken()) 
			{
				$user               = $google_oauthV2->userinfo->get();
				$user_id            = $user['id'];
				$name          = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
				$email              = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
				/*$profile_url        = filter_var($user['link'], FILTER_VALIDATE_URL);
				$profile_image_url  = filter_var($user['picture'], FILTER_VALIDATE_URL);
				$gender             = $user['gender'];	*/			
				$_SESSION['token']  = $gClient->getAccessToken();

			}
		}		
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
 <script>
    $.post("<?php echo FL_API_URL ?>/login/fbGLogin", {name: "<?php echo $name ?>", username: "<?php echo $user_id ?>", email: "<?php echo $email ?>", url: "<?php echo FL_URL ?>" }, function(resp) {     
          if(resp.success) {
            window.location = resp.url;
          }
    });
</script>