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


    function assembleItemData(){
        return array(
            "i_name"=> , 
            "i_description"=> , 
            "current_price"=> , 
            "i_image"=> , 
            "i_category_Id"=> , 
            "i_serialnum"=> , 
            "event_description"=> , 
            "event_timestamp"=> , 
            "original_price"=> , 
            "is_approved"=> , 
            "owner_id"=> , 
            "days_to_minimum_price"=> 
        );
    }



?>


