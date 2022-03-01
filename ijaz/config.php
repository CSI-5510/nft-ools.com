<?php
switch ($GLOBALS['url_loc'][1])
{
    case "/":
    break;
    default:
        $BACKEND = "index";
		$PAGE_TITLE = "Index";
        $FRONTEND = "index";
	break;
}
?>