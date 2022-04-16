<?php

    include_once('../functions/functions.pricing_algorithm.php');
    include_once('../functions/functions.collector.php');
    
    if(!isset($_POST)){
        header("location: /public_html");
    }

    try{
        switch($GLOBALS['url_loc'][2]){
            case URL_ADD_EVENT:
                $event_data = addEventReducer($_POST);
                console($event_data);
                break;
            case ADD_ITEM:
                $item_data = addNewItemReducer();
                DatabaseConnector::addNewItem($item_data, USER_ID);
                $item_id = DatabaseConnector::getLastItemAddedByUser(USER_ID)[0][0];
                $item_data = DatabaseConnector::getItemData($item_id);
                $user_data = DatabaseConnector::getUserFullName(USER_ID);
                $item_data = newItemEventReducer($item_data,$user_data);
                DatabaseConnector::addEvent(EVENT_NEW_ITEM, $item_data);
                break;
            case ADD_ITEM_CONFIRMATION:
                // $item_id = $_POST["item_id"];
                // $item_data = DatabaseConnector::getItem($item_id);
                // DatabaseConnector::setPendingApproval($item_id);
                break;
			case EDIT_PROFILE:
				 DatabaseConnector::updateUserProfileInfo(USER_ID);
				 $GLOBALS['user_profile_updated']=TRUE;
				 break;
            case CANCEL_ADD_ITEM:
                // $item_id = $_POST["item_id"];
                // if($new_item){
                //    DatabaseConnector::removeItem($item_id);
                // } else {
                //    DatabaseConnector::removeLatestOrder($item_id):
                // }
                break;
            default:
                break;
        }
    } catch(Exception $e){
        var_dump($e);
        alertBox('Error', 'malformed url');
    }

?>
