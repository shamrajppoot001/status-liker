$config = array(
    'appId' => '1479470665614680',
    'secret' => 'e78aeb82191ae42a2d574b898b25ebc6',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
 	$user_id = $facebook->getUser();

 	$islogin=0;
 	if($user_id) {
 	
 		// We have a user ID, so probably a logged in user.
 		// If not, we'll get an exception, which we handle below.
 		try {
 	
 			$user_profile = $facebook->api('/me','GET');
 			$islogin=1;
 	
 		} catch(FacebookApiException $e) {
 			// If the user is logged out, you can have a
 			// user ID even though the access token is invalid.
 			// In this case, we'll get an exception, so we'll
 			// just ask the user to login again here.
 			$login_url = $facebook->getLoginUrl();
 			error_log($e->getType());
 			error_log($e->getMessage());
 	
 		}
 	} else {
 	
 		// No user, print a link for the user to login
 		$login_url = $facebook->getLoginUrl();
 		 
 	}
