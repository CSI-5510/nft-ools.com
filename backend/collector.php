<?php

    include_once('../functions/functions.pricing_algorithm.php');
    include_once('../functions/functions.collector.php');

    try{
        switch($GLOBALS['url_loc'][2]){
            case ADD_ITEM:
                // $user_id = User::isLoggedInWithRedirect();
                console($_FILES);
                $user_id = 29;
                $item_data = assembleItemData();
                DatabaseConnector::addNewItem($item_data, $user_id);
                // var_dump(DatabaseConnector::getLastItemAddedByUser());
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
			case EDIT_PROFILE:
				 DatabaseConnector::updateUserProfileInfo(USER_ID);
				 $NOTIFY_USER=TRUE;
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
