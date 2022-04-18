<?php 

    
    /** maps new item data for insertion
     *
     * @param  mixed $price from pricing algorithm
     * @param  mixed $days_to_minimum_price set in contants/constants.all.php
     * @return array for use with DatabaseConnect::addEvent(EVENT_NEW_ITEM)
     */
    function addNewItemReducer(){
        $clean_price = numbersOnly($_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE]);
        $price = pricing(
            $clean_price, 
            $_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE], 
            PRICE_FLOOR, 
            DAYS_TO_MINIMUM_PIRCE
        );
        return array(
            ITEM_TABLE_ID => NULL,
            ITEM_TABLE_NAME => $_POST[ITEM_OBFUSCATED_NAME], 
            ITEM_TABLE_DESCRIPTION => $_POST[ITEM_OBFUSCATED_DESCRIPTION], 
            ITEM_TABLE_CURRENT_PRICE => $price, 
            ITEM_TABLE_IMAGE => (file_get_contents($_FILES[ITEM_OBFUSCATED_IMAGE]["tmp_name"])), 
            ITEM_TABLE_CATEGORY_ID => intval($_POST[ITEM_OBFUSCATED_CATEGORY]), 
            ITEM_TABLE_SERIAL_NUMBER => intval($_POST[ITEM_OBFUSCATED_SERIAL_NUMBER]),
            ITEM_TABLE_ORIGINAL_PRICE => $clean_price, 
            ITEM_TABLE_IS_APPROVED => 0,
            ITEM_TABLE_OWNER_ID => USER_ID,
            ITEM_TABLE_DAYS_TO_MINIMUM_PRICE => DAYS_TO_MINIMUM_PIRCE,
            ITEM_TABLE_RECEIPT => (file_get_contents($_FILES[ITEM_OBFUSCATED_RECEIPT]["tmp_name"])),
            ITEM_TABLE_DOCUMENTATION => (file_get_contents($_FILES[ITEM_OBFUSCATED_DOCUMENTATION]["tmp_name"])),
            ITEM_TABLE_ORIGINAL_PURCHASE_DATE => $_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE],
            ITEM_TABLE_REJECTION_REASON => '',
            ITEM_TABLE_WAS_REVIEWED => 0,
        );
    }


    function addItemEventReducer($item_id){
        return array(
            EVENT_TABLE_ID => 'NULL',
            EVENT_TABLE_ORDER_ID =>  'NULL',
            EVENT_TABLE_ITEM_ID => $item_id,
            EVENT_TABLE_DESCRIPTION => 'added to system',
            EVENT_TABLE_TIMESTAMP => 'NULL',
            EVENT_TABLE_DATE => 'NULL',
            EVENT_TABLE_TYPE => EVENT_TYPE_ADDED,
            EVENT_TABLE_COST => 'NULL'
        );
    }


    function addEventReducer($item_id, $post){
        $clean_cost = numbersOnly($post[EVENT_TABLE_COST]);
        return array(
            EVENT_TABLE_ID => 'NULL',
            EVENT_TABLE_ORDER_ID =>  'NULL',
            EVENT_TABLE_ITEM_ID => $item_id,
            EVENT_TABLE_DESCRIPTION => $post[EVENT_TABLE_DESCRIPTION],
            EVENT_TABLE_TIMESTAMP => 'NULL',
            EVENT_TABLE_DATE => "'".$post[EVENT_TABLE_DATE]."'",
            EVENT_TABLE_TYPE => $post[EVENT_TABLE_TYPE],
            EVENT_TABLE_COST => $clean_cost               
        );
    }
?>

