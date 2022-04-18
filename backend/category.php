<?php


    $item_id = URL_LOC_2;

    switch($item_id){
        case is_numeric($item_id):
			$items_list = DatabaseConnector::getItemsData(URL_LOC_2);	
            break;
        case URL_USER:
            if(!USER_ID){
                header("location: ".URL_HOME);
                return;
            }
            $items_list = DatabaseConnector::getUserItemsList(USER_ID);
            break;
        default:
            header(URL_HOME);
            break;
    }
?>