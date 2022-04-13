<?php 


    function drawCollectorAddItem(){
        // ROW 1
        echo '<form method="POST" action="/'.$GLOBALS["url_loc"][0].'/collector/add_item_confirmation" enctype="multipart/form-data"><div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("PRICE", LISTING_LABEL);
        echo '</div>';
        // ROW 2
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("TITLE", LISTING_LABEL);
        drawLabel($_POST["title"], CONFIRMATION_LABEL);
        echo '</div>';
        // ROW 3
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("DESCRIPTION", LISTING_LABEL);
        drawLabel($_POST["description"], CONFIRMATION_LABEL);
        echo '</div>';
        // ROW 4
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("IMAGE", LISTING_LABEL);
        drawPostedImage("image", CONFIRMATION_IMAGE);
        echo '</div>';
        // ROW 5
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("DOCUMENTATION", LISTING_LABEL);
        drawPostedImage("documentation", CONFIRMATION_IMAGE);
        echo '</div>';
        // ROW 6
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("RECEIPT", LISTING_LABEL);
        drawPostedImage("receipt", CONFIRMATION_IMAGE);
        echo '</div>';
        // ROW 7
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLabel("AFFIDAVIT OF QUALITY", LISTING_LABEL);
        drawLabel("signature accepted", LISTING_LABEL);
        echo '</div>';
        // ROW 8
        echo '<div class="'.FLEX_ROW_JUSTIFY.'">';
        drawLinkButton('CANCEL', '/'.$GLOBALS["url_loc"][0].'/collector/'.CANCEL_ADD_ITEM, BLUE_BUTTON);
        drawSubmitButton(BLUE_BUTTON);
        echo '</div></form>';
    }


    function drawCollectorAddItemConfirmation(){

    }

    
    /** maps new item data for insertion
     *
     * @param  mixed $price from pricing algorithm
     * @param  mixed $days_to_minimum_price set in contants/constants.all.php
     * @return array for use with DatabaseConnect::addNewItem()
     */
    function assembleItemData(){
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
            ITEM_TABLE_IMAGE => base64_encode(file_get_contents($_FILES[ITEM_QUERY_IMAGE]["tmp_name"])), 
            ITEM_TABLE_CATEGORY_ID => intval($_POST[ITEM_QUERY_CATEGORY]), 
            ITEM_TABLE_SERIAL_NUMBER => intval($_POST[ITEM_QUERY_SERIAL_NUMBER]),
            ITEM_TABLE_ORIGINAL_PRICE => $_POST[ITEM_QUERY_ORIGINAL_PURCHASE_PRICE], 
            ITEM_TABLE_IS_APPROVED => 0,
            ITEM_TABLE_OWNER_ID => USER_ID,
            ITEM_TABLE_DAYS_TO_MINIMUM_PRICE => DAYS_TO_MINIMUM_PIRCE,
            ITEM_TABLE_RECEIPT => base64_encode(file_get_contents($_FILES[ITEM_QUERY_RECEIPT]["tmp_name"])),
            ITEM_TABLE_DOCUMENTATION => base64_encode(file_get_contents($_FILES[ITEM_QUERY_DOCUMENTATION]["tmp_name"])),
            ITEM_TABLE_ORIGINAL_PURCHASE_DATE => $_POST[ITEM_QUERY_ORIGINAL_PURCHASE_DATE],
            ITEM_TABLE_REJECTION_REASON => '',
            ITEM_TABLE_WAS_REVIEWED => 0,
        );
    }



?>
