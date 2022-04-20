<?php
// site.com/item/id/action

    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'item'
        $GLOBALS['url_loc'][2] <-- item id as string
        $GLOBALS['url_loc'][3] <-- operation as string
    */


    $item_id = URL_LOC_1;
    $item_data = DatabaseConnector::getItemData($item_id);
    $order_data = DatabaseConnector::getOrderDataByItem($item_id);
    $event_data = DatabaseConnector::getItemEventDataByItem($item_id);
    $signed_in = USER_ID; // User::isLoggedin();
    $is_users_listing = Order::isUsersListing($item_id,$signed_in);
	$is_item_open = Order::isItemOpen($item_id);
	$is_item_pending = Order::isItemPending($item_id);
	$is_item_in_cart = Order::isItemInUserCart($item_id, $signed_in);    
    $category_data = DatabaseConnector::getCategoryLinkData();
    $options = array();
    $option = array();
    foreach($category_data as $c){
        $option = [
            "value"=>$c["cat_id"],
            "text"=>$c["cat_name"]
        ];
        array_push($options, $option);
    }

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
            case URL_EDIT_ITEM:
                // item data alrady loaded
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