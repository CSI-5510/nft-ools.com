<?php


    // FRONTEND
    include('../functions/functions.constructor.php');
    
    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_ITEM:
                alertBox('Please confirm our price and your submission details.');
                drawCollectorAddItem();
                break;
            case $ADD_ITEM_CONFIRMATION:
                alertBox('Please confirm our price and your submission details.');
                drawCollectorAddItem();
                break;
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('malformed url');
    }

?>


