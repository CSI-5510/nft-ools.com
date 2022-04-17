<?php


    // FRONTEND
    include_once('../functions/functions.collector.php');
    include_once('../functions/functions.item.php');

    try{
        switch($GLOBALS['url_loc'][2]){
            case URL_ADD_EVENT:
                header('location: '.PROJECT_ROOT.'/'.URL_LOC_0.'/'.URL_ITEM.'/'.$item_id);
                break;
            case ADD_ITEM:
                header("location: /public_html/item/".$item_id);
                break;			 
            case EDIT_PROFILE:
                $url = generalNavigation(array(URL_PROFILE, URL_PROFILE_UPDATED));			
                header("location: ".$url);
                break;	
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('Error', 'malformed url');
    }

?>


