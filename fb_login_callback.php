<?php
    require('./bootstrap.php');     
    date_default_timezone_set("Asia/Bangkok");
    require_once( '3rdparty/loginfacebook/src/Facebook/autoload.php' );
    $fb = new Facebook\Facebook([
      /*'app_id' => '236878983644973',
      'app_secret' => '8aa569f7986c9babcf325fad7399ec02',
      'default_graph_version' => 'v3.1',*/
      'app_id' => '180896868946666',
      'app_secret' => 'ef08f1228da60f0331c8907a06ce3503',
      'default_graph_version' => 'v3.1',
      ]);
    $helper = $fb->getRedirectLoginHelper();
    try {
      $accessToken = $helper->getAccessToken();
      $response = $fb->get('/me?fields=id,name,email', $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    if (! isset($accessToken)) {
      if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
      } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
      }
      exit;
    }
    // Logged in
    $me = $response->getGraphUser();
    $_SESSION['fb_access_token'] = (string) $accessToken;
    
    $username = $me->getId();
    $name = $me->getName();
    $email = $me->getEmail();
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
 <script>
    $.post("https://api2.nextnobels.com/login/fbGLogin", {name: "<?php echo $name ?>", username: "<?php echo $username ?>", email: "<?php echo $email ?>", url: "<?php echo FL_URL ?>" }, function(resp) {     
          if(resp.success) {
            window.location = resp.url;
          }
    });
</script>
