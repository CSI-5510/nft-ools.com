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
                /*
                $clean_price = numbersOnly($_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE]);
                $price = pricing(
                    $clean_price,
                    $_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE],
                    PRICE_FLOOR,
                    DAYS_TO_MINIMUM_PIRCE
                );
                $q = "INSERT INTO item (i_id,i_name,i_description,current_price,i_image,i_category_Id,i_serialnum,original_price,is_approved,owner_id,days_to_minimum_price,receipt,documentation,original_purchase_date,rejection_reason,was_reviewed) VALUES (NULL,$_POST[ITEM_OBFUSCATED_NAME],$_POST[ITEM_OBFUSCATED_DESCRIPTION],$price,file_get_contents($_FILES[ITEM_OBFUSCATED_IMAGE]['tmp_name']),$_POST[ITEM_OBFUSCATED_CATEGORY],$_POST[ITEM_OBFUSCATED_SERIAL_NUMBER],$clean_price,0,USER_ID,DAYS_TO_MINIMUM_PIRCE,file_get_contents($_FILES[ITEM_OBFUSCATED_RECEIPT]['tmp_name']),file_get_contents($_FILES[ITEM_OBFUSCATED_DOCUMENTATION]['tmp_name']),$_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE],'',0)";
                echo $q;
                echo "\n\n\n\n\n";
                var_dump($q);
                echo "<br><br>";
                DatabaseConnector::query($q,array(":image"=>$data[ITEM_TABLE_I_IMAGE],":r"=>$data[ITEM_TABLE_RECEIPT],":d"=>$data[ITEM_TABLE_DOCUMENTATION]));
                */
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
