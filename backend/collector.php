<?php

    include_once('../functions/functions.collector.php');
    include_once('../functions/functions.events.php');
    

    var_dump($_POST);

    if(!isset($_POST)){
        header("location: /public_html");
    }

    try{
        switch(URL_LOC_2){
            case URL_ADD_EVENT:
                $item_id = URL_LOC_3;
                $event_data = insertEventFormReducer($item_id, $_POST);
                insertEvent($event_data);
                break;
            case URL_ADD_ITEM:
                $item_data = addNewItemReducer();
                DatabaseConnector::addNewItem($item_data, USER_ID);
                $item_id = DatabaseConnector::getLastItemAddedByUser(USER_ID)[0][0];
                $item_data = DatabaseConnector::getItemDataNoPics($item_id);
                $item_data = addItemEventReducer($item_data[ITEM_TABLE_I_ID]);
                insertEvent($item_data);
                break;
			case URL_EDIT_PROFILE:
				 DatabaseConnector::updateUserProfileInfo(USER_ID);
				 $GLOBALS['user_profile_updated']=TRUE;
				 break;
            case URL_SELL_ITEM:
                $item_id = URL_LOC_3;
                setItemFlag($item_id, ITEM_TABLE_LISTED_FOR_SALE);
                $event_data = insertEventSellItemReducer($item_id, true);
                insertEvent($event_data);
                break;
            case URL_REMOVE_SALE_LISTING:
                $item_id = URL_LOC_3;
                setItemFlag($item_id, ITEM_TABLE_DELISTED_FROM_SALE);
                $event_data = insertEventSellItemReducer($item_id, false);
                insertEvent($event_data);
                break;
            case URL_EDIT_ITEM:
                break;
            case URL_ADD_TO_CART:
                $item_id = URL_LOC_3;
                setItemFlag($item_id, ITEM_TABLE_IN_CART);
                $event_data = '';
                break;
            default:
                break;
        }
    } catch(Exception $e){
        var_dump($e);
        alertBox('Error', 'malformed url');
    }

?>
