<?php


    include_once('../functions/functions.collector.php');
    include_once('../functions/functions.events.php');

    if(!isset($_POST)){
        header("location: /public_html");
    }


    try{
        switch(URL_LOC_1){
            case URL_ADD_EVENT:
                $item_id = $_POST[EVENT_TABLE_ITEM_ID];
                $event_data = insertEventFormReducer($item_id, $_POST);
                insertEvent($event_data);
                break;
            case URL_ADD_ITEM:
                $item_data = addNewItemReducer();
                DatabaseConnector::addNewItem($item_data, USER_ID);
                $item_id = DatabaseConnector::getLastItemAddedByUser(USER_ID)[0];
                var_dump($item_id);
                var_dump(DatabaseConnector::getLastItemAddedByUser(USER_ID));
                $item_data = DatabaseConnector::getItemDataNoPics($item_id);
                $item_data = addItemEventReducer($item_data[ITEM_TABLE_I_ID]);
                var_dump($item_data);
                insertEvent($item_data);
                break;
			case URL_EDIT_PROFILE:
				 DatabaseConnector::updateUserProfileInfo(USER_ID);
				 $GLOBALS['user_profile_updated']=TRUE;
				 break;
            case URL_SELL_ITEM:
                $item_id = URL_LOC_2;
                setItemFlag($item_id, ITEM_TABLE_LISTED_FOR_SALE);
                $event_data = insertEventSellItemReducer($item_id, true);
                insertEvent($event_data);
                break;
            case URL_REMOVE_SALE_LISTING:
                $item_id = URL_LOC_2;
                setItemFlag($item_id, ITEM_TABLE_DELISTED_FROM_SALE);
                $event_data = insertEventSellItemReducer($item_id, false);
                insertEvent($event_data);
                break;
            case URL_EDIT_ITEM:
                break;
            case URL_ADD_TO_CART:
                $item_id = URL_LOC_2;
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
