<?php 


    include('../functions/functions.item.php');
    
    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
                alertBox($item_data['i_name'].' at $'.$item_data['i_price']);
                break;
            case $EDIT:
                drawEditItemModal();
                break;
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('malformed url');
    }


?>


<form method="POST" action="/<?php echo $GLOBALS['url_loc'][0];?>/collector/add_item" enctype="multipart/form-data">
    <div class="flex flex-row items-start">
        <?php
            drawLabel('TITLE', $LISTING_LABEL);
            drawTextInput('title', $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('DESCRIPTION', $LISTING_LABEL);
            drawTextArea('description', $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('IMAGE', $LISTING_LABEL);
            drawFileUpload('image', 'image', $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('DOCUMENTATION', $LISTING_LABEL);
            drawFileUpload('documentation', 'documentation', $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('RECEIPT', $LISTING_LABEL);
            drawFileUpload('receipt', 'receipt', $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
            ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('AFFIDAVIT OF QUALITY', $LISTING_LABEL);
            drawAffidavit('title', 'i gaurantee that this thing works...');
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('PRICE', $LISTING_LABEL);
            drawLabel('price will be determined by our picing system', $LISTING_PRICE_LABEL);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawSubmitButton($BLUE_BUTTON);
        ?>
    </div>
</form>