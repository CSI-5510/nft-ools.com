<?php


    // FRONTEND
    include_once('../functions/functions.collector.php');
    include_once('../functions/functions.item.php');

    try{
        switch($GLOBALS['url_loc'][2]){
            case ADD_ITEM:
                // header("location: /public_html/item/".$item_id);
                break;
            case ADD_ITEM_CONFIRMATION:
                alertBox('Notice', 'Item submission awaiting approval. The approval process takes 24 to 48 hours.');
                drawItemPage($item_data, TRUE, TRUE, TRUE);
                break;
            case CANCEL_ADD_ITEM:
                alertBox('Notice', 'Item submission request cancelled.');
                break;
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('Error', 'malformed url');
    }

?>


