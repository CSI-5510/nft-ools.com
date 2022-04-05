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
    default:
        $BACKEND = "index";
        $PAGE_TITLE = "Index";
        $FRONTEND = "index";
	    break;
}
?>