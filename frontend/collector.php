<?php


    // FRONTEND
    include_once('../functions/functions.collector.php');
    include_once('../functions/functions.item.php');

    try{
        switch(URL_LOC_2){
            case URL_ADD_EVENT:
                $url = generalNavigation(array(URL_ITEM, $item_id));
                header('location: '.$url);
                break;
            case ADD_ITEM:
                $url = generalNavigation(array(URL_ITEM, $item_id));
                header("location: ".$url);
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


