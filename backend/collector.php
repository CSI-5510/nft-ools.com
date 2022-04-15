<?php

    include_once('../functions/functions.pricing_algorithm.php');
    include_once('../functions/functions.collector.php');
    
    if(!isset($_POST)){
        header("location: /public_html");
    }

    try{
        switch($GLOBALS['url_loc'][2]){
            case ADD_ITEM:
                $item_data = addNewItemReducer();
                DatabaseConnector::addNewItem($item_data, USER_ID);
                $item_id = DatabaseConnector::getLastItemAddedByUser(USER_ID)[0][0];
                $item_data = DatabaseConnector::getItemData($item_id);
                $user_data = DatabaseConnector::getUserFullName(USER_ID);
                $item_data = newItemEventReducer($item_data,$user_data);
                DatabaseConnector::addEvent(EVENT_NEW_ITEM, $item_data);
                break;
            default:
                break;
        }
    } catch(Exception $e){
        var_dump($e);
        alertBox('Error', 'malformed url');
    }

?>
