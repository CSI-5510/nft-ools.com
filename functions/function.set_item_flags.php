<?php

    // UPDATE `item` SET `admin_review` = '1', `upgraded` = NULL, `repaired` = NULL, `pending_sale` = NULL WHERE `item`.`i_id` = 11

    function setItemFlag($item_id, $flag){
        $columns = array(
            ITEM_TABLE_ADMIN_REVIEW,ITEM_TABLE_REJECTED,ITEM_TABLE_ADDED_TO_SYSTEM,ITEM_TABLE_UPGRADED,ITEM_TABLE_REPAIRED,ITEM_TABLE_LISTED_FOR_SALE,ITEM_TABLE_DELISTED_FROM_SALE,ITEM_TABLE_IN_CART,ITEM_TABLE_PENDING_SALE,ITEM_TABLE_SOLD,ITEM_TABLE_NEW_OWNER_RECEIVED
        );
        $set_index = array_search($flag, $columns, true);
        $i = 0;
        $q = 'UPDATE item SET ';
        foreach($columns as $column){
            $value = '1';
            if($set_index!==$i){
                $value = 'NULL';
            }
            $q = $q.$column.'='.$value.',';
            $i += 1;
        }
        $q = substr($q, 0, -1);
        $q = $q.' WHERE item.'.ITEM_TABLE_I_ID.'='.$item_id;

        var_dump($q);
        DatabaseConnector::query($q);
        return;
    }

?>