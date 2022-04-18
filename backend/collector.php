<?php

    include_once('../functions/functions.collector.php');
    
    if(!isset($_POST)){
        header("location: /public_html");
    }

    try{
        switch(URL_LOC_2){
            case URL_ADD_EVENT:
                $item_id = URL_LOC_3;
                $event_data = addEventReducer($item_id, $_POST);
                DatabaseConnector::addEvent($event_data);
                break;
            case URL_ADD_ITEM:
                $item_data = addNewItemReducer();
                DatabaseConnector::addNewItem($item_data, USER_ID);
                $item_id = DatabaseConnector::getLastItemAddedByUser(USER_ID)[0][0];
                $item_data = DatabaseConnector::getItemDataNoPics($item_id);
                $item_data = addItemEventReducer($item_data[ITEM_TABLE_ID]);
                DatabaseConnector::addEvent($item_data);
                break;
			case URL_EDIT_PROFILE:
				 DatabaseConnector::updateUserProfileInfo(USER_ID);
				 $GLOBALS['user_profile_updated']=TRUE;
				 break;
            case URL_EDIT_ITEM:
                break;
            default:
                break;
        }
    } catch(Exception $e){
        var_dump($e);
        alertBox('Error', 'malformed url');
    }

?>
