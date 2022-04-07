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
	$is_item_in_cart = Order::isItemInUserCart($GLOBALS['url_loc'][2], $signed_in);
	//tells us if a dispatched access is finished.
	//1 = start
	//2 = pending
	//3 = finished
	$reducer_status = 1;
	
    if(!isset($GLOBALS['url_loc'][3])){
        return;
    }

    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
				$reducer_status = 2;
                $result = DatabaseConnector::addToCart($item_data['i_id'], $signed_in);
                break;
            case $REMOVE_FROM_CART:
                Order::removeItemFromCart($item_data['i_id'], $signed_in);
                break;				
            case $EDIT:
                // modal data
                console('pass modal data');
                break;
        }
    } catch(Exception $e) {
        $result = $e->getMessage();
    }


?>