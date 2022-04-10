<?php


    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'item'
        $GLOBALS['url_loc'][2] <-- item id as string
        $GLOBALS['url_loc'][3] <-- operation as string
    */
    $item_data = DatabaseConnector::getItemData($GLOBALS['url_loc'][2]);
    $signed_in = User::isLoggedin();
    $is_users_listing = Order::isUsersListing($GLOBALS['url_loc'][2],$signed_in);
	$is_item_open = Order::isItemOpen($GLOBALS['url_loc'][2]);
	$is_item_pending = Order::isItemPending($GLOBALS['url_loc'][2]);
	$is_item_in_cart = Order::isItemInUserCart($GLOBALS['url_loc'][2], $signed_in);
	
    if(!isset($GLOBALS['url_loc'][3])){
        return;
    }

    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
                $result = Order::addItemToCart($item_data['i_id'], $signed_in);
                break;
            case $REMOVE_FROM_CART:
                Order::removeItemFromCart($item_data['i_id'], $signed_in);
                break;				
            case $EDIT:
                // modal data
                console('pass modal data');
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