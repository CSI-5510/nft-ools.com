<?php 

    
    /** maps new item data for insertion
     *
     * @param  mixed $price from pricing algorithm
     * @param  mixed $days_to_minimum_price set in contants/constants.all.php
     * @return array for use with DatabaseConnect::insertEvent(EVENT_NEW_ITEM)
     */

    /*
    NULL,jkdsfoewn ,jdfoaio fe kjasd j,775.08,:image,1,e6HTa$2HM43,799.88,0,41,37,$r,$d,2022-04-14T04:31,,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
    */
    function addNewItemReducer(){
        $clean_price = numbersOnly($_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE]);
        var_dump($clean_price);
        $price = pricing(
            $clean_price, 
            $_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE], 
            PRICE_FLOOR, 
            DAYS_TO_MINIMUM_PIRCE
        );
        return array(
            ITEM_TABLE_I_ID => 'NULL',
            ITEM_TABLE_I_NAME => "'".$_POST[ITEM_OBFUSCATED_NAME]."'", 
            ITEM_TABLE_I_DESCRIPTION => "'".$_POST[ITEM_OBFUSCATED_DESCRIPTION]."'", 
            ITEM_TABLE_CURRENT_PRICE => $price, 
            ITEM_TABLE_I_IMAGE => (file_get_contents($_FILES[ITEM_OBFUSCATED_IMAGE]["tmp_name"])), 
            ITEM_TABLE_I_CATEGORY_ID => intval($_POST[ITEM_OBFUSCATED_CATEGORY]), 
            ITEM_TABLE_I_SERIALNUM => "'".$_POST[ITEM_OBFUSCATED_SERIAL_NUMBER]."'",
            ITEM_TABLE_ORIGINAL_PRICE => $clean_price, 
            ITEM_TABLE_IS_APPROVED => 0,
            ITEM_TABLE_OWNER_ID => USER_ID,
            ITEM_TABLE_DAYS_TO_MINIMUM_PRICE => DAYS_TO_MINIMUM_PIRCE,
            ITEM_TABLE_RECEIPT => (file_get_contents($_FILES[ITEM_OBFUSCATED_RECEIPT]["tmp_name"])),
            ITEM_TABLE_DOCUMENTATION => (file_get_contents($_FILES[ITEM_OBFUSCATED_DOCUMENTATION]["tmp_name"])),
            ITEM_TABLE_ORIGINAL_PURCHASE_DATE => "'".$_POST[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE]."'",
            ITEM_TABLE_REJECTION_REASON => "'pending approval'",
            ITEM_TABLE_WAS_REVIEWED => 'NULL',
            ITEM_TABLE_TIMESTAMP => 'NULL',
            ITEM_TABLE_ADMIN_REVIEW => 'NULL',
            ITEM_TABLE_REJECTED => 'NULL',
            ITEM_TABLE_ADDED_TO_SYSTEM => 'NULL',
            ITEM_TABLE_UPGRADED => 'NULL',
            ITEM_TABLE_REPAIRED => 'NULL',
            ITEM_TABLE_LISTED_FOR_SALE  => 'NULL',
            ITEM_TABLE_DELISTED_FROM_SALE => 'NULL',
            ITEM_TABLE_IN_CART => 'NULL',
            ITEM_TABLE_PENDING_SALE => 'NULL',
            ITEM_TABLE_SOLD => 'NULL',
            ITEM_TABLE_NEW_OWNER_RECEIVED => 'NULL'
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
        $price = DatabaseConnector::getItemDataNoPics($item_id)[ITEM_TABLE_CURRENT_PRICE];
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


    function orderInsertPrefix(){
        $q = 'INSERT INTO orders (';
        foreach(INSERT_COLUMNS_ORDERS_TABLE as $column){
            if($column==ORDER_TABLE_ID){
                continue;
            }
            if($column==ORDER_TABLE_TIMESTAMP){
                continue;
            }
            $q = $q.$column.',';
        }
        $q = substr($q, 0, -1);
        $q = $q.') VALUES (';
        return $q;
    }

    function updateOrdersCartReducer($item_data, $buyer_id){
        $item_id = $item_data[ITEM_TABLE_I_ID];
        $price = $item_data[ITEM_TABLE_CURRENT_PRICE];
        $seller = $item_data[ITEM_TABLE_OWNER_ID];
        $q = orderInsertPrefix();
        $q = $q.'pending'.',';          // o_status
        $q = $q.$item_id.',';           // o_item_id
        $q = $q.$buyer_id.',';          // o_buyer_id
        $q = $q.$seller.',';            // o_seller_id
        $q = $q.'NULL'.',';             // o_transaction_id
        $q = $q.'NULL'.',';             // o_transactio_auth_code
        $q = $q.'placed in cart'.',';   // event_description
        $q = $q.'NULL'.',';             // event_timestamp
        $q = $q.$price.',';             // agreement_price
        $q = $q.')';
        DatabaseConnector::query($q);
        return;
    }


    function insertEventCartReducer($item_id){
        $price = DatabaseConnector::getOrderDataByItem($item_id)[ORDER_TABLE_AGREEMENT_PRICE];
        $type = EVENT_TYPE_IN_CART;
        return array(
            EVENT_TABLE_ID => 'NULL',
            EVENT_TABLE_ORDER_ID =>  'NULL',
            EVENT_TABLE_ITEM_ID => $item_id,
            EVENT_TABLE_DESCRIPTION => 'price at time of addition to cart: '.$price,
            EVENT_TABLE_TIMESTAMP => 'NULL',
            EVENT_TABLE_DATE => 'NULL',
            EVENT_TABLE_TYPE => $type,
            EVENT_TABLE_COST => $price               
        );
    }


    function updateOrdersPurchaseReducer($item_data, $buyer_id){        
        $item_id = $item_data[ITEM_TABLE_I_ID];
        $price = $item_data[ITEM_TABLE_CURRENT_PRICE];
        $seller = $item_data[ITEM_TABLE_OWNER_ID];
        $q = orderInsertPrefix();
        $q = $q.'closed'.',';          // o_status
        $q = $q.$item_id.',';           // o_item_id
        $q = $q.$buyer_id.',';          // o_buyer_id
        $q = $q.$seller.',';            // o_seller_id
        $q = $q.'NULL'.',';             // o_transaction_id
        $q = $q.'NULL'.',';             // o_transactio_auth_code
        $q = $q.'purchase complete'.',';   // event_description
        $q = $q.'NULL'.',';             // event_timestamp
        $q = $q.$price.',';             // agreement_price
        $q = $q.')';
        DatabaseConnector::query($q);
        return;
    }


    function insertEventPurchaseReducer($item_id, $listing){
        $price = DatabaseConnector::getItemDataNoPics($item_id)[ITEM_TABLE_CURRENT_PRICE];
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
            EVENT_TABLE_DESCRIPTION => 'price at time of purchase: '.$price,
            EVENT_TABLE_TIMESTAMP => 'NULL',
            EVENT_TABLE_DATE => 'NULL',
            EVENT_TABLE_TYPE => $type,
            EVENT_TABLE_COST => $price               
        );
    }


?>

