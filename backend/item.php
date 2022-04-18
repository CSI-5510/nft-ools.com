<?php
// site.com/item/id/action

    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'item'
        $GLOBALS['url_loc'][2] <-- item id as string
        $GLOBALS['url_loc'][3] <-- operation as string
    */
    $item_id = URL_LOC_2;
    $item_data = DatabaseConnector::getItemData($item_id);
    $order_data = DatabaseConnector::getOrderDataByItem($item_id);
    $event_data = DatabaseConnector::getItemEventDataByItem($item_id);
    $signed_in = USER_ID; // User::isLoggedin();
    $is_users_listing = Order::isUsersListing($GLOBALS['url_loc'][2],$signed_in);
	$is_item_open = Order::isItemOpen($GLOBALS['url_loc'][2]);
	$is_item_pending = Order::isItemPending($GLOBALS['url_loc'][2]);
	$is_item_in_cart = Order::isItemInUserCart($GLOBALS['url_loc'][2], $signed_in);

    if(!isset($GLOBALS['url_loc'][3])){
        return;
    }

    try{
        switch($GLOBALS['url_loc'][3]){
            case URL_ADD_TO_CART:
                Order::addItemToCart($item_data['i_id'], $signed_in);
                break;
            case URL_REMOVE_FROM_CART:
                Order::removeItemFromCart($item_data['i_id'], $signed_in);
                break;				
            case URL_EDIT:
                // modal data
                break;
			default:
			//returns them back to the default item page
				header("location:./");
				break;
        }
    } catch(Exception $e) {
        $result = $e->getMessage();
    }


?>