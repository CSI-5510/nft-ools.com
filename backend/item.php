<?php


    $ADD_ITEM = 'add_to_cart';


    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'item'
        $GLOBALS['url_loc'][2] <-- item id as string
        $GLOBALS['url_loc'][3] <-- operation as string
    */
    $item_data = DatabaseConnector::getItemData($GLOBALS['url_loc'][2]);


    if(!isset($GLOBALS['url_loc'][3])){
        return;
    }
    

    try{
        if($GLOBALS['url_loc'][3]==$ADD_ITEM){
            $temp = DatabaseConnector::addToCart($item_data['i_id'], '21');
        }
    } catch(Exception $e) {
        $insert_result = $e->getMessage();
    }


?>