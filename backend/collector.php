<?php

    include_once('../functions/functions.pricing_algorithm.php');
    include_once('../functions/functions.collector.php');

    try{
        switch($GLOBALS['url_loc'][2]){
            case ADD_ITEM:
                $user_id = User::isLoggedIn();
                if(!$user_id){
                    console ('not logged in');
                    return;
                }
                // virus scan
                // pass: 
                $price = pricing(
                    $_POST[ADD_ITEM_ORIGINAL_PURCHASE_PRICE], 
                    $_POST[ADD_ITEM_ORIGINAL_PURCHASE_DATE], 
                    PRICE_FLOOR, 
                    DAYS_TO_MINIMUM_PIRCE
                );
                $item_data = assembleItemData(
                    $_POST[ADD_ITEM_ORIGINAL_PURCHASE_PRICE], 
                    DAYS_TO_MINIMUM_PIRCE
                );
                console($price);
                console(json_encode($item_data));
                DatabaseConnector::addNewItem($item_data, $user_id);
                //   $no_threats_detected = TRUE; 
                //   get $user_id;
                //   $item_data = DatabaseConnector::getLastItemSubmission($user_id); 
                // fail: 
                //   $no_threats_detected = FALSE;
                break;
            case ADD_ITEM_CONFIRMATION:
                // $item_id = $_POST["item_id"];
                // $item_data = DatabaseConnector::getItem($item_id);
                // DatabaseConnector::setPendingApproval($item_id);
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
        alertBox('Error', 'malformed url');
    }

?>