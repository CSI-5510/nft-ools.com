<?php

switch ($GLOBALS['url_loc'][1])
{
    case "/":
    break;
    case "item":
        $BACKEND = "item";
		$PAGE_TITLE = "Item View";
        $FRONTEND = "item";
    break;
    default:
        $BACKEND = "index";
		$PAGE_TITLE = "Index";
        $FRONTEND = "index";
	break;
}
?>