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
            case URL_ADD_ITEM:
                $url = generalNavigation(array(URL_ITEM, $item_id));
                header("location: ".$url);
                break;			 
            case URL_EDIT_PROFILE:
                $url = generalNavigation(array(URL_PROFILE, URL_PROFILE_UPDATED));			
                header("location: ".$url);
                break;	
            case URL_EDIT_ITEM:
                foreach($_POST as $p){
                    var_dump($p);
                    echo "<br>";
                }
                foreach($_FILES as $f){
                    var_dump($f);
                    echo "<br>";
                }
                break;
            case URL_SELL_ITEM:
                $url = generalNavigation(array(URL_ITEM,URL_LOC_3));
                header("location: ".$url);
                break;
            case URL_REMOVE_SALE_LISTING:
                $url = generalNavigation(array(URL_ITEM,URL_LOC_3));
                header("location: ".$url);
                break;
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('Error', 'malformed url');
    }

?>


