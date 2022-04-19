<?php

//This is how we get what page we should be on based on URL.
$GLOBALS['url_loc'] = explode('/', htmlspecialchars(strtok($_SERVER['REQUEST_URI'], '?'), ENT_QUOTES));

$GLOBALS['config']['url_offset'] = 2;
$GLOBALS['config']['url_root'] = ""; 

$GLOBALS['devmode'] = 1; 

//$GLOBALS['db_conf']['db_host'] = "35.196.103.19";
$GLOBALS['db_conf']['db_host'] = "nft-ools.com";
$GLOBALS['db_conf']['port'] = "3306";
$GLOBALS['db_conf']['db_db'] = "NFTools";
$GLOBALS['db_conf']['db_user'] = "admin";
$GLOBALS['db_conf']['db_pass'] = "oakland";
$GLOBALS['db_conf']['db_charset'] = "utf8";
 
if($GLOBALS['config']['url_offset'] > 0) {
    $x = 0; while($x < ($GLOBALS['config']['url_offset'])){ unset($GLOBALS['url_loc'][$x]); $x++; }
    $GLOBALS['url_loc'] = array_values($GLOBALS['url_loc']);
}


//Do not touch -- These are settings we should define or set, but not adjust unless we absolutely need to.
$GLOBALS['errors'] = array();

$GLOBALS['messages'] = array(); //Main array for all status messages
$GLOBALS['messages']['error'] = array(); //Main array for all status messages
$GLOBALS['messages']['warning'] = array(); //Main array for all status messages
$GLOBALS['messages']['success'] = array(); //Main array for all status messages

if(!ob_start("ob_gzhandler")) ob_start();
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("../functions/functions.general.php");


include('../functions/functions.debug.php');
include('../functions/functions.tile.php');
include('../functions/functions.carousel.php');

include('../functions/functions.header.php');
include('../functions/functions.navigation.php');
include('../functions/functions.ui.php');
include('../functions/functions.input_validation.php');
include('../functions/functions.pricing_algorithm.php');
include("../classes/class.database.php");

include("../classes/class.user.php");
include("../classes/class.order.php");

include("../classes/class.general.php");
include("classes/class.admin.php");

include('../constants/constants.all.php');
?>
