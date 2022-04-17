<?php

$HEADER = "header";
$HEADER_BACKEND = "header";
$FOOTER = "footer";
$FOOTER_BACKEND = "footer";
$ASIDE = "aside";
$ASIDE_BACKEND = "aside";


switch ($GLOBALS['url_loc'][1]){
    case "/":
    break;
    case URL_ADD_EVENT:
        $BACKEND = URL_ADD_EVENT;
        $PAGE_TITLE = "Add Event";
        $FRONTEND = URL_ADD_EVENT;
        break;
    case "item":
        $BACKEND = "item";
        $PAGE_TITLE = "Item";
        $FRONTEND = "item";
        break;
    case "logout":
			//use this function to see if the user is logged in
			if (!User::isLoggedin()){
				header("Location: ./");
				die();
			}	
			if (isset($_COOKIE['NFTOOLSID'])){
			DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['NFTOOLSID'])));
			}
			//expire cookie
			setcookie('NFTOOLSID', '1', time()-3600);
			//expire cookie
			setcookie('NFTOOLSID_', '1', time()-3600);
			//redirect the user
			header("Location: ./");
        break;		
    case "login":
        $BACKEND = "login";
		$PAGE_TITLE = "Log In";
        $FRONTEND = "login";
        break;		
    case "register":
        $BACKEND = "register";
		$PAGE_TITLE = "Register";
        $FRONTEND = "register";
        break;		
    case "category":
        $BACKEND = "category";
        $PAGE_TITLE = "Item List";
        $FRONTEND = "category";
        break;
    case "signin":
        $BACKEND = "signin";
        $PAGE_TITLE = "Sign In";
        $FRONTEND = "signin";
        break;
    case "add_item":
        $BACKEND = "add_item";
        $PAGE_TITLE = "Add Item";
        $FRONTEND = "add_item";
        break;
    case "collector":
        $BACKEND = "collector";
        $PAGE_TITLE = "Collector";
        $FRONTEND = "collector";
        break;
    case "reset":
        $BACKEND = "reset";
        $PAGE_TITLE = "Reset your password";
        $FRONTEND = "reset";
        break;
    case "redeem":
        $BACKEND = "redeem";
        $PAGE_TITLE = "Redeem your token";
        $FRONTEND = "redeem";
        break;
    case "setup":
        $BACKEND = "onboarding";
        $PAGE_TITLE = "We need some details..";
        $FRONTEND = "onboarding";
        break;
    case URL_PROFILE:
        $BACKEND = URL_PROFILE;
        $PAGE_TITLE = "Update Profile";
        $FRONTEND = URL_PROFILE;
        break;
    case "listener":
        $BACKEND = "listener";
        $PAGE_TITLE = "Sign In";
        $FRONTEND = "listener";
        break;	
    case "orders":
        $BACKEND = "orders";
        $PAGE_TITLE = "Orders";
        $FRONTEND = "orders";
        break;		
    default:
        $BACKEND = "index";
        $PAGE_TITLE = "Index";
        $FRONTEND = "index";
	    break;

}
?>