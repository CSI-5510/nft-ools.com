<?php

switch ($GLOBALS['url_loc'][1]){
    case "/":
    break;
    case "item_list":
        $BACKEND = "item_list";
		$PAGE_TITLE = "Item List";
        $HEADER = "header";
        $ASIDE = "aside";
        $FRONTEND = "item_list";
        $FOOTER = "footer";
    break;
    case "subcategory":
        $BACKEND = "subcategory";
		$PAGE_TITLE = "Subcategories";
        $HEADER = "header";
        $ASIDE = "aside";
        $FRONTEND = "subcategory";
        $FOOTER = "footer";
    break;
    case "item_list":
        $BACKEND = "item_list";
		$PAGE_TITLE = "Item List";
        $HEADER = "header";
        $ASIDE = "aside";
        $FRONTEND = "item_list";
        $FOOTER = "footer";
    break;
    default:
        $BACKEND = "index";
        $PAGE_TITLE = "Index";
        $HEADER = "header";
        $ASIDE = "aside";
        $FRONTEND = "index";
        $FOOTER = "footer";
	break;
}
?>