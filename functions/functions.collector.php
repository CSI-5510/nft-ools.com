<?php 


    function drawCollectorAddItem(){
        include('../constants/constants.all.php');
        // ROW 1
        echo '<form method="POST" action="/'.$GLOBALS["url_loc"][0].'/collector/add_item_confirmation" enctype="multipart/form-data"><div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("PRICE", $LISTING_LABEL);
        echo '</div>';
        // ROW 2
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("TITLE", $LISTING_LABEL);
        drawLabel($_POST["title"], $CONFIRMATION_LABEL);
        echo '</div>';
        // ROW 3
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("DESCRIPTION", $LISTING_LABEL);
        drawLabel($_POST["description"], $CONFIRMATION_LABEL);
        echo '</div>';
        // ROW 4
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("IMAGE", $LISTING_LABEL);
        drawPostedImage("image", $CONFIRMATION_IMAGE);
        echo '</div>';
        // ROW 5
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("DOCUMENTATION", $LISTING_LABEL);
        drawPostedImage("documentation", $CONFIRMATION_IMAGE);
        echo '</div>';
        // ROW 6
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("RECEIPT", $LISTING_LABEL);
        drawPostedImage("receipt", $CONFIRMATION_IMAGE);
        echo '</div>';
        // ROW 7
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLabel("AFFIDAVIT OF QUALITY", $LISTING_LABEL);
        drawLabel("signature accepted", $LISTING_LABEL);
        echo '</div>';
        // ROW 8
        echo '<div class="'.$FLEX_ROW_JUSTIFY.'">';
        drawLinkButton('CANCEL', '/'.$GLOBALS["url_loc"][0].'/collector/'.$CANCEL_ADD_ITEM, $BLUE_BUTTON);
        drawSubmitButton($BLUE_BUTTON);
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
    function assembleItemData($price, $days_to_minimum_price){
        include('../constants/constants.all.php');
        return array(
            $ADD_ITEM_QUERY_NAME=> $_POST[$ADD_ITEM_TITLE], 
            $ADD_ITEM_QUERY_DESCRIPTION=> $_POST[$ADD_ITEM_DESCRIPTION], 
            $ADD_ITEM_QUERY_CURRENT_PRICE=> $price, 
            $ADD_ITEM_QUERY_IMAGE=> $_FILES[$ADD_ITEM_IMAGE], 
            $ADD_ITEM_QUERY_CATEGORY=> $_POST[$ADD_ITEM_CATEGORY], 
            $ADD_ITEM_QUERY_SERIAL_NUMBER=> $_POST[$ADD_ITEM_SERIAL_NUMBER],
            $ADD_ITEM_QUERY_ORIGINAL_PURCHASE_PRICE=> $_POST[$ADD_ITEM_ORIGINAL_PURCHASE_PRICE], 
            $ADD_ITEM_QUERY_ORIGINAL_PURCHASE_DATE=> $_POST[$ADD_ITEM_ORIGINAL_PURCHASE_DATE],
            $ADD_ITEM_QUERY_DAYS_TO_MINIMUM_PRICE=> $days_to_minimum_price
        );
    }



?>


