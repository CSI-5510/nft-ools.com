<?php 


    include('../functions/functions.item.php');
    
    try{
        switch($GLOBALS['url_loc'][3]){
            case URL_ADD_TO_CART:
				//is item already in the users cart? let the user know
				if($is_item_in_cart){
                alertBox("Item is already in the cart", "Error");
				} else {
				//set $is_item_in_cart to true
				$is_item_in_cart = true;					
				//initial add to order
                alertBox($item_data['i_name'].' at $'.$item_data['current_price'], "Added to orders");
				}
                break;
            case URL_REMOVE_FROM_CART:
				//is item already in the users cart? let the user know
				if(!$is_item_in_cart){
                alertBox("Item is not in the cart", "Error");
				} else {
				//set $is_item_in_cart to true
				$is_item_in_cart = false;					
				//initial add to order
                alertBox($item_data['i_name'], "Removed from orders");
				}
                break;		
            case URL_EDIT:
                
                break;
            default:
                drawItemPage($item_data, $order_data, $event_data, $is_users_listing, $signed_in, FALSE);
                break;
        }
    } catch(Exception $e){
        alertBox('Error', 'malformed url');
    }
?>
