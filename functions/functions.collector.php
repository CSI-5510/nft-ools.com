<?php 

    
    /** maps new item data for insertion
     *
     * @param  mixed $price from pricing algorithm
     * @param  mixed $days_to_minimum_price set in contants/constants.all.php
     * @return array for use with DatabaseConnect::addEvent(EVENT_NEW_ITEM)
     */
    function addNewItemReducer(){
        include_once('../functions/functions.pricing_algorithm.php'); 
        $price = pricing(
            $_POST[ITEM_QUERY_ORIGINAL_PURCHASE_PRICE], 
            $_POST[ITEM_QUERY_ORIGINAL_PURCHASE_DATE], 
            PRICE_FLOOR, 
            DAYS_TO_MINIMUM_PIRCE
        );
        return array(
            ITEM_TABLE_ID => NULL,
            ITEM_TABLE_NAME => $_POST[ITEM_QUERY_NAME], 
            ITEM_TABLE_DESCRIPTION => $_POST[ITEM_QUERY_DESCRIPTION], 
            ITEM_TABLE_CURRENT_PRICE => $price, 
            ITEM_TABLE_IMAGE => (file_get_contents($_FILES[ITEM_QUERY_IMAGE]["tmp_name"])), 
            ITEM_TABLE_CATEGORY_ID => intval($_POST[ITEM_QUERY_CATEGORY]), 
            ITEM_TABLE_SERIAL_NUMBER => intval($_POST[ITEM_QUERY_SERIAL_NUMBER]),
            ITEM_TABLE_ORIGINAL_PRICE => $_POST[ITEM_QUERY_ORIGINAL_PURCHASE_PRICE], 
            ITEM_TABLE_IS_APPROVED => 0,
            ITEM_TABLE_OWNER_ID => USER_ID,
            ITEM_TABLE_DAYS_TO_MINIMUM_PRICE => DAYS_TO_MINIMUM_PIRCE,
            ITEM_TABLE_RECEIPT => (file_get_contents($_FILES[ITEM_QUERY_RECEIPT]["tmp_name"])),
            ITEM_TABLE_DOCUMENTATION => (file_get_contents($_FILES[ITEM_QUERY_DOCUMENTATION]["tmp_name"])),
            ITEM_TABLE_ORIGINAL_PURCHASE_DATE => $_POST[ITEM_QUERY_ORIGINAL_PURCHASE_DATE],
            ITEM_TABLE_REJECTION_REASON => '',
            ITEM_TABLE_WAS_REVIEWED => 0,
        );
    }


    function newItemEventReducer($item_data, $user_data){
        return array(
            EVENT_TABLE_ID => 'NULL',                                                                                               /*00*/
            EVENT_TABLE_TIMESTAMP => 'NULL',                                                                                        /*01*/    
            EVENT_TABLE_STATUS => EVENT_TABLE_DEFAULT_STATUS,                                                                       /*02*/    
            EVENT_TABLE_ITEM_ID => $item_data[ITEM_TABLE_ID],                                                                       /*03*/
            EVENT_TABLE_BUYER_ID => 'NULL',                                                                                         /*04*/    
            EVENT_TABLE_SELLER_ID => 'NULL',                                                                                        /*05*/       
            EVENT_TABLE_TRANSACTION_ID => 'NULL',                                                                                   /*06*/
            EVENT_TABLE_TRANSACTION_AUTHENTICATION_CODE => 'NULL',                                                                  /*07*/
            EVENT_TABLE_EVENT_DESCRIPTION => 
                EVENT_TABLE_DESCRIPTION_EVENT_TYPE.'='.EVENT_SAVED_ITEM_ADDED.'&'.
                EVENT_TABLE_DESCRIPTION_CURRENT_PRICE.'='.$item_data[ITEM_TABLE_CURRENT_PRICE].'&'.
                EVENT_TABLE_DESCRIPTION_ORIGINAL_PURCHASE_PRICE.'='.$item_data[ITEM_TABLE_ORIGINAL_PRICE].'&'.
                EVENT_TABLE_DESCRIPTION_ORIGINAL_PURCHASE_DATE.'='.$item_data[ITEM_TABLE_ORIGINAL_PURCHASE_DATE].'&'.   
                EVENT_TABLE_DESCRIPTION_ORIGINAL_OWNER.'='.$user_data[USER_TABLE_FIRST_NAME].' '.$user_data[USER_TABLE_LAST_NAME],  /*08*/
            EVENT_TABLE_EVENT_TIMESTAMP => 'NULL'                                                                                   /*09*/
        );
    }


    function addEventReducer($post){return array(
        EVENT_TABLE_ID => 'NULL',                                               /*00*/
        EVENT_TABLE_TIMESTAMP => 'NULL',                                        /*01*/    
        EVENT_TABLE_STATUS => EVENT_TABLE_DEFAULT_STATUS,                       /*02*/    
        EVENT_TABLE_ITEM_ID => $post[EVENT_TABLE_ITEM_ID],                      /*03*/
        EVENT_TABLE_BUYER_ID => 'NULL',                                         /*04*/    
        EVENT_TABLE_SELLER_ID => 'NULL',                                        /*05*/       
        EVENT_TABLE_TRANSACTION_ID => 'NULL',                                   /*06*/
        EVENT_TABLE_TRANSACTION_AUTHENTICATION_CODE => 'NULL',                  /*07*/
        EVENT_TABLE_EVENT_DESCRIPTION => 
            ADD_EVENT_TYPE.'='.$post[ADD_EVENT_TYPE].'&'.
            ADD_EVENT_DATE.'='.$post[ADD_EVENT_DATE].'&'.
            ADD_EVENT_COST.'='.$post[ADD_EVENT_COST].'&'.
            ADD_EVENT_DESCRIPTION.'='.$post[ADD_EVENT_DESCRIPTION],             /*08*/
        EVENT_TABLE_EVENT_TIMESTAMP => 'NULL'                                   /*09*/
    );
    }
?>

