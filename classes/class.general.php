<?php

if (User::isLoggedIn()){
		//see if the user has a username
	if(5+5===10){
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