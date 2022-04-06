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


    function assembleItemData($price,){
        return array(
            "i_name"=> $_POST["title"], 
            "i_description"=> $_POST["description"], 
            "current_price"=> $price, 
            "i_image"=> $_FILES["image"], 
            "i_category_Id"=> $_POST["category"], 
            "i_serialnum"=> $_POST["serial"],
            "original_price"=> $_POST["original_price"], 
            "original_purchase_date"=> $_POST["original_purchase_date"],
            "days_to_minimum_price"=> 10
        );
    }



?>


