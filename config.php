<?php

$HEADER = "header";
$HEADER_BACKEND = "header";
$FOOTER = "footer";
$FOOTER_BACKEND = "footer";
$ASIDE = "aside";
$ASIDE_BACKEND = "aside";


switch ($GLOBALS['url_loc'][0]){
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
    case URL_CAROUSEL:
        $BACKEND = URL_CAROUSEL;
		$PAGE_TITLE = "Categories";
        $FRONTEND = URL_CAROUSEL;
        break;
    case URL_ABOUT_US:
        $BACKEND = URL_ABOUT_US;
        $PAGE_TITLE = "About Us";
        $FRONTEND = URL_ABOUT_US;
        unset($HEADER);
        unset($HEADER_BACKEND);
        unset($FOOTER);
        unset($FOOTER_BACKEND);
        unset($ASIDE);
        unset($ASIDE_BACKEND);
        break;			
    case URL_LOGIN:
        $BACKEND = URL_LOGIN;
		$PAGE_TITLE = "Log In";
        $FRONTEND = URL_LOGIN;
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
    case URL_COLLECTOR:
        $BACKEND = URL_COLLECTOR;
        $PAGE_TITLE = "Collector";
        $FRONTEND = URL_COLLECTOR;
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
    case URL_SEARCH:
        $BACKEND = URL_SEARCH;
        $PAGE_TITLE = "Searching";
        $FRONTEND = URL_SEARCH;
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
    case "home":
        $BACKEND = "carousel";
        $PAGE_TITLE = "Home";
        $FRONTEND = "carousel";
        break;
    default:
        $BACKEND = "index";
        $PAGE_TITLE = "Index";
        $FRONTEND = "index";
        $HEADER = "header";
        unset($HEADER);
        unset($HEADER_BACKEND);
        unset($FOOTER);
        unset($FOOTER_BACKEND);
        unset($ASIDE);
        unset($ASIDE_BACKEND);
	    break;

}
?>