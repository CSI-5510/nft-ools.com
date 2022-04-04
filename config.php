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
    default:
        $BACKEND = "index";
        $PAGE_TITLE = "Index";
        $FRONTEND = "index";
	    break;
}
?>