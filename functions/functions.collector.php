<?php 

    
    /** maps new item data for insertion
     *
     * @param  mixed $price from pricing algorithm
     * @param  mixed $days_to_minimum_price set in contants/constants.all.php
     * @return array for use with DatabaseConnect::insertEvent(EVENT_NEW_ITEM)
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
            ITEM_TABLE_I_ID => NULL,
            ITEM_TABLE_I_NAME => $_POST[ITEM_OBFUSCATED_NAME], 
            ITEM_TABLE_I_DESCRIPTION => $_POST[ITEM_OBFUSCATED_DESCRIPTION], 
            ITEM_TABLE_CURRENT_PRICE => $price, 
            ITEM_TABLE_I_IMAGE => (file_get_contents($_FILES[ITEM_OBFUSCATED_IMAGE]["tmp_name"])), 
            ITEM_TABLE_I_CATEGORY_ID => intval($_POST[ITEM_OBFUSCATED_CATEGORY]), 
            ITEM_TABLE_I_SERIALNUM => intval($_POST[ITEM_OBFUSCATED_SERIAL_NUMBER]),
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
            EVENT_TABLE_TYPE => EVENT_TYPE_ADDED_TO_SYSTEM,
            EVENT_TABLE_COST => 'NULL'
        );
    }


    function insertEventFormReducer($item_id, $post){
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

    
    /** inserts list for sale, delist from sales into event table
     *
     * @param  int $item_id
     * @param  bool $listing controls labeling in description: false-->'delisting', true-->'listing'
     * @return void
     */
    function insertEventSellItemReducer($item_id, $listing){
        $price = DatabaseConnector::getItemDataNoPics($item_id);
        $mode = 'listing';
        $type = EVENT_TYPE_LISTED_FOR_SALE;
        if(!$listing){
            $mode = 'de'.$mode;
            $type = EVENT_TYPE_DELISTED_FROM_SALE;
        }
        return array(
            EVENT_TABLE_ID => 'NULL',
            EVENT_TABLE_ORDER_ID =>  'NULL',
            EVENT_TABLE_ITEM_ID => $item_id,
            EVENT_TABLE_DESCRIPTION => 'price at time of '.$mode.': '.$price,
            EVENT_TABLE_TIMESTAMP => 'NULL',
            EVENT_TABLE_DATE => 'NULL',
            EVENT_TABLE_TYPE => $type,
            EVENT_TABLE_COST => 'NULL'               
        );
    }


?>

