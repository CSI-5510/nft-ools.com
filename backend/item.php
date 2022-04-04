<?php


    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'item'
        $GLOBALS['url_loc'][2] <-- item id as string
        $GLOBALS['url_loc'][3] <-- operation as string
    */
    $item_data = DatabaseConnector::getItemData($GLOBALS['url_loc'][2]);
    $signed_in = TRUE;
    $is_users_listing = TRUE;

    if(!isset($GLOBALS['url_loc'][3])){
        return;
    }

    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
                $result = DatabaseConnector::addToCart($item_data['i_id'], User::isLoggedIn());
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