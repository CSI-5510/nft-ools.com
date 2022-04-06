<?php
    // FRONTEND
    include('../functions/functions.add_item.php');
    include_once('../constants/constants.all.php');
?>

<form method="POST" action="/<?php echo $GLOBALS['url_loc'][0];?>/collector/add_item" enctype="multipart/form-data">
    <div class="flex flex-row items-start">
        <?php
            drawLabel('TITLE', $LISTING_LABEL);
            drawTextInput($ADD_ITEM_TITLE, $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('CATEGORY', $LISTING_LABEL);
            drawSelectOption($ADD_ITEM_CATEGORY, $LISTING_INPUT_AREA, $options);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('DESCRIPTION', $LISTING_LABEL);
            drawTextArea($ADD_ITEM_DESCRIPTION, $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('IMAGE', $LISTING_LABEL);
            drawFileUpload($ADD_ITEM_IMAGE, $ADD_ITEM_IMAGE, $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('DOCUMENTATION', $LISTING_LABEL);
            drawFileUpload($ADD_ITEM_DOCUMENTATION, $ADD_ITEM_DOCUMENTATION, $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('RECEIPT', $LISTING_LABEL);
            drawFileUpload($ADD_ITEM_RECEIPT, $ADD_ITEM_RECEIPT, $LISTING_DROPZONE, $ACCEPTED_IMAGE_TYPES);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('PURCHASE DATE', $LISTING_LABEL);
            drawDateInput($ADD_ITEM_ORIGINAL_PURCHASE_DATE, $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('PURCHASE PRICE', $LISTING_LABEL);
            drawTextInput($ADD_ITEM_ORIGINAL_PURCHASE_PRICE, $LISTING_INPUT_AREA);
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawLabel('AFFIDAVIT OF QUALITY', $LISTING_LABEL);
            drawAffidavit($ADD_ITEM_AFFIDAVIT_NAME, $ADD_ITEM_AFFIDAVIT_VERIFY, 'i gaurantee that this thing works...');
        ?>
    </div>
    <div class="flex flex-row justify-between items-start">
        <?php
            drawSubmitButton($BLUE_BUTTON." mx-40 my-10 w-full");
        ?>
    </div>
</form>