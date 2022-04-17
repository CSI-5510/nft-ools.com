<?php
 
 
$userid = User::isLoggedIn();
if ($userid){
	//see if the user has a username
	if(!User::getUsername($userid)){
		//make sure not being redirected when already on page
		if ($GLOBALS['url_loc'][1] === "setup"  || $GLOBALS['url_loc'][1] === "logout"){

		}
		else{
		//force user to take username onboarding
		header("location:../public_html/setup");
		}
	}
	
	
	
	
}


?>