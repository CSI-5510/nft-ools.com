<?php 


    function drawCollectorAddItem(){
        include('../constants/all.php');
        echo '
            <form method="POST" action="/'.$GLOBALS["url_loc"][0].'/collector/add_item_confirmation" enctype="multipart/form-data">
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("TITLE", $LISTING_LABEL)
                        .
                        drawTextInput("title", $LISTING_INPUT_AREA)
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("DESCRIPTION", $LISTING_LABEL)
                        .
                        drawTextArea("description", $LISTING_INPUT_AREA)
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("IMAGE", $LISTING_LABEL)
                        .
                        drawFileUpload("image", "image", $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES)
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("DOCUMENTATION", $LISTING_LABEL)
                        .
                        drawFileUpload("documentation", "documentation", $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES)
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("RECEIPT", $LISTING_LABEL)
                        .
                        drawFileUpload("receipt", "receipt", $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES)
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("AFFIDAVIT OF QUALITY", $LISTING_LABEL)
                        .
                        drawAffidavit("affidavit", "i gaurantee that this thing works...")
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.
                        drawLabel("PRICE", $LISTING_LABEL).
                        drawLabel("price will be determined by our picing system", $LISTING_PRICE_LABEL)
                    .'
                </div>
                <div class="'.$FLEX_ROW_NO_JUSTIFY.'">
                    '.drawSubmitButton($BLUE_BUTTON).'
                </div>
            </form>
        ';
    }


    function drawCollectorAddItemConfirmation(){

    }



?>


