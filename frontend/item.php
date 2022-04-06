<?php 


    include('../functions/functions.item.php');
    
    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
                alertBox('Added to cart', $item_data['i_name'].' at $'.$item_data['i_price']);
                break;
            case $EDIT:
                drawEditItemModal();
                break;
            default:
                console('item.php frontend line 15');
                drawItemPage($item_data, $is_users_listing, $signed_in, FALSE);
                break;
        }
    } catch(Exception $e){
        alertBox('Error', 'malformed url');
    }

    
?>