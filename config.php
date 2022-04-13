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
        $PAGE_TITLE = "Add Item";
        $FRONTEND = "collector";
        break;
    case "admin":
        $BACKEND = "admin";
        $PAGE_TITLE = "Admin";
        $FRONTEND = "admin";
        break;
    case "test":
        $BACKEND = "test";
        $PAGE_TITLE = "test";
        $FRONTEND = "test";
        break;
    default:
        $BACKEND = "index";
        $PAGE_TITLE = "Index";
        $FRONTEND = "index";
	    break;

}
?>